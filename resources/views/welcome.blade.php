@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <h1>Welcome</h1>
        </div>
    </div>

    @if (Auth::check())
        @if (Auth::id() == '1' || Auth::user()->admin == 'yes')
            <button type="button" class="btn btn-outline-warning">{!! link_to_route('users.index', '!! all users !!') !!}</button>
        @endif
    @endif

@endsection