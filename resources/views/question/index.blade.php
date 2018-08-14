@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($questions as $key => $question)
                    <div class="card">
                        @if($key==0)
                            <div class="card-header">问题列表</div>
                        @endif
                        <div class="card-body">
                            <p><a href="/user/{{ $question->user->id }}">
                                    <img class="avatar-small"
                                         src="{{ asset('images/avatar/'.$question->user->avatar) }}">
                                    {{ $question->user->name }}
                                </a></p>
                            <p>
                                <a href="{{ route('question.show',[$question->id]) }}"><strong>{{ $question->title }}</strong></a>
                            </p>
                            @if ($answer = $question->answer)
                                <p>{{ str_limit($answer->content,250) }}</p>
                                <a id="answer{{ $answer->id }}" href="{{ route('answer.like',['id'=>$answer->id]) }}"
                                   class="btn btn-warning">
                                    赞 {{ $answer->likes->count() }}
                                </a>
                                <a href="{{ route('question.show',[$question->id]) }}"
                                   class="btn btn-link">
                                    {{ $question->answers->count() }} 个回答
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
                {{ $questions->links() }}
            </div>
        </div>
    </div>
@endsection
