<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OutPut;
use App\Models\History;
use Illuminate\Support\Facades\Log;

class OutputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OutPut::get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.output.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request['title'];
        $id = Auth::id();
        $output = OutPut::create(['title'=>$title,'user_id'=> $id,'is_draft' => true]);
        return redirect()->route('output.edit', ['output' => $output->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $output = OutPut::find($id);
        if (Auth::check()) {
            History::create([
                'user_id'=>Auth::id(),
                'output_id'=>$id,
            ]);
        }
        
        if($output == null){
            abort(404);
        }

        return view('page.output.detail',['output'=>$output]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id = Auth::id();
        $outPut = OutPut::where('user_id', $user_id )->where('id', $id )->first();
        if($outPut == null){
            abort(404);
        }
        $data['output'] = $outPut;
        $data['content'] = sanitizeHtml($outPut->content);
        $data['mode'] = 'edit';
        return view('page.output.edit',$data);
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
        $user_id = Auth::id();
        $outPut = OutPut::where('user_id', $user_id )->where('id', $id )->first();
        $outPut->title = $request->title;
        $outPut->content = $request->content;
        $outPut->save();
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
        $user_id = Auth::id();
        $outPut = OutPut::where('user_id', $user_id )->where('id', $id )->first();
        if($outPut == null){abort('404');}
        $outPut->delete();
        return['fin'=>''];
    }
}
