<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Responses; // 追加

class ResponsesController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:1200',
        ]);

        $request->user()->responses()->create([
            'user_id' => \Auth::user()->id,
            'thread_id' => $request->thread_id,
            'content' => $request->content,
        ]);

        return back();
    }
}
