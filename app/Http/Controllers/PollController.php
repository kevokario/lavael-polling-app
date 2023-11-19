<?php

namespace App\Http\Controllers;

use App\Models\PollQuestionOptions;
use App\Models\PollQuestions;
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
//        die($poll);
        if($poll == null) return redirect()->route('polls.view');

        return view('portal.single-poll',['poll'=>$poll]);
    }

    public function viewAdd()
    {
        return view('portal.add-poll');
    }
    public function viewAddQuestion($id)
    {
        $poll = Polls::find($id);
//        die($poll);
        if($poll == null) return redirect()->route('polls.view');
        return view('portal.single-poll',['createQuestion'=>'true','poll'=>$poll]);
    }

    public function createQuestion(Request $request, $id){
        $poll = Polls::find($id);

        $pollQuestion = new PollQuestions;
        $pollQuestion->poll = $poll->id;
        $pollQuestion->question = $request->input('question');

        $pollQuestion->save();

        foreach (json_decode($request->input('options')) as $opt) {
            $option = new PollQuestionOptions;
            $option->poll_question = $pollQuestion->id;
            $option->option = $opt;
            $option->save();
        }

        return json_encode(['success'=>'Question added successfully']);

    }

    public function viewUsersPoll()
    {
        $polls = Polls::all('id','title','description');
        return view('portal.users-poll',['polls'=>$polls]);
    }
    public function viewUserPoll($id)
    {
        $poll = Polls::select('id','title','description')
            ->where('id',$id)
            ->first();
        return view('portal.user-poll',['poll'=>$poll]);
    }

    public function create(Request $request)
    {
       $this->validate($request,[
           'title'=>['required'],
            'description'=>['required'],
            'user'=>''
        ]);

       $similarPolls = Polls::where('title',$request->input('title'))->get();


        if(count($similarPolls)>0)   return back()->withInput()->with('error',['Poll exists']);

        $poll = new Polls;
        $poll->user = $request->input('user');
        $poll->title = $request->input('title');
        $poll->description = $request->input('description');

        return !$poll->save()
            ?
            view('portal.add-poll',['success'=>"Poll ".$poll->title." created successfully"])
            :
            back()->withInput()->with('errors',['unable to create poll']);

    }

    public function delete(){
        return "some link";
    }
}
