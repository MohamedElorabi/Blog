@extends('admin.index')
@section('content')


<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>('categories/'.$category->id),'method'=>'put' ]) !!}
     <div class="form-group">
        {!! Form::label('name',trans('category.name')) !!}
        {!! Form::text('name',$category->name,['class'=>'form-control']) !!}
     </div>
     <div class="form-group">
        {!! Form::label('discription',trans('category.discription')) !!}
        {!! Form::text('discription',$category->discription,['class'=>'form-control']) !!}
     </div>

     {!! Form::submit(trans('category.save'),['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->




@endsection
