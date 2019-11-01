@extends('layouts.app')

@section('content')
    @include('threads.threads')


<!-- 管理者のみ表示-->
    @if (Auth::check())
        @if (Auth::id() == '1' || Auth::user()->admin == 'yes')
            <button type="button" class="btn btn-outline-warning">{!! link_to_route('users.index', '!! all users !!') !!}</button>
        @endif
    @endif

@endsection