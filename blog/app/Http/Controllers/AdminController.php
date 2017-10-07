<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function login(Request $request){
//        $return_url=urldecode($request->input('return_url'));
//        dd($return_url);
        if($request->isMethod('POST')){
            $username=$request->input('username');
            $password=$request->input('password');
            $admin=Admin::where('username',$username)->first();
            if($admin==null){
                return redirect()->back()->withInput()->with('fail','用户名不存在');
            }else{
                if(Hash::check($password,$admin->password)){
                    session(['admin' => $username]);
                    return redirect('admin/index');
                }else{
                    return redirect()->back()->withInput()->with('fail','用户名密码不匹配');
                }
            }
        }
        return view('admin/login');
    }
    public function register(Request $request){
        if($request->isMethod('POST')){
            $username=$request->input('username');
            $password=$request->input('password');
            $admin=new Admin();
            $admin->username=$username;
            $admin->password=Hash::make($password);
            if($admin->save()){
                return redirect('admin/login')->with('success','注册成功请登录');
            }
        }
        return view('admin/register');
    }
    public function jiance(){
        $username=$_POST['username'];
        $admin=Admin::where('username',$username)->first();
        if($admin==null){
            return 0;
        }else{
            return 1;
        }
    }
    public function index(){
        $articles=Article::paginate(2);
        return view('admin/index',['articles'=>$articles]);
    }
    public function preedit(Request $request,$id){
        if($request->isMethod('POST')){
            $title=$request->input('title');
            $content=$request->input('content');
            $article=Article::find($id);
            $article->title=$title;
            $article->content=$content;
            $article->save();
            return redirect('admin/index');
        }
        $article=Article::find($id);
        return view('admin.detail',['article'=>$article]);
    }
    public function delete($id){
        Article::destroy($id);
        return redirect('admin/index');
    }
    public function create(Request $request){
        if($request->isMethod('POST')){
            $article=new Article();
            $article->title=$request->input('title');
            $article->auther=$request->input('auther');
            $article->leibie=$request->input('category');
            $article->count=0;
            $article->content=$request->input('content');
            $article->save();
            return redirect('admin/index');
        }
        return view('admin.create');
    }
    public function jiazai(){
        $category=Category::all();
        return json_encode($category);
    }
}
