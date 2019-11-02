@extends('layouts.app')

@section('content')

<?php $i = 1 ?>

    <h3>スレッド一覧</h3>

    @if (count($threads) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>タイトル</th>
                    <th>レス数</th>
                    <th>更新日時</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($threads as $thread)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{!! link_to_route('threads.show', $thread->title, ['id' => $thread->id], []) !!}</td>
                    <td style="text-align:center;">{{ $thread->responses()->count() }}</td>
                    <td>{{ $thread->updated_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
    {{ $threads->links('pagination::bootstrap-4') }}
    
        {!! Form::open(['route' => 'threads.store']) !!}
            <div class="form-group" "align-middle">
                <div>新規スレッド作成</div>
                {!! Form::textarea('title', old('title'), ['placeholder' => 'タイトル', 'class' => 'form-control', 'rows' => '1', 'class'=>"input-xxlarge"]) !!}
                {!! Form::textarea('content', old('content'), ['placeholder' => '本文', 'class' => 'form-control', 'rows' => '5', 'class'=>"input-xxlarge"]) !!}
                <div>{!! Form::submit('スレッドを作成する', ['class' => 'btn btn-primary btn-block', 'class'=>"input-xxlarge"]) !!}</div>
            </div>
        {!! Form::close() !!}
        
    <!-- 管理者のみ表示-->
    @if (Auth::check())
        @if (Auth::id() == '1' || Auth::user()->admin == 'yes')
            <button type="button" class="btn btn-outline-warning">{!! link_to_route('users.index', '!! all users !!') !!}</button>
        @endif
    @endif

@endsection
