<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $food = Customer::paginate(10);
        return view('customer.index', compact('food'));
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
            'price' => 'required|max:255',
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
            DB::commit();
            return redirect()->route('customer.index');
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
        return view('customer.add');
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
        $food = Customer::findOrFail($id);
        return view('customer.edit', compact('food'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $food = Customer::findOrFail($id);
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
            $food->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);
            DB::commit();
            return redirect()->route('customer.index');
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
        $food = Customer::findOrFail($id);

        DB::beginTransaction();

        try{
            $food->delete();

            DB::commit();

            return redirect()->route('customer.index');

        }catch(\Exception $e){
            DB::rollBack();
            return back()->withErrors(['error' => 'Lỗi khi xóa dữ liệu: ' . $e->getMessage()]);
        }

    }
    public function searchCustomer(Request $request)
    {
        $search = $request->input('search');
        $query = Customer::query();

        // Tìm kiếm trong cột 'food_name' và 'price'
        if ($search) {
            $query->where('name', 'LIKE', "%{$search}%");

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
        return view('customer.index', compact('food'));
    }

}
