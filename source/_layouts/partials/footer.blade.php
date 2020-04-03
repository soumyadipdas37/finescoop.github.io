<div class="bg-secondary border-t border-primary">
	<div class="container mx-auto px-16 pt-10 pb-6">
		<div class="flex flex-wrap">
			<!-- For Businesses !-->
			<div class="w-full sm:w-1/2 lg:w-1/4 text-center md:text-left">
				<h5 class="uppercase mb-2 font-bold">Categories</h5>
				<ul class="mb-4">
{{--					@foreach([--}}
{{--						'coronavirus',--}}
{{--						'latest',--}}
{{--						'science',--}}
{{--						'sports',--}}
{{--						'tv',--}}
{{--						'world'--}}
{{--					] as $category)--}}
					@foreach([
						'ps4',
						'xboxone',
						'pc',
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

			<!-- Top Articles !-->
			<div class="w-full sm:w-1/2 lg:w-1/4 text-center md:text-left">
				<h5 class="uppercase mb-2 font-bold">Top Articles</h5>
				<ul class="mb-4">
					@foreach($posts->take(5) as $post)
						<li class="mt-2">
							<a href="{{ $post->getUrl() }}" class="hover:underline text-secondary hover:text-orange-500 text-sm">
								{{ \Illuminate\Support\Str::limit($post->title, 30) }}
							</a>
						</li>
					@endforeach
				</ul>
			</div>
			<!-- // Top Articles !-->

			<!-- Useful !-->
			<div class="w-full sm:w-1/2 lg:w-1/4 text-center md:text-left">
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
			<div class="w-full sm:w-1/2 lg:w-1/4 text-center md:text-left">
				<h5 class="uppercase mb-2 font-bold">{{ $page->siteName }}</h5>
				<div class="flex flex-col">
					<span class="text-sm">Contact: help&commat;{{ strtolower($page->siteName) }}.com</span>
					<span class="text-sm">Enquiries: enquiries&commat;{{ strtolower($page->siteName) }}.com</span>
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
