<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Thread; // 追加

class ThreadsController extends Controller
{
    public function index()
    {
        $threads = Thread::orderBy('updated_at', 'desc')->paginate(10);

        return view('welcome', [
            'threads' => $threads,
        ]);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:100',
            'content' => 'required|max:1200',
        ]);
        
        $request->user()->threads()->create([
            'user_id' => \Auth::user()->id,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect('/');
    }

    public function show($id)
    {
        $thread = Thread::find($id);
        $responses = $thread->responses()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'thread' => $thread,
            'responses' => $responses,
        ];

        $data += $this->counts($thread);

        return view('threads.show', $data);
    }
}