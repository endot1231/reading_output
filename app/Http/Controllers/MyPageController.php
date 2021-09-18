<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\OutPut;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


class MyPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['user'] = User::find($id);
        if($data['user'] == null){
            return abort(404);
        }

        $data['outputs'] = OutPut::where('user_id', $id)->paginate(10);
        return view('page.mypage',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        Log::debug("Profile name" .$request->profile_name);
        Log::debug("profile_comment" .$request->profile_comment);

        $user_id =$id;  
        $user = User::find($user_id);
        $user->name =$request->profile_name;
        $user->comment =$request->profile_comment;  

        $file = $request->file('profile_img');
        if(isset($file))
        {
            Storage::makeDirectory($user_id);
            // create original file name
            $imageName = str_shuffle(time().$file->getClientOriginalName()). '.' .$file->getClientOriginalExtension();
            $storedFilePath = Storage::putFileAs($user_id,$file,$imageName);
            $fileModel = File::create(['path' => $storedFilePath]);
            $user->profile_id = $fileModel->id;
        }

        $user->save();
        return['fin'=>''];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
