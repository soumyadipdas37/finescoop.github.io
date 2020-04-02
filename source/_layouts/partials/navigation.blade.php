<div class="z-50 fixed w-full h-16 bg-darker shadow-lg text-center p-4 px-6 flex items-center">
	<div class="hidden lg:block lg:w-1/4 xl:w-1/5 pr-8">
		<a href="/" class="flex justify-start pl-6 font-bold text-lightest">
			{{ $page->siteName }}
		</a>
	</div>
	<div class="lg:hidden pr-3" id="mobile-nav-trigger">
		<div
			class="toggle block"
			onclick="navMenu.toggle()"
		>
			<i class="mdi mdi-menu text-2xl" id="nav-menu-show"></i>
			<i class="mdi mdi-close text-2xl hidden" id="nav-menu-hide"></i>
		</div>
	</div>
	<div class="flex flex-grow items-center lg:w-3/4 xl:w-4/5">
		<span class="relative w-full">
			<input
				type="search"
				placeholder="Search"
				class="w-full text-sm text-lighter transition border border-transparent focus:outline-none focus:border-indigo rounded bg-dark py-1 px-2 pl-10 appearance-none leading-normal">
			<div class="absolute search-icon" style="top: .5rem; left: .8rem;">
				<svg class="fill-current pointer-events-none text-lightest w-4 h-4"
					 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
					<path
						d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
				</svg>
			</div>
		</span>
		<a
			href="/"
			class="text-sm text-right text-lightest py-2 px-3 hover:text-grey-dark no-underline hidden lg:block lg:w-1/3 px-6"
		>
			Back Home
		</a>
	</div>
</div>

@push('scripts')
	<script>
		const navMenu = {
			toggle() {
				const menu = document.getElementById('nav-menu');
				menu.classList.toggle('hidden');
				document.getElementById('nav-menu-hide').classList.toggle('hidden');
				document.getElementById('nav-menu-show').classList.toggle('hidden');
			},
		}
	</script>
@endpush
