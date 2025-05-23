<?php

namespace App\Repositories;

use App\Constants;
use App\Interfaces\Repositories\BaseRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Container\Container as Application;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Throwable;

abstract class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @var Application
     */
    protected $app;

    protected $query;

    /**
     * @throws \Exception
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Get searchable fields array
     *
     * @return array
     */
    abstract public function getFieldsSearchable();

    /**
     * @var array field filter
     */
    protected $fieldFilter = [];

    /**
     * @var array field show in query list
     */
    protected $fieldInList = [];

    /**
     * @var array field order
     */
    protected $fieldOrder = [];

    /**
     * Configure the Model
     *
     * @return string
     */
    abstract public function model();

    /**
     * Make Model instance
     *
     * @return Model
     *
     * @throws \Exception
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());

        if (! $model instanceof Model) {
            throw new \Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }

    private function exitsProperty($name)
    {
        return Schema::hasColumn($this->model->getTable(), $name);
    }

    /**
     * Paginate records for scaffold.
     */
    public function paginate(array $search = [], int $perPage = Constants::PER_PAGE_NUMBER, ?array $columns = ['*'], array $orders = [], $relations = []): LengthAwarePaginator
    {
        if ($columns == null) {
            if (! empty($this->fieldInList)) {
                $columns = $this->fieldInList;
            } else {
                $columns = ['*'];
            }
        }

        $this->allQuery($search, null, null, $orders);

        $this->beforeAllQuery();

        if (! empty($relations)) {
            $this->query = $this->query->with($relations);
        }

        return $this->query->paginate($perPage, $columns);
    }

    /**
     * Build a query for retrieving all records.
     *
     * @param  array  $search
     * @param  int|null  $skip
     * @param  int|null  $limit
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function allQuery($search = [], $skip = null, $limit = null, $orders = [])
    {
        $this->query = $this->model->newQuery();
        if (count($search)) {
            foreach ($search as $key => $value) {
                if ($value === null) {
                    continue;
                }
                if (in_array($key, $this->getFieldsSearchable())) {
                    $method = 'filter'.Str::studly($key);
                    if (method_exists($this, $method)) {
                        $this->{$method}($value);
                    } elseif (method_exists($this->model, $method)) {
                        $this->query = $this->model->{$method}($this->query, $value);
                    } elseif (is_array($value)) {
                        $this->query->whereIn($key, $value);
                    } else {
                        $this->query->where($key, $value);
                    }
                } elseif ($key == 'filter') {
                    if (method_exists($this, 'filter')) {
                        $this->filter($value);
                    } elseif (count($this->fieldFilter)) {
                        $value = $this->processSearch($value);
                        $this->query->where(function ($query) use ($value) {
                            foreach ($this->fieldFilter as $field) {
                                $query->orWhere($field, 'like', "%$value%");
                            }
                        });
                    }
                }
            }
        }

        if (is_array($orders) and count($orders)) {
            foreach ($orders as $orderBy => $orderDir) {
                $orderBy = (in_array($orderBy, $this->fieldOrder)) ? $orderBy : $this->fieldOrder[0];
                $this->query->orderBy($orderBy, $orderDir);
            }
            if (! isset($orders['id']) && in_array('id', $this->fieldOrder)) {
                $this->query->orderBy('id', Constants::ORDER_DIR_DESC);
            }
        } else {
            $this->query->orderBy('id', Constants::ORDER_DIR_DESC);
        }

        if (! is_null($limit)) {
            $this->query->limit($limit);

            if (! is_null($skip)) {
                $this->query->skip($skip);
            }
        }

        return $this->query;
    }

    /**
     * Retrieve all records with given filter criteria
     *
     * @param  array  $search
     * @param  int|null  $skip
     * @param  int|null  $limit
     * @param  array  $columns
     * @return LengthAwarePaginator|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all($search = [], $skip = null, $limit = null, $columns = null, $orders = [], $relations = [])
    {
        if ($columns == null) {
            if (! empty($this->fieldInList)) {
                $columns = $this->fieldInList;
            } else {
                $columns = ['*'];
            }
        }

        $this->allQuery($search, $skip, $limit, $orders);

        $this->beforeAllQuery();

        if (! empty($relations)) {
            $this->query = $this->query->with($relations);
        }

        return $this->query->get($columns);
    }

    /**
     * query all for select, not run beforeAllQuery
     */
    public function allSelect($search = [], $skip = null, $limit = null, $columns = null, $orders = [], $relations = [])
    {
        if ($columns == null) {
            if (! empty($this->fieldInList)) {
                $columns = $this->fieldInList;
            } else {
                $columns = ['*'];
            }
        }

        $this->allQuery($search, $skip, $limit, $orders);

        if (! empty($relations)) {
            $this->query = $this->query->with($relations);
        }

        return $this->query->get($columns);
    }

    /**
     * Create model record
     *
     * @param  array  $input
     * @return Model
     */
    public function create($input)
    {
        $user = \Auth::user();

        if (isset($input['id'])) {
            unset($input['id']);
        }
        if (isset($input['created_by'])) {
            unset($input['created_by']);
        }
        if (isset($input['updated_by'])) {
            unset($input['updated_by']);
        }

        $model = $this->model->newInstance($input);

        if ($this->exitsProperty('created_by')) {
            $model->created_by = $user->name;
        }

        if ($this->exitsProperty('updated_by')) {
            $model->updated_by = null;
        }

        $this->beforeCreate($model, $input);

        $model->save();

        $this->afterCreate($model, $input);

        return $model;
    }

    /**
     * Find model record for given id
     *
     * @param  int  $id
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */
    public function find($id, $columns = ['*'], $runBefore = false)
    {
        $this->query = $this->model->newQuery();

        if ($runBefore) {
            $this->beforeFind();
        }

        if ($columns == null) {
            $columns = ['*'];
        }

        return $this->query->find($id, $columns);
    }

    /**
     * Update model record for given id
     *
     * @param  array  $input
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model
     */
    public function update($input, $id)
    {
        $user = Auth::user();
        $this->query = $this->model->newQuery();

        $model = $this->query->findOrFail($id);

        if (isset($input['id'])) {
            unset($input['id']);
        }
        if (isset($input['created_by'])) {
            unset($input['created_by']);
        }
        if (isset($input['updated_by'])) {
            unset($input['updated_by']);
        }

        $model->fill($input);

        if ($this->exitsProperty('created_by') && ! $model->created_by) {
            $model->created_by = $user->name;
        }

        if ($this->exitsProperty('updated_by')) {
            $model->updated_by = $user->name;
        }

        $this->beforeUpdate($model, $input);

        $model->save();

        $this->afterUpdate($model, $input);

        return $model;
    }

    public function updateList($input, $ids)
    {
        $this->query = $this->model->newQuery();
        $this->query->whereIn('id', $ids)->update($input);
    }

    /**
     * @param  object  $model
     * @return bool|mixed|null
     *
     * @throws \Exception
     */
    public function delete($model)
    {
        // trigger beforeDelete
        $this->beforeDelete($model);

        $result = null;
        if (Auth::check() and $this->exitsProperty('deleted_by')) {
            $model->deleted_at = Carbon::now();
            $model->deleted_by = Auth::user()->name;
            $result = $model->update();
        }
        if (Auth::check() and $this->exitsProperty('flg_delete')) {
            $model->deleted_at = Constants::DELETE_FLAG_DELETED;
        }
        $result = $model->delete();

        // trigger afterDelete
        $this->afterDelete($model);

        return $result;
    }

    public function getFirst($searchs = [], $orders = [])
    {
        $query = $this->model->newQuery();

        if (count($searchs)) {
            foreach ($searchs as $key => $value) {
                $method = 'filter'.Str::studly($key);
                if (method_exists($this->model, $method)) {
                    $query = $this->model->{$method}($query, $value);
                } else {
                    $query->where($key, $value);
                }
            }
        }

        if (is_array($orders) && count($orders)) {
            foreach ($orders as $orderBy => $orderDir) {
                $query->orderBy($orderBy, $orderDir);
            }
        }

        return $query->first();
    }

    public function getSum($field_sum = 'number', $field_where = 'user_id', $field_value = null)
    {
        $query = $this->model->newQuery();
        if ($field_where && $field_value) {
            return $query->where($field_where, $field_value)->sum($field_sum);
        }

        return $query->sum($field_sum);
    }

    public function getCount($search): int
    {
        $query = $this->allQuery($search);

        return $query->count();
    }

    /**
     * @param  array  $rows  : list row to process
     * @param  array  $columns:  list column to update
     */
    public function insertOrUpdate(array $rows, array $columns): void
    {
        if (count($rows)) {
            $this->model->upsert($rows, $columns);
        }
    }

    public function saveOrders($ids = [])
    {
        try {
            $section = [];
            DB::beginTransaction();
            if (count($ids)) {
                foreach ($ids as $i => $id) {
                    $item = $this->find($id);
                    if (empty($item)) {
                        DB::rollback();

                        return false;
                    }

                    $item->order = $i + 1;
                    $item->save();
                    $section[$id] = $i + 1;
                }
            }
            DB::commit();

            return $section;
        } catch (Throwable $e) {
            DB::rollback();

            return false;
        }
    }

    public function processSearch($input_search = '')
    {
        return addcslashes($input_search, '0!@#$%^&*\()_-+');
    }

    // list trigger empty function
    public function beforeAllQuery() {}

    public function beforeFind() {}

    public function beforeCreate($model, $input) {}

    public function afterCreate($model, $input) {}

    public function beforeUpdate($model, $input) {}

    public function afterUpdate($model, $input) {}

    public function beforeDelete($model) {}

    public function afterDelete($model) {}

    public function getFirstRelationShip(array $condition = [], array $columns = ['*'], array $relationships = [], $orders = [])
    {

        $query = $this->model->newQuery();

        foreach ($condition as $key => $value) {
            $method = 'filter'.Str::studly($key);

            if (method_exists($this->model, $method)) {
                $query = $this->model->{$method}($query, $value);
            } else {
                $query->where($key, $value);
            }
        }

        $relationships = ! empty($relationships) ? $relationships : [];
        if (is_array($orders) && count($orders)) {
            foreach ($orders as $orderBy => $orderDir) {
                $query->orderBy($orderBy, $orderDir);
            }
        }

        return $query->with($relationships)->first($columns);
    }

    public function getNotes(array $columns, ?array $arrConditions = [], ?array $arrOrders = [])
    {
        $aliasNote = Constants::AS_TABLE_NAME_NOTE;
        $aliasNote1 = Constants::AS_TABLE_NAME_NOTE1;

        $query = $this->model->withTrashed()->newQuery()->from($this->model->getTable().' as '.$aliasNote)
            ->join('tbl_note1 as '.$aliasNote1, $aliasNote1.'.id', '=', $aliasNote.'.note1_id');

        if (! empty($arrConditions)) {
            $this->applyConditions($query, $arrConditions);
        }

        if (! empty($arrOrders)) {
            foreach ($arrOrders as $orderBy => $orderDir) {
                $query->orderBy($orderBy, $orderDir);
            }
        }

        $query->whereNull($aliasNote.'.deleted_at')
            ->whereNull($aliasNote1.'.deleted_at');

        return $query->get($columns);
    }

    protected function applyConditions($query, array $arrWheres)
    {
        $allowedOperators = [
            '=',
            '!=',
            '<>',
            '<',
            '<=',
            '>',
            '>=',
            'IN',
            'NOT IN',
            'IS NULL',
            'IS NOT NULL',
            'LIKE',
            'NOT LIKE',
        ];

        foreach ($arrWheres as $where) {
            if (count($where) < 2) {
                continue;
            }

            [$column, $operator, $value] = array_pad($where, 3, null);
            $operator = strtoupper(trim($operator));

            if (! in_array($operator, $allowedOperators, true)) {
                continue;
            }

            if (in_array($operator, ['IS NULL', 'IS NOT NULL'])) {
                if ($operator === 'IS NULL') {
                    $query->whereNull($column);
                } else {
                    $query->whereNotNull($column);
                }
            } elseif (in_array($operator, ['IN', 'NOT IN'])) {
                if (is_string($value)) {
                    $value = array_map('trim', explode(',', $value));
                }
                if (! is_array($value)) {
                    continue;
                }

                if ($operator === 'IN') {
                    $query->whereIn($column, $value);
                } else {
                    $query->whereNotIn($column, $value);
                }
            } elseif ($operator === '=' && is_string($value) && strpos($value, '.') !== false) {
                $query->whereColumn($column, '=', $value);
            } else {
                $query->where($column, $operator, $value);
            }
        }
    }
}
