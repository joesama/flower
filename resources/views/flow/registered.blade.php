@extends('joesama/flower::layouts.console')

@section('flower')
<div class="row">
	<div class="col-md-12">
		<a href="{{ handles('joesama/flower::admin/flower/new') }}" class="btn btn-primary btn-sm btn-label pull-right" >
			<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;
          {!! strtoupper(trans('joesama/flower::content.flow.new')) !!}
        </a>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
			<table class='table table-hover table-condensed' >
				<thead>
					<tr>
						<th>
							<strong>{!! strtoupper(trans('joesama/flower::content.flow.name')) !!}</strong>
							<small>{!! ucwords(trans('joesama/flower::content.flow.desc')) !!}</small>
						</th>
					</tr>
				</thead>
				<tbody>
					@forelse($flow as $row)
					<tr>
						<td>
							<strong>{{ data_get($row,'jff_code') }} : {{ data_get($row,'jff_name') }}</strong>
		        			<div class="pull-right btn-group">
		        				<a href="{{ handles('joesama/flower::admin/flower/new/'. data_get($row,'id')) }}" class="btn btn-info btn-xs btn-label" >
		        					<i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;
					              {!! strtoupper(trans('joesama/flower::content.action.edit')) !!}
					            </a>
					            <a href="{{ handles('joesama/flower::admin/flower/steps/'. data_get($row,'jff_code')) }}" class="btn btn-primary btn-xs btn-label" >
		        					<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;
					              {!! strtoupper(trans('joesama/flower::content.action.step')) !!}
					            </a>
		        			</div>
							<small><span class="meta">{{ data_get($row,'jff_desc') }}</span></small>
						</td>
					</tr>
					@empty
					<tr>
						<td class="text-center">{!! strtoupper(trans('joesama/flower::content.empty')) !!}</td>
					</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>	

@stop

@push('flower.footer')

@endpush