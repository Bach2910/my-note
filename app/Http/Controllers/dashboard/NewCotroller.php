<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $news = News::paginate(6);
        return view('recipe.news.index',compact('news'));
    }

    /**
     * Show the form for creating a news resource.
     */
    public function create()
    {
        //
        return view('recipe.news.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'title'=>'required',
            'content'=>'required',
            'short_content'=>'required',
            'time_day'=>'required',
        ]);
        $news = News::create($validate);
        return redirect()->route('news.index',$news);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $currentRecipe = News::findOrFail($id);
        $footer = News::findOrFail($id);
        $nextRecipe = News::where('id', '>', $currentRecipe->id)
            ->orderBy('id', 'asc')
            ->take(4)  // Số lượng sản phẩm tiếp theo bạn muốn lấy
            ->get();
        // Lấy sản phẩm lớn hơn và nhỏ hơn
        $nextRecipe1 = News::where('id', '>', $footer->id)
            ->orderBy('id', 'asc')
            ->take(1)  // Số lượng sản phẩm tiếp theo bạn muốn lấy
            ->get();
        $nextRecipe2 = News::where('id', '<', $footer->id)
            ->orderBy('id', 'desc')
            ->take(1)  // Số lượng sản phẩm tiếp theo bạn muốn lấy
            ->get();
        return view('recipe.news.news_product', compact('currentRecipe','nextRecipe1','nextRecipe2','footer','nextRecipe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $news = News::find($id);
        return view('recipe.news.edit',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validate = $request->validate([
            'title'=>'required',
            'content'=>'required',
            'short_content'=>'required',
            'time_day'=>'required',
        ]);
        $news = News::find($id);
        $news->update($validate);
        return redirect()->route('news.index',$news);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $news = News::find($id);
        $news->delete();
        return redirect()->route('news.index',$news);
    }
    public function showFormNews(){
        $news = News::paginate(6);
        return view('recipe.news.news_list',compact('news'));
    }
    public function searchNew(Request $request)
    {
        $search = $request->input('search');
        $query = News::query();

        // Tìm kiếm trong cột 'food_name' và 'price'
        if ($search) {
            $query->where('title', 'LIKE', "%{$search}%");

//            // Tìm kiếm trong mối quan hệ 'customer'
//            $query->orWhereHas('customer', function ($query) use ($search) {
//                $query->where('name', 'LIKE', "%{$search}%")
//                    ->orWhere('email', 'LIKE', "%{$search}%")
//                    ->orWhere('phone', 'LIKE', "%{$search}%")
//                    ->orWhere('detail','LIKE',"%{$search}%");
//            });
        }

        // Phân trang kết quả
        $news = $query->paginate(12);

        // Trả về view với kết quả tìm kiếm
        return view('recipe.news.index', compact('news'));
    }
}
