<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tagModel = resolve('App\ViewModels\TagViewModel');
        $tagModel->loadModel();
        return view('backend.tags.index')->with('tags', $tagModel);
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
    public function store(StoreTagRequest $request)
    {
        $tag = $request->validated();
        $tagModel = resolve('App\ViewModels\TagViewModel');
        $tag = $tagModel->createTag($tag);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tagModel = resolve('App\ViewModels\TagViewModel');
        $tag = $tagModel->findTagById($id);
        return view('backend.tags.edit')->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTagRequest $request, $id)
    {
        $tag = $request->validated();
        $tagModel = resolve('App\ViewModels\TagViewModel');
        $tag = $tagModel->updateTag($id, $tag);
        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tagModel = resolve('App\ViewModels\TagViewModel');
        $tagModel->deleteTag($id);
        return back();
    }
}
