<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Blog;
use Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['articles'] = Article::get();
        return view('admin.articles', $data);      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['blogs'] = Blog::get();
        return view('admin.addArticle', $data);
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
            'image'=> 'image|mimes:jpeg,png,jpg|max:2048',
            'blog_id' => 'required',
            'status' => 'required',
        ]);
        // dd($request->all());
        $article = new Article();
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $file_name = rand(1000,5000).time().'.'.$extention;
            $file->move('uploads/article',$file_name);
            $article->image = $file_name;
        }
        if ($request->hasfile('pdf')) {
            $file = $request->file('pdf');
            $extention = $file->getClientOriginalExtension();
            $file_name = rand(1000,5000).time().'.'.$extention;
            $file->move('uploads/article',$file_name);
            $article->pdf = $file_name;
        }
        $article->title = $request->title;
        $article->editor = $request->editor;
        $article->blog_id = $request->blog_id;
        $article->description = $request->description;
        $article->status = $request->status;
        // dd($article);
        if($article->save()){
                return back()->with('success', 'Article Save successfully');
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
    public function edit(Article $article)
    {

        $data['blogs'] = Blog::get();
        return view('admin.addArticle', $data)->with(compact('article'));

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
            'blog_id' => 'required',
            'image'=> 'image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required',
        ]);

        $article = Article::find($id);
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $file_name = rand(1000,5000).time().'.'.$extention;
            $file->move('uploads/article',$file_name);
            $article->image = $file_name;
        }
        if ($request->hasfile('pdf')) {
            $file = $request->file('pdf');
            $extention = $file->getClientOriginalExtension();
            $file_name = rand(1000,5000).time().'.'.$extention;
            $file->move('uploads/article',$file_name);
            $article->pdf = $file_name;
        }
        $article->title = $request->title;
        $article->editor = $request->editor;
        $article->blog_id = $request->blog_id;
        $article->description = $request->description;
        $article->status = $request->status;
        // dd($article);
        if($article->save()){
            return redirect()->route('article.index')->with('success', 'Article Updated successfully');
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
        $article = Article::find($id);
        if($article!==null){
            if ($article->image!==null) {
                unlink(public_path("uploads/article/$article->image"));
            }
            if ($article->pdf!==null) {
                unlink(public_path("uploads/article/$article->pdf"));
            }             
            $article->delete();
            return back()->with('success', 'Article Deleted successfully');
        }else{
            return back()->with('error', 'Something went wrong !');
        }
    }
}
