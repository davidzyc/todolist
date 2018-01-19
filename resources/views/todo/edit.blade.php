@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <h1><a href="{{ url('todos') }}" class="btn btn-default btn-lg">Back</a> Edit TODO (id: {{ $todo->id }})</h1>
    <hr>
    @if ($errors->any())
    <div class="panel panel-danger">
      <div class="panel-heading">
        Error
      </div>
      <div class="panel-body">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
      </div>
    </div>
    @endif
    <div class="panel">
      <div class="panel-body">
        <form method="post" action="{{ URL::action('TodoController@update', ['id' => $todo->id]) }}">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $todo->title }}">
            <p class="help-block">No more than 255 characters.</p>
          </div>
          <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" rows="3" name="content" id="content">{{ $todo->content }}</textarea>
          </div>
          <div class="form-group">
            <label for="priority">Priority</label>
            <select class="form-control" id="priority" name="priority">
              <option value="1" @if($todo->priority == 1) selected @endif>1</option>
              <option value="2" @if($todo->priority == 2) selected @endif>2</option>
              <option value="3" @if($todo->priority == 3) selected @endif>3</option>
              <option value="4" @if($todo->priority == 4) selected @endif>4</option>
              <option value="5" @if($todo->priority == 5) selected @endif>5</option>
            </select>
          </div>
          <input type="hidden" name="status" value="0">
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection
