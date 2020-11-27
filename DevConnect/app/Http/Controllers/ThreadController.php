<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Thread;
use App\ThreadFilters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ThreadController extends Controller
{
//to apply middleware here we need tomake a constructor

public function _construct(){

     // Auth();
    // $this->middleware('auth');
     return $this->middleware('auth')->except('index');//it applies to all except index
}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $threads = Thread::paginate(15);
        return view('thread.index',compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('thread.create');
       

         
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
       

        //validate

        $this->validate($request, [
            'subject' => 'required|min:5',
            'type'    => 'required',
            'thread'  => 'required|min:10',
        //  'g-recaptcha-response' => 'required|captcha'
        ]);

        //store
          //get the current user logged in
           $user= auth()->user();
           if($user)
           {
            // do what you need to do
            auth()->user()->threads()->create($request->all());

            return back()->withMessage('Thread Created successfully!');
           
        }
           // return redirect()->route('login');
           return back()->withNumber(2);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Thread $thread)
    {
        $user= auth()->user();
        if($user)
        {
            return view('thread.single', compact('thread'));
        }
            
         return redirect()->route('login');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        //
        return view('thread.edit',compact('thread'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        //

        if(auth()->user()->id !== $thread->user_id){
            return back()->withError("You are not authenticated");
        }
         //validate

         $this->validate($request, [
            'subject' => 'required|min:10',
            'type'    => 'required',
            'thread'  => 'required|min:20',
//            'g-recaptcha-response' => 'required|captcha'
        ]);

       
        $thread->update($request->all());

        return redirect()->route('thread.show', $thread->id)->withMessage('Thread Updated succssfully!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        //
        if(auth()->user()->id !== $thread->user_id){
            return back()->withError("You are not authenticated");
        }
        $thread->delete();

        return redirect()->route('thread.index')->withMessage("Thread Deleted!");
    }

    public function markAsSolution()
    {
        $solutionId = Input::get('solutionId');
        $threadId = Input::get('threadId');

        $thread = Thread::find($threadId);
        $thread->solution = $solutionId;
        if ($thread->save()) {
            if (request()->ajax()) {
                return response()->json(['status' => 'success', 'message' => 'marked as solution']);
            }
            return back()->withMessage('Marked as solution');
        }


    }

    public function search()
    {
        $query=request('query');

        $threads = Thread::search($query)->with('tags')->get();

        return view('thread.index', compact('threads'));


    }
}
