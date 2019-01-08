<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class ThreadsController extends Controller
{
    public function index(){
        $threads = DB::table('threads')
            ->join('users', 'users.id', '=', 'threads.author_id')
            ->get();
        return view('threads', compact('threads'));
    }

    public function create(Request $request){
        $threadName=$request->input('threadname');
        $authorId=null;
        if (Auth::check())
        {
            $authorId = Auth::user()->id;
        }

        $query = DB::table('threads')
            ->insert(['thread_name' => $threadName, 'author_id' => $authorId]);

        $createdThreadId = DB::getPdo()->lastInsertId();

//        $this->validate($request, [
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//        ]);
$imagename = "";
        if ($request->hasfile('image')) {
            print 'it does';
            $image = $request->file('image');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imagename);
        }
        $message = $request->input('message');
        $date = date('Y-m-d G:i:s');
        $query = DB::table('messages')
            ->insert(['img_path'=>$imagename,'message_text'=>$message,'date'=>$date,'author_id'=>$authorId]);
        $createdMessageId = DB::getPdo()->lastInsertId();
        $query = DB::table('thread_message')
            ->insert(['thread_id'=>$createdThreadId,'message_id'=>$createdMessageId]);
    }
}
