<?php $__env->startSection('title', config('app.name') . '| Messagerie'); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('conversations.iframeindex', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u217000542/domains/atlasinvest-limited.com/public_html/azilink/resources/views/conversations/indexx.blade.php ENDPATH**/ ?>