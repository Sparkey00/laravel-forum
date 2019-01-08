@extends('layouts.app')

@section('content')
    <form enctype='multipart/form-data' action="/newthread" class="content" method="post" >
        @csrf
        <div class="col-lg-auto">
            <input type="text" name="threadname" placeholder="Название темы">
        </div>
        <div id='messageformat' >
            <button class="edit-button" type='button' id='bold-button' onclick='insertBold()'><b>Ж</b></button>
            <button class="edit-button" type='button' id='italic-button' onclick='insertItalic()'><i>К</i></button>
            <button class="edit-button" type='button' id='strike-button' onclick='insertStrike()'><u>Ч</u></button>
            <br>
            <textarea id='message-area' name='message'></textarea><br>
        </div>
        {{--<input type='hidden' name='threadid' value='{{$threadid}}'>--}}
        <input class="edit-button" type='file' name='image'>
        <input class="edit-button" type='submit' value='Написать'>
    </form>
@endsection