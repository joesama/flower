@extends('joesama/flower::layouts.console')

@section('flower')
<style type="text/css">
.css-treeview ul,
.css-treeview li
{	
	/*display: flex;*/
	list-style: none;
}

.css-treeview input
{
	position: absolute;
	opacity: 0;
}

.css-treeview
{
	font: normal 12px "Segoe UI", Arial, Sans-serif;
	-moz-user-select: none;
	-webkit-user-select: none;
	user-select: none;
}

/*.css-treeview ul.child:after{
  content:"";
  display:block;
  width:20px;
  height: 20px;
  position:absolute;
  border-left:5px solid;
  border-top:5px solid;
  top:9px;
  bottom:0;
  left:-20px;
}*/

.css-treeview li {
  /*margin-left: 20px;*/
  line-height:2em; /* default list item's `line-height` */
  font-weight:bold;
  position:relative;
}

.css-treeview ul.child li:before {
  content:"";
  display:block;
  width:20px;
  height: 25px;
  position:absolute;
  border-left:5px double;
  border-bottom:5px solid;
  top:-11px;
  bottom:0;
  left:0px;
}




.css-treeview a
{
/*	color: #00f;
	text-decoration: none;*/
}

.css-treeview a:hover
{
	/*text-decoration: underline;*/
}

.css-treeview input + label + ul
{
	margin: 0 0 0 22px;
}

.css-treeview input + label + ul
{
	display: none;
}

.css-treeview li label{
	/*display: flex;*/
	height: 25px;
}

.css-treeview label,
.css-treeview label::before
{
	cursor: pointer;
}

.css-treeview input:disabled + label
{
	cursor: default;
	opacity: .6;
}

.css-treeview input:checked:not(:disabled) + label + ul
{
	display: block;
}

.css-treeview label,
.css-treeview a,
.css-treeview label::before
{
	display: inline-block;
	vertical-align: middle;
}

.css-treeview label
{
	background-position: 18px 0;
}

.css-treeview label::before
{
	content: "";
	margin: 0 22px 0 0;
	vertical-align: middle;
	background-position: 0 -32px;
}

.css-treeview input:checked + label::before
{
	background-position: 0 -16px;
}

/* webkit adjacent element selector bugfix */
@media screen and (-webkit-min-device-pixel-ratio:0)
{
	.css-treeview 
	{
		-webkit-animation: webkit-adjacent-element-selector-bugfix infinite 1s;
	}
	
	@-webkit-keyframes webkit-adjacent-element-selector-bugfix 
	{
		from 
		{ 
			padding: 0;
		} 
		to 
		{ 
			padding: 0;
		}
	}
}
</style>
@if(!$exist)
<div class="row">
	<div class="col-md-12">
		<a href="{{ handles('joesama/flower::admin/flower/steps/' . request()->segment(4) . '/form') }}" class="btn btn-primary btn-sm btn-label pull-right" >
			<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;
          {!! strtoupper(trans('joesama/flower::content.flow.new')) !!}
        </a>
	</div>
</div>
@endif
<div class="row">
	<div class="col-md-12">
		<div class="css-treeview">
			<ul>
				@foreach($steps as $code => $step)
				<li>
					<input type="checkbox" id="{{ $code }}" checked="checked" />
					<label for="{{ $code }}">
						<strong>{{ str_limit(strtoupper( data_get($step,'item.jfs_name')),25) }}</strong>
						&nbsp;&nbsp;
						<a href="{{ handles('joesama/flower::admin/flower/steps/' .request()->segment(4). '/' . data_get($step,'item.id'). '/' . data_get($step,'item.fk_jfs_step') ) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a>
						<a href="{{ handles('joesama/flower::admin/flower/steps/' .request()->segment(4).'/form/' . data_get($step,'item.id') ) }}" class="btn btn-warning  btn-xs"><i class="fa fa-plus" aria-hidden="true"></i> </a>
						<a href="{{ handles('joesama/flower::admin/flower/steps/' .request()->segment(4).'/delete/' . data_get($step,'item.id') ) }}" class="btn btn-danger  btn-xs"><i class="fa fa-remove" aria-hidden="true"></i> </a>
					</label>
					@if(data_get($step,'child'))
						@include('joesama/flower::step.item',['child' => data_get($step,'child')])
					@endif
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>


@stop

@push('flower.footer')

@endpush