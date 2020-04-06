<?php if($pages->count() > 1): ?>
	<nav class="flex text-base my-8 px-2 md:px-0 pagination">
		<?php if($previous = $previousPage): ?>
			<a
				href="<?php echo e($page->baseUrl()); ?>/<?php echo e($previous); ?>"
				title="Previous Page"
				class="bg-gray-200 hover:bg-gray-400 rounded mr-3 px-5 py-3"
			>&LeftArrow;</a>
		<?php endif; ?>

		<?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pageNumber => $path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<a
				href="<?php echo e($page->baseUrl()); ?>/<?php echo e($path); ?>"
				title="Go to Page <?php echo e($pageNumber); ?>"
				class="bg-gray-200 hover:bg-gray-400 text-blue-700 rounded mr-3 px-5 py-3 <?php echo e($currentPage == $pageNumber ? 'text-blue-600' : ''); ?>"
			><?php echo e($pageNumber); ?></a>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		<?php if($next = $nextPage): ?>
			<a
				href="<?php echo e($page->baseUrl()); ?>/<?php echo e($next); ?>"
				title="Next Page"
				class="bg-gray-200 hover:bg-gray-400 rounded mr-3 px-5 py-3"
			>&RightArrow;</a>
		<?php endif; ?>
	</nav>
<?php endif; ?><?php /**PATH /Users/nate/Documents/websites/finescoop/source/_layouts/components/pagination.blade.php ENDPATH**/ ?>