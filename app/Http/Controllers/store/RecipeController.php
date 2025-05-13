<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $recipe = Food::with('customer')->paginate(10);
        return view('recipe.index',compact('recipe','recipe'));
    }

    /**
     * Show the form for creating a news resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $currentRecipe = Food::findOrFail($id);

        // Lấy sản phẩm tiếp theo
        $nextRecipe = Food::where('id', '>', $currentRecipe->id)
            ->orderBy('id', 'asc')
            ->take(2)  // Số lượng sản phẩm tiếp theo bạn muốn lấy
            ->get();

        return view('recipe.detail', compact('currentRecipe','nextRecipe'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function searchRecipe(Request $request)
    {
        $search = $request->input('search');
        $query = Food::query();

        // Tìm kiếm trong cột 'food_name' và 'price'
        if ($search) {
            $query->where('food_name', 'LIKE', "%{$search}%");
        }

        // Phân trang kết quả
        $recipe = $query->paginate(10);

        // Trả về view với kết quả tìm kiếm
        return view('recipe.index', compact('recipe'));
    }
    public function showOrderForm(){
            $recipe = Food::with('customer')->paginate(10);
            return view('recipe.order',compact('recipe'));
    }
    public function showContactForm(){
        $recipe = Food::with('customer')->paginate(10);
        return view('recipe.contact',compact('recipe'));
    }
    public function showAboutForm(){
        return view('recipe.about');
    }
}
