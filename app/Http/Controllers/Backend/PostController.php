<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Traits\TagsTrait;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    use TagsTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postModel = resolve('App\ViewModels\Posts\PostViewModel');
        $postModel->loadModel();
        return view('backend.posts.index')->with('posts',$postModel);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postModel = resolve('App\ViewModels\Posts\PostViewModel');
        $categoryModel = resolve('App\ViewModels\CategoryViewModel');
        $tagModel = resolve('App\ViewModels\TagViewModel');
        $categoryModel->loadModel();
        $tagModel->loadModel();

        return view('backend.posts.create',[
            'postModel' => $postModel,
            'tagModel' => $tagModel,
            'categoryModel' => $categoryModel,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $post = $request->validated();
        $postModel = resolve('App\ViewModels\Posts\PostViewModel');
        $post = $postModel->createPost($post);
        $tags = $request->input('tags');
        
        $this->createTags($post,$tags);
        
        Session::flash('success', 'Post created successfully');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
        $postModel = resolve('App\ViewModels\Posts\PostViewModelById');
        $categoryModel = resolve('App\ViewModels\CategoryViewModel');
        $tagModel = resolve('App\ViewModels\TagViewModel');

        
        $categoryModel->loadModel();
        $tagModel->loadModel();
        $postModel->loadModel($id);
        $post = $postModel->postById;
        $postTags = $post->tags()->get();

        return view('backend.posts.edit',[
            'tagModel' => $tagModel,
            'categoryModel' => $categoryModel,
            'model' => $postModel,
            'post' => $post,
            'postTags' => $postTags,
        ]);
    }

    /**
     * Update the specified resource in storage. 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request,$id)
    {
        $post = $request->validated();
        $postModel = resolve('App\ViewModels\Posts\PostViewModel');

        $post = $postModel->updatePost($id, $post);
        $tags = $request->input('tags');
        $this->createTags($post,$tags);
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postModel = resolve('App\ViewModels\Posts\PostViewModel');
        $postModel->loadModel($id);
        return redirect()->back();
    }
}
