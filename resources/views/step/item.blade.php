<ul class="child">
	@foreach($child as $code => $step)
	<li>
		<input type="checkbox" id="{{ $code }}" checked="checked" />
		<label for="{{ $code }}">
			<strong>{{ str_limit(strtoupper( data_get($step,'item.jfs_name')),25) }}</strong>
			&nbsp;&nbsp;
			<a href="{{ handles('joesama/flower::admin/flower/steps/' .request()->segment(4). '/' . data_get($step,'item.id'). '/' . data_get($step,'item.fk_jfs_step') ) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a>
			<a href="{{ handles('joesama/flower::admin/flower/steps/' .request()->segment(4).'/form/' . data_get($step,'item.id') ) }}" class="btn btn-warning  btn-xs"><i class="fa fa-sitemap" aria-hidden="true"></i> </a>
		</label>
		@if(data_get($step,'child'))
			@include('joesama/flower::step.item',['child' => data_get($step,'child')])
		@endif
	</li>
	@endforeach
</ul>