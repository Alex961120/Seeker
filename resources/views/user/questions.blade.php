<div class="card" id="questions">
  <div class="card-header">提问</div>
  <div class="card-body">
  @foreach($user->questions as $question)
  <p><a href="{{ route('question.show',[$question->id]) }}">{{ $question->title }}</a></p>
  <p>{{ str_limit($question->answer->content ?? '',150) }}</p>
  @endforeach
  </div>
</div>