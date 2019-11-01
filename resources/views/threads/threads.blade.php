@extends('layouts.app')

@section('content')

    <h1>スレッド一覧</h1>

    @if (count($threads) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>タイトル</th>
                    <th>更新日時</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($threads as $thread)
                <tr>
                    <td>{{ $thread->id }}</td>
                    <td>{{ $thread->title }}</td>
                    <td>{{ $thread->updated_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
    {{ $threads->links('pagination::bootstrap-4') }}
    
        {!! Form::open(['route' => 'threads.store']) !!}
            <div class="form-group">
                <label>題名：</label>
                {!! Form::textarea('title', old('title'), ['class' => 'form-control', 'rows' => '1', 'class'=>"input-xxlarge"]) !!}
                {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '5', 'class'=>"input-xxlarge"]) !!}
                {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block', 'class'=>"input-xxlarge"]) !!}
            </div>
        {!! Form::close() !!}
@endsection