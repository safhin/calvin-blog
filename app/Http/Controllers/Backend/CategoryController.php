<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryModel = resolve('App\ViewModels\CategoryViewModel');
        $categoryModel->loadModel();
        return view('backend.categories.index',['categories' => $categoryModel]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = $request->validated();
        $categoryModel = resolve('App\ViewModels\CategoryViewModel'); 
        $category = $categoryModel->createCategory($category);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $categories = Category::all();
        // return view('backend.categories.index',['categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryModel = resolve('App\ViewModels\Categories\CategoryByIdViewModel');
        $categoryModel->loadModel($id);
        return view('backend.categories.edit')->with('category', $categoryModel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, $id)
    {
        $category = $request->validated();
        $categoryModel = resolve('App\ViewModels\CategoryViewModel'); 
        $categoryModel->updateCategory($id, $category);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoryModel = resolve('App\ViewModels\CategoryViewModel'); 
        $categoryModel->deleteCategory($id);
        return back();
    }
}
