<?php $user = Auth::user(); ?>






<?php $__env->startSection("title", "$user->name's Profile"); ?>
<?php $__env->startSection("content"); ?>










<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Xampp\htdocs\mydemoapp\resources\views/post.blade.php ENDPATH**/ ?>