<div class="card" id="answers">
  <div class="card-header">回答</div>
  <div class="card-body">
  @foreach($user->answers as $answer)
  <p><a href="{{ route('question.show',[$answer->question->id]) }}">{{ $answer->question->title }}</a></p>
  <p>{{ str_limit($answer->content,150) }}</p>
  @endforeach
  </div>
</div>