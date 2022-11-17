<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['blogs'] = Blog::get();
        return view('admin.blogs', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addBlog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required|max:500',
            'image'=> 'required|image|mimes:jpeg,png,jpg|max:2048',
            'banner'=> 'image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required',
        ]);

        $blog = new Blog();
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $file_name = rand(1000,5000).time().'.'.$extention;
            $file->move('uploads/blog',$file_name);
            $blog->image = $file_name;
        }
        if ($request->hasfile('banner')) {
            $file = $request->file('banner');
            $extention = $file->getClientOriginalExtension();
            $file_name = rand(1000,5000).time().'.'.$extention;
            $file->move('uploads/blog',$file_name);
            $blog->banner = $file_name;
        }
        if ($request->hasfile('pdf')) {
            $file = $request->file('pdf');
            $extention = $file->getClientOriginalExtension();
            $file_name = rand(1000,5000).time().'.'.$extention;
            $file->move('uploads/blog',$file_name);
            $blog->pdf = $file_name;
        }
        $blog->title = $request->title;
        $blog->editor = $request->editor;
        $blog->short_description = $request->short_description;
        $blog->description = $request->description;
        $blog->status = $request->status;
        // dd($blog);
        if($blog->save()){
            return back()->with('success', 'Magazine Add successfully');
        }
        else{
            return back()->with('error', 'Something went wrong !');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.addBlog')->with(compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=> 'required|max:500',
            'image'=> 'image|mimes:jpeg,png,jpg|max:2048',
            'banner'=> 'image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required',
        ]);
        // dd($request->all());
        $blog = Blog::find($id);
        if ($request->hasfile('image')) {

            if ($blog->image!==null) {
                unlink(public_path("uploads/blog/$blog->image"));
            }

            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $file_name = rand(1000,5000).time().'.'.$extention;
            $file->move('uploads/blog',$file_name);
            $blog->image = $file_name;
        }
        if ($request->hasfile('banner')) {

            if ($blog->banner!==null) {
                unlink(public_path("uploads/blog/$blog->banner"));
            }

            $file = $request->file('banner');
            $extention = $file->getClientOriginalExtension();
            $file_name = rand(1000,5000).time().'.'.$extention;
            $file->move('uploads/blog',$file_name);
            $blog->banner = $file_name;
        }
        if ($request->hasfile('pdf')) {

            if ($blog->pdf!==null) {
                unlink(public_path("uploads/blog/$blog->pdf"));
            }

            $file = $request->file('pdf');
            $extention = $file->getClientOriginalExtension();
            $file_name = rand(1000,5000).time().'.'.$extention;
            $file->move('uploads/blog',$file_name);
            $blog->pdf = $file_name;
        }
        
        $blog->title = $request->title;
        $blog->editor = $request->editor;
        $blog->short_description = $request->short_description;
        $blog->description = $request->description;
        $blog->status = $request->status;

        if($blog->save()){
            return redirect()->route('blog.index')->with('success', 'Magazine Updated successfully');
        }
        else{
            return back()->with('error', 'Something went wrong !');
        } 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        if($blog!==null){
            if ($blog->image!==null) {
                unlink(public_path("uploads/blog/$blog->image"));
            }
            if ($blog->pdf!==null) {
                unlink(public_path("uploads/blog/$blog->pdf"));
            }
            if ($blog->banner!==null) {
                unlink(public_path("uploads/blog/$blog->banner"));
            }             
            $blog->delete();
            return back()->with('success', 'Blog Deleted successfully');
        }else{
            return back()->with('error', 'Something went wrong !');
        }
    }


}
