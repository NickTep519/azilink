


<?php $__env->startSection('title', config('app.name') . '| Messagerie'); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('messenger.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projets\azilink\resources\views/messenger/iframe.blade.php ENDPATH**/ ?>