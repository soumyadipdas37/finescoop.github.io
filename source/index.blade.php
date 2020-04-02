@extends('_layouts.master')

@section('body')

	<!-- Breadcrumbs !-->
	@component('_layouts.partials.breadcrumb')
		@slot('breadcrumb')
			Featured Articles
		@endslot
	@endcomponent
	<!-- // Breadcrumbs !-->

	<div class="flex-wrap order-2 md:pb-8">
		@foreach ($posts->where('featured', true) as $row)
			@component('_layouts.components.post-preview-inline', ['post' => $row])
			@endcomponent
		@endforeach
	</div>
@stop
