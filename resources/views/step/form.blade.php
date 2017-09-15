@extends('joesama/flower::layouts.console')

@section('flower')
<div class="row">
	<div class="col-md-12">
    {!! Form::open(array('url' => url()->current(), 'method' => 'POST', 'class' => 'form-horizontal form-validation')) !!}
    
      <div class="form-group">
        <label for="fullname" class="col-sm-2 control-label">
          {{ trans('joesama/flower::content.step.current') }}
          @if($parent)
          <span class="text-danger">&nbsp;*</span>
          @endif
        </label>
        <div class="col-sm-10">
          {{data_get($parent,'jfs_code')}}&nbsp;:&nbsp;{{data_get($parent,'jfs_name')}}
          {!! Form::hidden('current', data_get($parent,'id') ) !!}
          {!! Form::hidden('id', request()->segment(5) ) !!}
        </div>
      </div>
      <div class="form-group">
        <label for="fullname" class="col-sm-2 control-label">
          {{ trans('joesama/flower::content.step.next') }}<span class="text-danger">&nbsp;*</span>
        </label>
        <div class="col-sm-10">
          {!! Form::text('next', data_get($step,'jfs_name',old('next')) , array('required','class' => 'form-control', 'id' => 'next','placeholder' => trans('joesama/flower::content.step.next') )) !!}
        </div>
      </div>
      <div class="form-group">
        <label for="fullname" class="col-sm-2 control-label">
          {{ trans('joesama/flower::content.step.code') }}<span class="text-danger">&nbsp;*</span>
        </label>
        <div class="col-sm-10">
          {!! Form::text('code', data_get($step,'jfs_code',old('code', $code)) , array('required','readonly','class' => 'form-control', 'id' => 'fullname','placeholder' => trans('joesama/flower::content.step.code') )) !!}
        </div>
      </div>
      
      <div class="form-group">
        <label for="state" class="col-sm-2 control-label">
        {{ trans('joesama/flower::content.step.state.success') }}&nbsp;/&nbsp;{{ trans('joesama/flower::content.step.state.failed') }}<span class="text-danger">&nbsp;*</span>
        </label>
        <div class="col-sm-10">
        <?php $condition = [ 
          0 => trans('joesama/flower::content.step.state.failed'), 
          1 => trans('joesama/flower::content.step.state.success') 
          ]; ?>
                  {!! Form::select('state', $condition , data_get($step,'state',old('state',1)), ['required', 'class' => "input-with-feedback col-md-12 ui-toggle-switch" , "role"=>"agreement"] ) !!}
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