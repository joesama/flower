@extends('joesama/flower::layouts.console')

@section('flower')
<div class="row">
	<div class="col-md-12">
    {!! Form::open(array('url' => url()->current(), 'method' => 'POST', 'class' => 'form-horizontal form-validation')) !!}
    {!! Form::hidden('id', data_get($flow,'id') ) !!}
      <div class="form-group">
        <label for="fullname" class="col-sm-2 control-label">
          {{ trans('joesama/flower::content.flow.name') }}<span class="text-danger">&nbsp;*</span>
        </label>
        <div class="col-sm-10">
          {!! Form::text('name', data_get($flow,'jff_name',old('name')) , array('required','class' => 'form-control', 'id' => 'fullname','placeholder' => trans('joesama/flower::content.flow.name') )) !!}
        </div>
      </div>
      
      <div class="form-group">
        <label for="fullname" class="col-sm-2 control-label">
          {{ trans('joesama/flower::content.flow.code') }}<span class="text-danger">&nbsp;*</span>
        </label>
        <div class="col-sm-10">
          {!! Form::text('code', data_get($flow,'jff_code',old('code')) , array('required','class' => 'form-control', 'id' => 'fullname','placeholder' => trans('joesama/flower::content.flow.code') )) !!}
        </div>
      </div>
      
      <div class="form-group">
        <label for="email" class="col-sm-2 control-label">
        {{ trans('joesama/flower::content.flow.desc') }}<span class="text-danger">&nbsp;*</span>
        </label>
        <div class="col-sm-10">
          {!! Form::textarea('desc', data_get($flow,'jff_desc',old('desc')) , array('required','class' => 'form-control', 'id' => 'email','placeholder' => trans('joesama/flower::content.flow.desc') )) !!}
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10 text-right">
          <button type="submit" class="btn btn-primary">
          {{  trans('threef/entree::entree.button.save')  }}
          </button>
        </div>
      </div>
      {!! Form::close() !!}
	</div>
</div>

@stop

@push('flower.footer')

@endpush