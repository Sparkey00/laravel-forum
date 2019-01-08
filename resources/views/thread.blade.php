
@extends('layouts.app')

@section('content')

<table class="post-table">
    <thead>
    <th class="text-center" colspan="2">{{$threadname[0]->thread_name}}</th>
    </thead>
    @foreach($thread as $post)
        <tr>
            <td class="text-right" colspan="2">{{$post->name}} в {{$post->date}}</td>
        </tr>
        @if($post->img_path!="")
            <tr>
                <td class="td-image"><img src = "{{ asset('/images/'.$post->img_path) }}" width="200" height="200"/></td>
                <td>{!! $post->message_text !!}</td>
            </tr>
        @else
            <tr>
                <td colspan="2">{!!  $post->message_text !!}</td>
            </tr>
        @endif
        @endforeach
<tr><td colspan="2">
<form enctype='multipart/form-data' action="/newpost" class="content" method="post" >
    @csrf
    <div id='messageformat' >
        <button class="edit-button" type='button' id='bold-button' onclick='insertBold()'><b>Ж</b></button>
        <button class="edit-button" type='button' id='italic-button' onclick='insertItalic()'><i>К</i></button>
        <button class="edit-button" type='button' id='strike-button' onclick='insertStrike()'><u>Ч</u></button>
        <br>
        <textarea id='message-area' name='message'></textarea><br>
    </div>
    <input type='hidden' name='threadid' value='{{$threadid}}'>
    <input class="edit-button" type='file' name='image'>
    <input class="edit-button" type='submit' value='Написать'>
</form>
</td></tr>
</table>
@endsection

