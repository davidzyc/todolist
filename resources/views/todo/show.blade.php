@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="panel">
      <div class="panel-heading">
        <h1>{{ $todo->title }}</h1>
      </div>
      <div class="panel-body">
        <p>Status: @if($todo->status)
          <b>Completed</b>&nbsp;<a href="#" class="btn btn-primary">Mark as NOT Completed</a>
          @else
          <b>Not Completed</b>&nbsp;<a href="#" class="btn btn-primary">Mark as Completed</a>
          @endif</p>
        <p>{{ $todo->content }}</p>
      </div>
    </div>
  </div>

</div>
@endsection
