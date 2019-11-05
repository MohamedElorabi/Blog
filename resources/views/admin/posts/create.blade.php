@extends('admin.index')
@section('content')


<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>('posts'), 'enctype'=>'multipart/form-data']) !!}
    {{ csrf_field() }}
     <div class="form-group">
        {!! Form::label('title',trans('admin.post_title')) !!}
        {!! Form::text('title',('title'),['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('description',trans('admin.post_description')) !!}
        {!! Form::text('description',('description'),['class'=>'form-control']) !!}
   </div>
     <div class="form-group">
        {!! Form::label('body',trans('admin.post_body')) !!}
        {!! Form::textarea('body',('body'),['class'=>'form-control tinymce']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('url',trans('admin.post_url')) !!}
        {!! Form::file('url',['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('user_id',trans('admin.user_id'),['class'=>'form-control-label col-sm-2'])!!}
        {!! Form::select('user_id',App\User::pluck('name'.session('lang'),'id'),old('user_id'),['class'=>'form-control','placeholder'=>'..........'])!!}
     </div>
     <div class="form-group">
        {!! Form::label('category_id',trans('admin.category_id'),['class'=>'form-control-label col-sm-2'])!!}
        {!! Form::select('category_id',App\Category::pluck('name'.session('lang'),'id'),old('category_id'),['class'=>'form-control','placeholder'=>'..........'])!!}
     </div>
     {!! Form::submit(trans('admin.create_post'),['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->



@endsection
