@extends('layouts.app')

@section('content')
    @if (Auth::check())
        @if (Auth::id() == '1' || Auth::user()->admin == 'yes')
            @if (count($users) > 0)
                <ul class="list-unstyled">
                    @foreach ($users as $user)
                        <li>
                            {{ $user->name }}　　{{ $user->email }}　　
                            プロ登録・解除ボタン
                            管理者登録・解除ボタン
                        </li>
                    @endforeach
                </ul>
                {{ $users->links('pagination::bootstrap-4') }}
            @endif
        @endif
    @endif
@endsection