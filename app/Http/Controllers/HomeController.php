<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\OutPut;
use App\Models\History;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function boot(){
        Paginator::useBootstrap();
    }

    public function index(Request $request)
    {
        if($request->has('keyword')){
            $keyword = $request->get('keyword');
            $request->session()->put('keyword',$keyword);
            $outputs =OutPut::with('user')->where('title','like', "%$keyword%")->orderBy('created_at','desc')->paginate(10);
        }else{
            $request->session()->forget('keyword');
            $outputs =OutPut::with('user')->orderBy('created_at','desc')->paginate(10);
        }
        return view('page.index',['outputs'=>$outputs]);   
    }

    public function history(Request $request){
        if (!Auth::check()) {
            abort('404');
        }

        if($request->has('keyword')){
            $keyword = $request->get('keyword');
            $request->session()->put('keyword',$keyword);

            $histories =  History::where('user_id',Auth::id())->whereHas('output',function($query)use($keyword){
                $query->where('title','like', "%$keyword%");
            })->orderBy('created_at','desc')->paginate(10);
        }else{
            $request->session()->forget('keyword');
            $histories =  History::where('user_id',Auth::id())->has('output')->orderBy('created_at','desc')->paginate(10);
        }
        return view('page.history',['histories'=>$histories]);   
    }

}
