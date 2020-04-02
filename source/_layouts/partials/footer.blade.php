<div class="bg-secondary border-t border-primary">
	<div class="container mx-auto px-16 pt-10 pb-6">
		<div class="flex flex-wrap">
			<!-- For Businesses !-->
			<div class="w-full md:w-1/4 text-center md:text-left">
				<h5 class="uppercase mb-2 font-bold">Categories</h5>
				<ul class="mb-4">
					@foreach([
						'coronavirus',
						'latest',
						'science',
						'sports',
						'tv',
						'world'
					] as $category)
						<li class="mt-2">
							<a
								href="/categories/{{ $category }}"
							   	class="hover:underline text-secondary hover:text-orange-500 text-sm"
							>
								{{ ucwords($category) }}
							</a>
						</li>
					@endforeach
				</ul>
			</div>
			<!-- // For Businesses !-->

			<!-- For individuals !-->
			<div class="w-full md:w-1/4 text-center md:text-left">
				<h5 class="uppercase mb-2 font-bold">For Individuals</h5>
				<ul class="mb-4">
					@foreach([
						['title' => 'Introduction', 'uri' => 'introduction'],
						['title' => 'Clients', 'uri' => 'introduction'],
						['title' => 'Inventory', 'uri' => 'introduction'],
						['title' => 'Invoices', 'uri' => 'introduction'],
					] as $link)
						<li class="mt-2">
							<a href="{{ $link['uri'] }}" class="hover:underline text-secondary hover:text-orange-500 text-sm">
								{{ $link['title'] }}
							</a>
						</li>
					@endforeach
				</ul>
			</div>
			<!-- // For individuals !-->

			<!-- Useful !-->
			<div class="w-full md:w-1/4 text-center md:text-left">
				<h5 class="uppercase mb-2 font-bold">Useful</h5>
				<ul class="mb-4">
					@foreach([
    					['title' => 'Terms', 'uri' => 'terms'],
    					['title' => 'Privacy', 'uri' => 'privacy']
   			 		] as $link)
						<li class="mt-2">
							<a
								href="/pages/useful/{{ $link['uri'] }}"
								class="hover:underline text-secondary hover:text-orange-500 text-sm"
							>
								{{ $link['title'] }}
							</a>
						</li>
					@endforeach
				</ul>
			</div>
			<!-- // Useful !-->

			<!-- Newsie !-->
			<div class="w-full md:w-1/4 text-center md:text-left">
				<h5 class="uppercase mb-2 font-bold">{{ $page->siteName }}</h5>
				<div class="flex flex-col">
					<span class="text-sm">Contact: help@{{ $page->siteName }}.com</span>
					<span class="text-sm">Enquiries: enquiries@{{ $page->siteName }}.com</span>
				</div>
				<div class="mt-4">
					<i class="text-3xl mdi mdi-facebook-box"></i>
					<i class="text-3xl mdi mdi-twitter-box"></i>
				</div>
			</div>
			<!-- // Newsie !-->
		</div>
	</div>
</div>
