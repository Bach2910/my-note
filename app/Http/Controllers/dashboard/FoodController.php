<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $food = Food::with('customer')->paginate(10);
        return view('food.index', compact('food'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:customers,email',
            'phone' => 'required|max:255',
            'food_name' => 'required|max:255',
            'price' => 'required|max:255',
            'detail' => 'required|max:255',
        ], [
            'email.unique' => 'Email này đã tồn tại trong hệ thống.'
        ]);
        DB::beginTransaction();
        try {
            $customer = Customer::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);

            Food::create([
                'food_name' => $request->food_name,
                'customer_id' => $customer->id,
                'price' => $request->price,
                'detail' => $request->detail,

            ]);
            DB::commit();
            return redirect()->route('food.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Lỗi khi thêm dữ liệu: ' . $e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a news resource.
     */
    public function create()
    {
        //
        return view('food.add');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $food = Food::findOrFail($id);
        $customer = $food->customer;
        return view('food.edit', compact('food','customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $food = Food::findOrFail($id);
        $customer = $food->customer;
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'food_name' => 'required|max:255',
            'price' => 'required|max:255',
            'detail' => 'required|max:255',
        ]);
        DB::beginTransaction();
        try {
            $customer->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);

            $food->update([
                'food_name' => $request->food_name,
                'price' => $request->price,
                'detail'=> $request->detail,

            ]);
            DB::commit();
            return redirect()->route('food.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Lỗi khi thêm dữ liệu: ' . $e->getMessage()]);
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $food = Food::findOrFail($id);

        DB::beginTransaction();

        try{
            $food->delete();
            $food->customer->delete();

            DB::commit();

            return redirect()->route('food.index');

        }catch(\Exception $e){
            DB::rollBack();
            return back()->withErrors(['error' => 'Lỗi khi xóa dữ liệu: ' . $e->getMessage()]);
        }

    }
    public function searchFood(Request $request)
    {
        $search = $request->input('search');
        $query = Food::query();

        // Tìm kiếm trong cột 'food_name' và 'price'
        if ($search) {
            $query->where('food_name', 'LIKE', "%{$search}%");

//            // Tìm kiếm trong mối quan hệ 'customer'
//            $query->orWhereHas('customer', function ($query) use ($search) {
//                $query->where('name', 'LIKE', "%{$search}%")
//                    ->orWhere('email', 'LIKE', "%{$search}%")
//                    ->orWhere('phone', 'LIKE', "%{$search}%")
//                    ->orWhere('detail','LIKE',"%{$search}%");
//            });
        }

        // Phân trang kết quả
        $food = $query->paginate(12);

        // Trả về view với kết quả tìm kiếm
        return view('food.index', compact('food'));
    }
}
