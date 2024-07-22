<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
        return view('admin.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/admin/addCategory');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->errMsg();

        $data = $request->validate([
            'categoryName' => ['required', 'string', 'max:255'], ],
             $messages);
           Category::create($data); 
             return redirect('/admin/categories')->with('success', 'categoryadded successfully.');
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
        $category =Category::findOrFail($id);
        return view('/admin/editCategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->errMsg();

        $data = $request->validate([
            'categoryName' => ['required', 'string', 'max:255'], ],
             $messages);
        Category::where('id', $id)->update($data);
        return redirect('/admin/categories');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Category::where('id',$id)->delete();
        return redirect('/admin/categories');
    }
    public function errMsg(){
        return [
            'category.required' => 'The categoryis missed, please choose',
        ];
    }

}
