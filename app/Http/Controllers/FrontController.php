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

    public function article(Request $request, $id){
        $data['blog'] = Blog::where('id', $id)->with('articles','writer')->first();
        // dd(($data['blog']->writer));
        return view('front.article-details', $data);
    }


}
