<?php

namespace App\Services;

use App\Models\Category;

class CategoryService{

    public function store($request){

        $category = Category::create([

            'name'=>$request->name,
            'description'=>$request->description
        ]);  
    }

    public function index(){

        $categories = Category::latest()->paginate(5);
        return compact('categories');
    }

    public function change_status($request){
        Category::where('id', $request->id)->update([
            'status' => $request->status,
        ]);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return compact('category');
    }

    public function update($request, $id)
    {
        $category = Category::find($id);
        $category->update([
            'name'=>$request->name,
            'description'=>$request->description
        ]);
    }
    public function remove($id)
    {
        $category = Category::where('id', $id)->delete();
    }
}