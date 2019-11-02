@extends('layouts.app')

@section('content')

    <h5>{{ $thread->title }}</h5>
    <h6>{{ $thread->user->name }}　[投稿日時] {{ $thread->created_at }}</h6>
    <p>{!! nl2br($thread->content) !!}</p>
    <br>

    @if ($count_responses > 0)
        <table class="table table-striped">
            <tbody>
                @foreach ($responses as $response)
                <tr>
                    <td>{{ $count_responses-- }}</td>
                    <td>{{ $response->user->name }}</td>
                    <td>{{ $response->updated_at }}</td>
                    <td>{!! nl2br($response->content) !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
    {{ $responses->links('pagination::bootstrap-4') }}

    {!! Form::open(['route' => ['responses.store']]) !!}
        <div class="form-group">
            <div>レスを投稿する</div>
            {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '5', 'class'=>"input-xxlarge"]) !!}
            {!! Form::textarea('thread_id', $thread->id, ['hidden', 'readonly', 'class' => 'form-control', 'rows' => '1', 'class'=>"input-xxlarge"]) !!}
            <div>{!! Form::submit('投稿する', ['class' => 'btn btn-primary btn-block', 'class'=>"input-xxlarge"]) !!}</div>
        </div>
    {!! Form::close() !!}

@endsection