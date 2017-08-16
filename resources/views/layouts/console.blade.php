@extends('orchestra/foundation::layouts.app')

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="panel panel-default">
      <div class="panel-body">
        @yield('flower')
      </div>
    </div>
  </div>
</div>
@stop



@push('orchestra.footer')


@php
$orchestra = app('orchestra.app');
$lots = collect(data_get(collect($orchestra->widget('menu'))->get('flower'),'childs'));

$menu = $lots->search(function ($item, $key) {
    return data_get($item,'link') == url()->current();
});

@endphp
  <script>
    var app = Platform.make('app').nav('{{ $menu }}').$mount('body');
  </script>
  @stack('flower.footer')
@endpush