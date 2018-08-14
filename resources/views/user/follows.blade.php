<div class="card">
    <div class="card-header">关注</div>
    <div class="card-body">

        <ul class="list-group list-group-flush">
            @foreach($user->follows as $follower)

                <li class="list-group-item">
                    <a href="{{ route('user.show',[$follower->id]) }}"><img class="avatar-middle"
                                                                            src="{{ asset('/images/avatar/'.$follower->avatar) }}"><strong>{{ $follower->name }}</strong></a>
                    <a class="btn btn-link btn-follow" href="{{ route('user.follow',[$follower->id]) }}"
                       style="margin-top:10px;">
                        @if(Auth::id() != $follower->id)
                            @php $followed = Auth::user()->followed($follower->id) @endphp
                            @if($follower->followed(Auth::id()))
                                {{ $followed ? '互相关注': '关注'}}
                            @else
                                {{ $followed ? '取消关注' : '关注'}}
                            @endif
                        @endif
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
