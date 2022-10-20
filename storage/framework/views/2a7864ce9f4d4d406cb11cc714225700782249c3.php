


<?php $__env->startPush('css'); ?>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<link href="https://unpkg.com/treeflex/dist/css/treeflex.css" rel="stylesheet">

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<div class="tf-tree example tree">
    <ul>
        <li>
            <a href="<?php echo e(route('search.history',$admin->id)); ?>">
            <span class="tf-nc touch" data-id="<?php echo e($admin->id); ?>"><?php echo e($admin->name); ?>

            </span>
            </a>
            <ul>
                <?php $data1 = \App\Models\User::where('linemanager_id',$admin->id)->where('name','!=','admin')->get(); ?>
                <?php if(!empty($data1)): ?>
                <?php $__currentLoopData = $data1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="<?php echo e(route('search.history',$data1->id)); ?>">
                    <span class="tf-nc touch " data-id="<?php echo e($data1->id); ?>"><?php echo e($data1->name); ?></span>
                </a>

                    <?php $data2 = \App\Models\User::where('linemanager_id',$data1->id)->get(); ?>
                    <?php if(!empty($data2)): ?>
                    <?php $__currentLoopData = $data2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <ul>

                        <li>
                            <a href="<?php echo e(route('search.history',$data2->id)); ?>">
                            <span class="tf-nc touch" data-id="<?php echo e($data2->id); ?>"><?php echo e($data2->name); ?>

                            </span>
                        </a>

                            <?php $data3 = \App\Models\User::where('linemanager_id',$data2->id)->get(); ?>
                            <?php if(!empty($data3)): ?>
                            <ul>
                                <?php $__currentLoopData = $data3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                <li>
                                    <a href="<?php echo e(route('search.history',$data3->id)); ?>">
                                    <span class="tf-nc touch" data-id="<?php echo e($data3->id); ?>"><?php echo e($data3->name); ?>

                                    </span>
                                </a>

                                    <?php $data4 = \App\Models\User::where('linemanager_id',$data3->id)->get(); ?>
                                    <?php if(!empty($data4)): ?>
                                    <ul>
                                        <?php $__currentLoopData = $data4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data4): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <li>
                                            <a href="<?php echo e(route('search.history',$data4->id)); ?>">
                                                <span class="tf-nc touch" data-id="<?php echo e($data4->id); ?>"><?php echo e($data4->name); ?>

                                            </span>
                                        </a>





                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <?php endif; ?>

                                </li>


                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <?php endif; ?>


                        </li>




                    </ul>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            </ul>
        </li>
    </ul>
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\axconnect\resources\views/hierarchystructure/structureview.blade.php ENDPATH**/ ?>