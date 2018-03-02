@extends('main')

@section('title', '| Edit Blog Post')

@section('css')
  {!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')

  <div class="row">
    {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
    <div class="col-md-8">
      {{ Form::label('title', 'Title:') }}
      {{ Form::text('title', null, ['class' => 'form-control input-lg']) }}

      {{ Form::label('slug', 'Slug:', ['style' => 'margin-top:20px;']) }}
      {{ Form::text('slug', null, ['class' => 'form-control']) }}

      {{ Form::label('category_id', 'Category:', ['style' => 'margin-top: 20px;']) }}
      {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}

      {{ Form::label('tags', 'Tag:', ['style' => 'margin-top: 20px;']) }}
      {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}

      {{ Form::label('body', "Body:", ['style' => 'resize:none; margin-top:20px;']) }}
      {{ Form::textarea('body', null, ['class' => 'form-control', 'rows' => '10', 'style' => 'resize:none;']) }}

    </div>
    <div class="col-md-4">
      <div class="well">

        <dl class="dl-horizontal">
          <label>Url Slug:</label>
          <p><a href="{{ url($post->slug)}}">{{ url($post->slug) }}</a></p>
        </dl>
        <dl class="dl-horizontal">
          <label>Category:</label>
          <p>{{ $post->category->name }}</p>
        </dl>
        <dl class="dl-horizontal">
          <label>Created At:</label>
          <p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
        </dl>
        <dl class="dl-horizontal">
          <label>Last Updated:</label>
          <p>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</p>
        </dl>
        
        <hr>
        <div class="row">
          <div class="col-sm-6">
            {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
          </div>
          <div class="col-sm-6">
            <a href="{{ route('posts.show', $post->id, 'Cancel') }}" class="btn btn-danger btn-block">Cancel</a>
          </div>
        </div>

      </div>
    </div>
    {!! Form::close() !!}
  </div> {{-- End of .row (form) --}}

@stop

@section('scripts')
  {!! Html::script('js/select2.min.js') !!}

  <script type="text/javascript">
    $('.select2-multi').select2();
    {{--$('.select2-multi').select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');--}}
  </script>
@endsection
