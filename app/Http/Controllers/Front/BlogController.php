<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Blog::query()
            ->join('categories', 'blogs.category_id', 'categories.id')
            ->select('blogs.*', 'categories.name as categories_name')
            ->get();

        return view('blog.index', [
            'data' => $data
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        $data = Blog::query()
            ->join('categories', 'blogs.category_id', 'categories.id')
            ->select('blogs.*', 'categories.name as categories_name')
            ->get()
            ->take(3);

        return view('blog.show', [
            'data'      => $blog,
            'blog'      => $data,
            'comments'  => Comment::where('blog_id', $blog->id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'description'   => 'required'
        ]);

        $dataRequest = array_merge($validator->validate(), [
            'blog_id' => $blog->id
        ]);
        $blog->update($dataRequest);

        $response = [
            'success' => true,
        ];

        return response()->json($response, 200);
    }
}
