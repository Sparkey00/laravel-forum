
@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    {{--@if (Route::has('login'))--}}
        {{--<div class="top-right links">--}}
            {{--@auth--}}
                {{--<a href="{{ url('/home') }}">Home</a>--}}
            {{--@else--}}
                {{--<a href="{{ route('login') }}">Login</a>--}}

                {{--@if (Route::has('register'))--}}
                    {{--<a href="{{ route('register') }}">Register</a>--}}
                {{--@endif--}}
            {{--@endauth--}}
        {{--</div>--}}
    {{--@endif--}}
    @if(isset($threads[0]))

        <table class="table-fill">
            <thead>
            <tr>
                <th class="text-left">Тема</th>
                <th class="text-left">Автор</th>
            </tr>
            </thead>
            <tbody class="table-hover">
            @foreach($threads as $thread)
                <tr><td class="text-left"><a href="/threads/{{$thread->thread_id}}"> {{$thread->thread_name}}</a></td>
                <td class="text-left">{{$thread->name??'anon'}}</td></tr>
            @endforeach
            @auth
                    <tr><td colspan="2"><a href="/createthread">Создать тему</a></td></tr>
            @endauth
            </tbody>
        </table>

    @else
            <div class="content">
                <h1>Тредов пока нет :(</h1>
                @if (Route::has('login'))
                @auth
                        <a href="/createthread">Напиши первым!</a>
                @else
                        <a href="{{ route('register') }}">Зарегистрируйтесь чтобы создать новый!</a>
            @endauth
            </div>
        @endif
    @endif
</div>
    @endsection
