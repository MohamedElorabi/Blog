@extends('admin.index')
@section('content')


<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>('categories')]) !!}
     <div class="form-group">
        {!! Form::label('name',trans('post.name')) !!}
        {!! Form::text('name',('name'),['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('discription',trans('admin.email')) !!}
        {!! Form::text('discription',('discription'),['class'=>'form-control']) !!}
     </div>

     {!! Form::submit(trans('admin.create_admin'),['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->



@endsection
