<?php $__env->startSection('content'); ?>
    <div class="container">

        <div class="row">
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-4 col-md-4 mb-4">

                    <div class="card">

                        <!-- Post Image -->
                        <a href="/p/<?php echo e($post->id); ?>" style='height: 320px; width: auto'>
                            <img src="<?php echo e(asset("storage/$post->image")); ?>" class="card-img-top h-100 w-100" alt="..." >
                        </a>

                        <!-- User Info -->
                        <div class="card-body py-2 px-2">
                            <div class="d-flex align-items-start">
                                <a href="/profile/<?php echo e($post->user->username); ?>" style="width: 32px; height: 32px;">
                                    <img src="<?php echo e(asset($post->user->profile->getProfileImage())); ?>" class="rounded-circle w-100">
                                </a>
                                <div class='flex-grow-1 d-flex flex-column pl-2'>
                                    <a href="/profile/<?php echo e($post->user->username); ?>" class='h6 m-0 text-dark text-decoration-none' >
                                        <strong><?php echo e($post->user->username); ?></strong>
                                    </a>
                                    <small class="text-muted"><?php echo e($post->user->name); ?></small>
                                </div>
                                <div class="align-self-center">
                                    <strong><?php echo e($post->likes); ?> likes</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ig\resources\views/posts/explore.blade.php ENDPATH**/ ?>