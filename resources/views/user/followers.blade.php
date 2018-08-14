<div class="card">
    <div class="card-header">粉丝</div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            @foreach($user->followers as $follower)
                <li class="list-group-item">
                    <a href="{{ route('user.show',[$follower->id]) }}">
                        <img class="avatar-middle" src="{{ asset('/images/avatar/'.$follower->avatar) }}">
                        <strong>{{ $follower->name }}</strong>
                    </a>
                    <a class="btn btn-link btn-follow" href="{{ route('user.follow',[$follower->id]) }}"
                       style="margin-top:10px;">
                        @if($user->id == Auth::id())
                            {{ Auth::user()->followed($follower->id) ? '互相关注' : '关注' }}
                        @elseif($follower->followed(Auth::id()))
                            取消关注
                        @else
                            {{ $follower->id == Auth::id() ? '' : '关注' }}
                        @endif
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
