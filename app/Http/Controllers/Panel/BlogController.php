<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\{
    Blog,
    Category
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    private function category() {
        return Category::all();
    }

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

        return view('admin.blog.index', [
            'data'      => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.form', [
            'status'    => 'create',
            'route'     => route('admin.blog.store'),
            'category'  => $this->category()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id'   => 'required',
            'title'         => 'required',
            'slug'          => 'required',
            'image'         => 'required',
            'description'   => 'required'
        ]);

        $dataRequest = array_merge($validator->validate(), [
            'image' => $request->file('image')->store('public/images')
        ]);
        Blog::create($dataRequest);

        return redirect()->route('admin.blog.index')->with(['success' => "Create data success!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('admin.blog.form', [
            'status'    => 'show',
            'route'     => '#',
            'data'      => $blog,
            'category'  => $this->category()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blog.form', [
            'status'    => 'edit',
            'route'     => route('admin.blog.update', $blog->id),
            'data'      => $blog,
            'category'  => $this->category()
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
            'category_id'   => 'required',
            'title'         => 'required',
            'slug'          => 'required',
            'image'         => 'nullable',
            'description'   => 'required'
        ]);

        $dataRequest = array_merge($validator->validate(), [
            'image' => $request->hasFile('image') ? $request->file('image')->store('public/images') : $blog->image
        ]);
        $blog->update($dataRequest);

        return redirect()->route('admin.blog.index')->with(['success' => "Update data success!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('admin.blog.index')->with(['success' => "Delete data success!"]);
    }
}
