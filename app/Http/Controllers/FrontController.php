<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Article;
// use App\Models\User;

class FrontController extends Controller
{

    public function about(){
        return view('front.about');
    }

    public function index(){
        $data['blogs'] = Blog::where('status', true)->with('writer')->get();
        // dd(gettype($data['blogs'][0]->writer));
        return view('front.index', $data);
    }

    public function magazine(Request $request, $id){

        if($request->has('article_id'))
            $data['article_id'] = $request->article_id;
        else
            $data['article_id'] = null;

        $data['blog'] = Blog::where('id', $id)->with('articles','writer')->first();
        // dd(($data['blog']->writer));
        return view('front.article-details', $data);
    }

    public function search(Request $request){
        if ($request->isMethod('get')) {
            $data['magazines'] = [] ;
            $data['articles'] = [] ;
            // dd('working');
            return view('front.search-page', $data);
        }else{
            // dd($request->all());
            $search = $request->input('search');
            // dd($search);
            if($search != ''){
                if($request->type=='magazine_title'){
                $data['magazines'] =Blog::where('title','like','%'.$search.'%')->get();
                $data['articles'] =Article::where('title','like','%'.$search.'%')->get();
                }
                if($request->type=='magazine_date'){
                $data['magazines'] =Blog::where('created_at','like','%'.$search.'%')->get();
                $data['articles'] =Article::where('created_at','like','%'.$search.'%')->get();
                }
                if($request->type=='magazine_editor'){
                $data['magazines'] =Blog::where('editor','like','%'.$search.'%')->get();
                }
                return view('front.search-page', $data)->with(compact('search'));
              
            }else{
                return back();
            }

        }
    }

    public function getSearchData(Request $request){
        if($request->type == 'magazine_title'){
            $data = Blog::select('id', 'title')->get();
        }
        if($request->type == 'magazine_editor'){
            $data = Article::select('id', 'editor as title', 'blog_id')->get();
        }

        // dd($data);

        return response()->json(['status' => $data ? true : false, 'data' => $data]);
    }

}
