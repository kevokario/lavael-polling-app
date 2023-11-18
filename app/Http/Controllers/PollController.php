<?php

namespace App\Http\Controllers;

use App\Models\Polls;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PollController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    //
    public function index()
    {
        $polls = Polls::all('id','title','description');

        return view('portal.view-poll',['polls'=>$polls]);
    }

    public function viewSinglePoll($id){
        $poll = Polls::find($id);
        if($poll == null) return redirect()->route('polls.view');

        return view('portal.single-poll',['poll'=>$poll]);
    }

    public function viewAdd()
    {
        return view('portal.add-poll');
    }

    public function viewUsersPoll()
    {
        return view('portal.users-poll');
    }

    public function create(Request $request)
    {
       $this->validate($request,[
           'title'=>['required'],
            'description'=>['required'],
            'user'=>''
        ]);

       $similarPolls = Polls::where('title',$request->input('title'))->get();


        if(count($similarPolls)>0){
            return back()->withInput()->with('error',['Poll exists']);
        } else {
            $poll = new Polls;
            $poll->user = $request->input('user');
            $poll->title = $request->input('title');
            $poll->description = $request->input('description');

        return !$poll->save()
            ?
               view('portal.add-poll',['success'=>'Poll created successfully'])
            :
             back()->withInput()->with('error',['unable to create poll']);
        }


    }
}
