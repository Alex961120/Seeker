@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @foreach($label->questions as $key => $question)
            <div class="card">
                @if($key==0)
                <div class="card-header">
                <h5>{{ $label->name }}</h5>
                <a class="btn-card-header" href="{{ route('label.follow',[$label->id]) }}">{{ $label->follow()->count() ? '取消关注' : '关注' }}</a>
                </div>
                @endif
                <div class="card-body">
                <p><a href="{{ route('question.show',[$question->id]) }}"><strong>{{ $question->title }}</strong></a></p>
                @if ($answer = $question->answer)
                <p>{{ str_limit($answer->content,250) }}</p>
                <a href="{{ route('answer.like',['id'=>$answer->id]) }}" class="btn btn-warning">赞 {{ $answer->likes->count() }}</a>
                @endif
                </div>
            </div>
            @endforeach 
        </div>
    </div>
</div>
@endsection