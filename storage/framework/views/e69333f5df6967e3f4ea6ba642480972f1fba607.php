<?php $__env->startSection('content'); ?>
<div class="container">

    
    <div class="post">

        <div class="row mt-3">

            <div class="card w-100">
                <div class="row no-gutters" style="height: 598px;">

                    <!-- Card Image -->
                    <div class="col-md-8 h-100">
                        <img src="<?php echo e(asset("storage/$post->image")); ?>" class="w-100 h-100">
                    </div>

                    <div class="col-md-4 h-100">
                        <div class="d-flex flex-column h-100">

                            <!-- Card Header -->
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <a href="/profile/<?php echo e($post->user->username); ?>" style="width: 32px; height: 32px;">
                                        <img src="<?php echo e(asset($post->user->profile->getProfileImage())); ?>" class="rounded-circle w-100">
                                    </a>
                                    <a href="/profile/<?php echo e($post->user->username); ?>" class="my-0 ml-3 text-dark text-decoration-none">
                                        <strong> <?php echo e($post->user->name); ?></strong>
                                    </a>
                                    <p class="my-0 ml-1 text-dark"> <strong> - Following </strong></p>
                                </div>
                            </div>

                            <!-- Card Body -->
                            <div class="card-body px-2" style="overflow-y: auto; overflow-x: hidden;">

                                <!-- Post Caption  -->
                                <div class="row">
                                    <div class="col-2">
                                        <a href="/profile/<?php echo e($post->user->username); ?>">
                                            <img src="<?php echo e(asset($post->user->profile->getProfileImage())); ?>" class="rounded-circle w-100">
                                        </a>
                                    </div>
                                    <div class="col-10 pl-0">
                                        <p class="m-0 text-dark">
                                            <a href="/profile/<?php echo e($post->user->username); ?>" class="my-0 text-dark text-decoration-none">
                                                <strong> <?php echo e($post->user->name); ?></strong>
                                            </a>
                                            <?php echo e($post->caption); ?>

                                        </p>
                                    </div>
                                </div>

                                
                                <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row my-3">
                                        <div class="col-2">
                                            <a href="/profile/<?php echo e($comment->user->username); ?>">
                                                <img src="<?php echo e(asset($comment->user->profile->getProfileImage())); ?>" class="rounded-circle w-100">
                                            </a>
                                        </div>
                                        <div class="col-10 pl-0">
                                            <p class="m-0 text-dark">
                                                <a href="/profile/<?php echo e($comment->user->username); ?>" class="my-0 text-dark text-decoration-none">
                                                    <strong> <?php echo e($comment->user->name); ?></strong>
                                                </a>
                                                <?php echo e($comment->body); ?>

                                            </p>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                            <!-- Card Footer -->
                            <div class="card-footer align-self-end w-100 p-0 border-top-0">
                                <!-- Post State -->
                                <div class="py-2 px-3 border">
                                    <div class="d-flex flex-row">
                                        
                                        <button type="submit" class="btn pl-0">
                                            <i class="far fa-heart fa-2x"></i>
                                        </button>

                                        
                                        <button name="msg" value="0" type="button" class="btn pl-0">
                                            <i class="far fa-comment fa-2x"></i>
                                        </button>

                                        

                                        <!-- Share Button trigger modal -->
                                        <button type="button" class="btn pl-0 pt-0" data-toggle="modal" data-target="#sharebtn<?php echo e($post->id); ?>">
                                            <svg aria-label="Share Post" class="_8-yf5 " fill="#262626" height="22" viewBox="0 0 48 48" width="21"><path d="M47.8 3.8c-.3-.5-.8-.8-1.3-.8h-45C.9 3.1.3 3.5.1 4S0 5.2.4 5.7l15.9 15.6 5.5 22.6c.1.6.6 1 1.2 1.1h.2c.5 0 1-.3 1.3-.7l23.2-39c.4-.4.4-1 .1-1.5zM5.2 6.1h35.5L18 18.7 5.2 6.1zm18.7 33.6l-4.4-18.4L42.4 8.6 23.9 39.7z"></path></svg>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="sharebtn<?php echo e($post->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                            <div class="modal-content">
                                                <ul class="list-group">
                                                    <li class="list-group-item" style="position: absolute; left: -1000px; top: -1000px">
                                                        <input type="text" value="http://localhost:8000/p/<?php echo e($post->id); ?>" id="copy_<?php echo e($post->id); ?>" />
                                                    </li>
                                                    <li class="btn list-group-item" data-dismiss="modal" onclick="copyToClipboard('copy_<?php echo e($post->id); ?>')">Copy Link</li>
                                                    <li class="btn list-group-item" data-dismiss="modal">Cancel</li>
                                                </ul>
                                            </div>
                                            </div>
                                        </div>

                                    </div>

                                    
                                    <?php if($post->likes > 0): ?>
                                        <p class="m-0"><strong><?php echo e($post->likes); ?> likes</strong></p>
                                    <?php endif; ?>

                                    
                                    <p class="m-0"><small class="text-muted"><?php echo e(strtoupper($post->created_at->diffForHumans())); ?></small></p>
                                </div>

                                <!-- Add Comment -->
                                <form action="<?php echo e(action('CommentController@store')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group mb-0 text-muted">
                                        <div class="input-group is-invalid">
                                            <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>">
                                            <input type="hidden" name="redirect" value="show">
                                            <textarea class="form-control py-2 px-3" id="body" name='body' rows="1" placeholder="Add a comment..."></textarea>
                                            <div class="input-group-append">
                                                <button class="btn btn-md btn-outline-info" type="submit">Post</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    
    <?php if($posts->count() > 0): ?>

        <hr class="my-5">

        <div class="more">
                <h6 class="text-muted">More posts from
                    <a href="/profile/<?php echo e($post->user->username); ?>" class="text-dark text-decoration-none">
                        <strong> <?php echo e($post->user->name); ?></strong>
                    </a>
                </h6>

                <div class="row">
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-4 col-md-4 mb-2  align-self-stretch">
                            <a href="/p/<?php echo e($post->id); ?>">
                                <img class="img rounded" height="300" src="<?php echo e(asset("storage/$post->image")); ?>">
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
        </div>
    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('exscript'); ?>
    <script>
        function copyToClipboard(id) {
            var copyText = document.getElementById(id);
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ig\resources\views/posts/show.blade.php ENDPATH**/ ?>