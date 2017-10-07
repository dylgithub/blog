<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    public function show($id){
        $article=Article::find($id);
//        $data=Article::where('id','<',$id)->first();
//        if($data==null){
//            $prearticle=null;
//        }else{
            $prearticle=DB::table('articles')
                ->where('id','<',$id)
                ->orderBy('id','desc')
                ->first();
//        }
//        $data2=Article::where('id','>',$id)->first();
//        if($data2==null){
//            $nextarticle=null;
//        }else{
            $nextarticle=DB::table('articles')
                ->where('id','>',$id)
                ->orderBy('id','asc')
                ->first();
//        }
        $article->count=($article->count)+1;
        $article->save();
        return view('show',['article'=>$article,'prearticle'=>$prearticle,'nextarticle'=>$nextarticle]);
    }
//    public function selecttop(){
//        $articles=DB::table('articles')
//            ->orderBy('count','desc')
//            ->limit(5)
//            ->get();
////        return redirect();
//    }
    public function condition(Request $request){
        $condition=$request->input('condition');
        $articles=Article::where('title','like','%'.$condition.'%')->get();
        return view('learn',['articles'=>$articles]);
    }
    public function comment(Request $request,$id){
        $article=Article::find($id);
        $content=$request->input('content');
        $comment=new Comment(['content'=>$content]);
        if($article->comments()->save($comment)){
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }
    //Ajax用于显示最新
    public function news(){
        $articles=DB::table('articles')
            ->orderBy('count','desc')
            ->limit(5)
            ->get();
        return $articles;//数据发送到前台会自动转换为json数据
//        return response()->json($articles,200);
    }
}
