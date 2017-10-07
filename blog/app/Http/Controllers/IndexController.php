<?php

namespace App\Http\Controllers;

use App\Article;
use App\Liuyan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        $articles=DB::table('articles')
            ->orderBy('count','desc')
            ->limit(5)
            ->get();
        return view('index',['articles'=>$articles]);
    }
    public function about(){
        return view('about');
    }
    public function guestbook(Request $request){
        if($request->isMethod('POST')){
            $content=$request->input('content');
            if(Liuyan::create(['content'=>$content])){
                return redirect('shuo');
            }else{
                return redirect()->back();
            }
        }
        return view('guestbook');
    }
    public function shuo(){
        $shuos=Liuyan::all();
        return view('shuo',['shuos'=>$shuos]);
    }
    public function note(){
        return view('note');
    }
    public function picture(){
        return view('picture');
    }
    public function learn(){
        $articles=Article::all();
//        foreach($articles as $article){
////            if(($article->content).length){
////
////            }
//            echo substr($article->content,0,200);
//        }
        return view('learn',['articles'=>$articles]);
    }
    public function show($id){
        $article=Article::find($id);
        $article->count=($article->count)+1;
        $article->save();
        return view('show',['article'=>$article]);
    }
    public function test(){
//        $data=DB::select('select * from articles limit 0,5 order by count desc');
//        dd($data);exit();
//        return view('welcome');
        $data=DB::table('articles')
            ->orderBy('count','desc')
            ->limit(5)
            ->get();
//        DB::table('articles')->orderBy('count','desc')->chunk(2, function ($articles) {
//            $data=$articles;
//            return false;
//        });
//        dd($data);exit();
    }
}
