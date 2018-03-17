@extends('main')

<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "| $titleTag")

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>{{ $post->title }}</h1>
      <p>{{ $post->body }}</p>
      <hr>
      <p>Posted In: {{ $post->category->name }}</p>
    </div>
  </div>

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      @foreach($post->comments as $comment)
        <div>
          <p><strong>Name:</strong> {{ $comment->name }} </p>
          <p><strong>Comment:<br></strong> {{ $comment->comment }} </p><hr>
        </div>
      @endforeach
    </div>
  </div>

  <div class="row">
    <div class="col-md-8 col-md-offset-2" style="margin-top: 20px;">
      {{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}
      <div class="row">
        <div class="col-md-6">
          {{ Form::label('name', 'Name:') }}
          {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div>
        <div class="col-md-6">
          {{ Form::label('email', 'Email:') }}
          {{ Form::text('email', null, ['class' => 'form-control']) }}
        </div>
        <div class="col-md-12" style="margin-top: 20px;">
          {{ Form::label('comment', 'Comment:') }}
          {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}

          {{ Form::submit('Add comment', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top: 20px;']) }}
        </div>
      </div>
      {{ Form::close() }}
    </div>
  </div>
@endsection