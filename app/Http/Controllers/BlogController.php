<?php

namespace App\Http\Controllers;

use App\Services\ImportService;
use App\Services\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blogService;
    public function __construct( BlogService $blogService )
    {
        $this->blogService = $blogService;
    }

    /**
     * Display a listing of the Blog.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $blogs = $this->blogService->listBlog($request->all());
        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (count($request->all())) {
            if ($this->blogService->createBlog($request->all())) {
                return redirect()->route('Blog.index');
            }
        } else {
            return view('blog.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = $this->blogService->getBlogDetail($id);
        if($blog){
            return view('blog.show',compact('blog'));
        }
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($this->blogService->updateBlog($request->all())) {
            return redirect()->route('Blog.index');
        }
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->blogService->deleteBlog($id)) {
            return redirect()->route('Blog.index');
        }
        abort(404);
    }

}
