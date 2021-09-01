<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\OutPut;

class HomeController extends Controller
{
    public function boot(){
        Paginator::useBootstrap();
    }

    public function index(Request $request)
    {
        $outputs =OutPut::paginate(5);
        return view('page.index',['outputs'=>$outputs]);
    }

    public function show(){

    }

}
