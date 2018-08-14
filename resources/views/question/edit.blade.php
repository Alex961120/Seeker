@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">修改问题</div>

                <div class="card-body">
                    <form method="post" action="{{ route('question.update',$question->id) }}">
                      @method('PUT')
                      @csrf
                      <div class="form-group">
                        <label for="question">问题</label>
                        <input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="question" value="{{old('title') ?? $question->title}}">
                        @if ($errors->has('title'))
                        <p class="alert alert-danger">{{ $errors->first('title') }}</p>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="description">问题描述</label>
                        <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="description" rows="8">{{old('description') ?? $question->description}}</textarea>
                        @if ($errors->has('description'))
                        <span class="invalid-feedback">
                        <strong>{{ $errors->first('description') }}</strong>
                        </span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="Label">标签</label>
                        <input type="text" class="form-control{{ $errors->has('labels') ? ' is-invalid' : '' }}" name="labels" id="labels" value="{{old('labels') ?? implode(array_column($question->labels->toArray(),'name'),' ')}}" placeholder="多个标签用空格分隔">
                        @if ($errors->has('description'))
                        <span class="invalid-feedback">
                        <strong>{{ $errors->first('labels') }}</strong>
                        </span>
                        @endif
                      </div>
                      <button type="submit" class="btn btn-primary">提交</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection