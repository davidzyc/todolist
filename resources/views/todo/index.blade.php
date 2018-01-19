@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @if (session('status'))
    <div class="panel panel-primary">
      <div class="panel-heading">
        {{ session('status') }}
      </div>
      <div class="panel-body">
        {{ session('info') }}
      </div>
    </div>
    @endif
    <a class="btn btn-lg btn-success" href="{{ url('todos/create') }}">Create TODO</a>
    <hr>
    @foreach($todos as $todo)
    <div class="panel">
      <div class="panel-body">
        <div class="row">
          <div class="col-md-2">
          <p>Status<br>@if($todo->status)
            <b>Completed</b>
            @else
            <b>Not Completed</b>
            @endif
          </p>
          <p>Priority:<br><b>{{ $todo->priority }}</b></p>
          @if($todo->due) <p>Due<br><b> {{ $todo->due }}</b></p> @endif
          <p>Created At<br><b>{{ $todo->created_at }}</b></p>
          </div>
          <div class="col-md-8">
              <h2>{{ $todo->title }}</h2>
            @if($todo->content) <p>{{ $todo->content }}</p> @endif
          </div>
          <div class="col-md-2">
            <form method="post" action="{{ URL::action('TodoController@destroy', ['id'=>$todo->id]) }}">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <a href="{{ URL::action('TodoController@toggle', ['id' => $todo->id]) }}" class="btn btn-default btn-block">Mark As @if($todo->status) Incompleted @else Completed @endif</a>
              <a href="{{ URL::action('TodoController@edit', ['id' => $todo->id]) }}" class="btn btn-default btn-block">Edit</a>
              <button type="submit" class="btn btn-danger btn-block">Delete</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>

</div>
@endsection
