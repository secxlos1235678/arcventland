<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row ">
        <div class="col-3 p-5">

            <?php if($user->stories->count() > 0): ?>
                <a href="/stories/<?php echo e($user->username); ?>" >
                    <img src="<?php echo e(asset($user->profile->getProfileImage())); ?>" class="border-linear  w-100">
                </a>
            <?php else: ?>
                <img src="<?php echo e(asset($user->profile->getProfileImage())); ?>" class="rounded-circle w-100">
            <?php endif; ?>
        </div>

        <div class="col-9 pt-5">
            <div class="d-flex align-items-center">
                <h1><?php echo e($user->username); ?></h1>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user->profile)): ?>
                    <a class="btn btn-outline-secondary ml-3" href="/profile/<?php echo e($user->username); ?>/edit" role="button">
                        Rubah Profil
                    </a>
                <?php else: ?>
                    <follow-button user-id="<?php echo e($user->username); ?>" follows="<?php echo e($follows); ?>"></follow-button>
                <?php endif; ?>

            </div>
            <div class="d-flex">
                <div class="pr-5"><strong> <?php echo e($postCount); ?> </strong> posting</div>
                <div class="pr-5"><strong> <?php echo e($followersCount); ?> </strong> Pengikut</div>
                <div class="pr-5"><strong> <?php echo e($followingCount); ?> </strong> Mengikuti</div>
            </div>
            <div class="pt-4 font-weight-bold "><?php echo e($user->name); ?></div>
            <div>
                <?php echo nl2br(e($user->profile->bio)); ?>

            </div>
            <div class="font-weight-bold">
                <a href="<?php echo e($user->profile->website); ?>" target="_blanc">
                    <?php echo e($user->profile->website); ?>

                </a>
            </div>

        </div>
    </div>

    <div class="row pt-4 border-top">

        <?php $__empty_1 = true; $__currentLoopData = $user->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-4 col-md-4 mb-4 align-self-stretch">
                <a href="/p/<?php echo e($post->id); ?>">
                    <img class="img border" height="300" src="<?php echo e(asset("storage/$post->image")); ?>">
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12 d-flex justify-content-center text-muted">
                <div class="card border-0 text-center bg-transparent" >
                    <img src="<?php echo e(asset('img/noimage.png')); ?>" class="card-img-top" alt="...">
                    <div class="card-body ">
                        <h1>Tidak Ada Postingan</h1>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ig\resources\views/profiles/index.blade.php ENDPATH**/ ?>