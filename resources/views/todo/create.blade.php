@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <h1><a href="{{ url('todos') }}" class="btn btn-default btn-lg">Back</a> Create TODO</h1>
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
        <form method="post" action="{{ url('todos') }}">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title">
            <p class="help-block">No more than 255 characters.</p>
          </div>
          <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" rows="3" name="content" id="content"></textarea>
          </div>
          <div class="form-group">
            <label for="priority">Priority</label>
            <select class="form-control" id="priority" name="priority">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
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
