<?php

namespace App\Http\Controllers;

use Gate;
use App\Blog;
use App\Http\Requests\StoreBlogPost;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(3);
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request)
    {
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->body = $request->body;
        $blog->slug = str_slug($request->title, '-');
        $blog->user_id = $request->user()->id;

        $blog->save();
        session()->flash('success', 'Blog has been published');
        return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $this->validate(request(), [
            'title' => [
                'required',
                Rule::unique('blogs')->ignore($blog->id),
                'max:100',
            ],
            'body' => 'required'
        ]);

        if (Gate::allows('update-blog', $blog)) {
            $blog->title = $request->title;
            $blog->body = $request->body;
            $blog->slug = str_slug($request->title, '-');

            $blog->save();
            session()->flash('success', 'Blog has been edited');
            return redirect()->route('blogs.index');
        } else {
            session()->flash('danger', 'Not authorized to edit that blog');
            return redirect()->route('blogs.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        if (Gate::allows('update-blog', $blog)) {
            $blog->delete();
            session()->flash('success', 'Blog was deleted');
            return redirect()->route('blogs.index');
        } else {
            session()->flash('danger', 'Not authorized to delete that blog');
            return redirect()->route('blogs.index');
        }
    }

}
