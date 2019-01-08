<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomClasses\MessagesWrapper;
use DB;
use Auth;

class ThreadController extends Controller
{
    public function  show($threadid) {

        $thread = DB::table('messages')
            ->join('thread_message', function($join) use ($threadid){
                $join->on('thread_message.message_id', '=', 'messages.message_id')
                    ->where('thread_message.thread_id','=', $threadid);
            })
            ->join('users', 'users.id', '=', 'messages.author_id')
            ->select('messages.message_text', 'messages.img_path', 'users.name', 'messages.date')
            ->orderBy('messages.message_id','asc')
            ->get();

        return view('thread', compact('thread','threadid'));
    }

    public function new(Request $request){
        $authorId=null;
        if (Auth::check())
        {
            $authorId = Auth::user()->id;
        }
        $createdThreadId = $request->threadid;

        $imagename = "";
        if ($request->hasfile('image')) {
            print 'it does';
            $image = $request->file('image');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imagename);
        }
        $message = MessagesWrapper::format($request->input('message'));
        $date = date('Y-m-d G:i:s');
        $query = DB::table('messages')
            ->insert(['img_path'=>$imagename,'message_text'=>$message,'date'=>$date,'author_id'=>$authorId]);
        $createdMessageId = DB::getPdo()->lastInsertId();
        $query = DB::table('thread_message')
            ->insert(['thread_id'=>$createdThreadId,'message_id'=>$createdMessageId]);

        return redirect('/threads/'.$request->threadid);
    }


}
