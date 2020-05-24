

<?php $__env->startSection('content'); ?>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Ledger Page
        </div>
        <?php $__currentLoopData = $ledgers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ledger): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div>
            <?php echo e($ledger->created_at); ?> = <?php echo e($ledger->fname); ?> <?php echo e($ledger->lname); ?> - <?php echo e($ledger->age); ?> - <?php echo e($ledger->id_number); ?> 
            - <?php echo e($ledger->id_type); ?> - <?php echo e($ledger->mode_of_transpo); ?> - <?php echo e($ledger->vplatenum); ?>

            - <?php echo e($ledger->purpose); ?> - <?php echo e($ledger->destination); ?> - <?php echo e($ledger->border_name); ?>

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\project\resources\views/ledger.blade.php ENDPATH**/ ?>