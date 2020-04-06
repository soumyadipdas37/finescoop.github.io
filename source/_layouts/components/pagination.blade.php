@if ($pages->count() > 1)
	<nav class="flex text-base my-8 px-2 md:px-0 pagination">
		@if ($previous = $previousPage)
			<a
				href="{{ $page->baseUrl() }}/{{ $previous }}"
				title="Previous Page"
				class="bg-gray-200 hover:bg-gray-400 rounded mr-3 px-5 py-3"
			>&LeftArrow;</a>
		@endif

		@foreach ($pages as $pageNumber => $path)
			<a
				href="{{ $page->baseUrl() }}/{{ $path }}"
				title="Go to Page {{ $pageNumber }}"
				class="bg-gray-200 hover:bg-gray-400 text-blue-700 rounded mr-3 px-5 py-3 {{ $currentPage == $pageNumber ? 'text-blue-600' : '' }}"
			>{{ $pageNumber }}</a>
		@endforeach

		@if ($next = $nextPage)
			<a
				href="{{ $page->baseUrl() }}/{{ $next }}"
				title="Next Page"
				class="bg-gray-200 hover:bg-gray-400 rounded mr-3 px-5 py-3"
			>&RightArrow;</a>
		@endif
	</nav>
@endif