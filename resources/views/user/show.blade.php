@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

              <div class="card-avatar">
              <img src="{{ asset("images/avatar/$user->avatar") }}" alt="Card image cap">
              </div>
              <div class="card">
              <div class="card-header">
              <h5>{{ $user->name }}</h5>
              @if($user->id != Auth::id())
                  <a href="{{ route('message.read',[$user->id]) }}" class="btn-card-header">私信</a>
                  <a class="btn-card-header" href="{{ route('user.follow',[$user->id]) }}">
                      @if(Auth::user()->followed($user->id))
                          {{ $user->followed(Auth::id()) ? '互相关注' : '取消关注' }}
                      @else
                          关注
                      @endif
                  </a>
              @endif
              </div>
              <div class="card-body">
              <a href="{{ route('user.show',[$user->id]) }}" class="btn btn-link">动态</a>
              <a href="{{ route('user.answers',[$user->id]) }}" class="btn btn-link">回答 {{ $user->answers->count() }}</a>
              <a href="{{ route('user.questions',[$user->id]) }}" class="btn btn-link">提问  {{ $user->questions->count() }}</a>
              <a href="{{ route('user.follows',[$user->id]) }}" class="btn btn-link">{{ Auth::id()==$user->id ? '我':'TA' }}的关注</a>
              <a href="{{ route('user.followers',[$user->id]) }}" class="btn btn-link">{{ Auth::id()==$user->id ? '我':'TA' }}的粉丝</a>
              </div>
             </div>

              @if(Route::currentRouteName() == 'user.show')
                @include('user.profile',['user'=>$user])
              @else
                @include(Route::currentRouteName(),['user'=>$user])
              @endif
        </div>
    </div>
</div>
@endsection
