<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row justify-content-center">
            
            <main class="main col-md-8 px-2 py-3">

                <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <?php
                        $state=false;
                    ?>

                    <div class="card mx-auto custom-card mb-5" id="prova">
                        <!-- Card Header -->
                        <div class="card-header d-flex justify-content-between align-items-center bg-white pl-3 pr-1 py-2">
                            <div class="d-flex align-items-center">
                                <a href="/profile/<?php echo e($post->user->username); ?>" style="width: 32px; height: 32px;">
                                    <img src="<?php echo e(asset($post->user->profile->getProfileImage())); ?>" class="rounded-circle w-100">
                                </a>
                                <a href="/profile/<?php echo e($post->user->username); ?>" class="my-0 ml-3 text-dark text-decoration-none">
                                    <?php echo e($post->user->name); ?>

                                </a>
                            </div>
                            <div class="card-dots">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-link text-muted" data-toggle="modal" data-target="#post<?php echo e($post->id); ?>">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>

                                <!-- Dots Modal -->
                                <div class="modal fade" id="post<?php echo e($post->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <ul class="list-group">
                                            <a href="#"><li class="btn list-group-item">Tidak Ikuti</li></a>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $post)): ?>
                                                <form action="<?php echo e(url()->action('PostsController@destroy', $post->id)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field("DELETE"); ?>
                                                    <li class="btn btn-danger list-group-item">
                                                        <button class="btn" type="submit">Hapus</button>
                                                        </li>
                                                </form>
                                            <?php endif; ?>
                                            <a href="/p/<?php echo e($post->id); ?>"><li class="btn list-group-item">Kembali Ke Postingan</li></a>
                                            <a href="#"><li class="btn list-group-item" data-dismiss="modal">Batal</li></a>
                                        </ul>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card Image -->
                        <div class="js-post" ondblclick="showLike(this, 'like_<?php echo e($post->id); ?>')">
                            <i class="fa fa-heart"></i>
                            <img class="card-img" src="<?php echo e(asset("storage/$post->image")); ?>" alt="post image" style="max-height: 767px">
                        </div>

                        <!-- Card Body -->
                        <div class="card-body px-3 py-2">

                            <div class="d-flex flex-row">
                                <form method="POST" action="<?php echo e(url()->action('LikeController@update2', ['like'=>$post->id])); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php if(true): ?>
                                        <input id="inputid" name="update" type="hidden" value="1">
                                    <?php else: ?>
                                        <input id="inputid" name="update" type="hidden" value="0">
                                    <?php endif; ?>

                                    <?php if($post->like->isEmpty()): ?>
                                        <button type="submit" class="btn pl-0">
                                            <i class="far fa-heart fa-2x"></i>
                                        </button>
                                    <?php else: ?>

                                        <?php $__currentLoopData = $post->like; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $likes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <?php if($likes->user_id==Auth::User()->id && $likes->State==true): ?>
                                                <?php
                                                    $state=true;
                                                ?>
                                            <?php endif; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($state): ?>
                                            <button type="submit" class="btn pl-0">
                                                <i class="fas fa-heart fa-2x" style="color:red"></i>
                                            </button>
                                        <?php else: ?>
                                            <button type="submit" class="btn pl-0">
                                                <i class="far fa-heart fa-2x"></i>
                                            </button>
                                        <?php endif; ?>

                                    <?php endif; ?>

                                    <a href="/p/<?php echo e($post->id); ?>" class="btn pl-0">
                                        <i class="far fa-comment fa-2x"></i>
                                    </a>

                                    <!-- Share Button trigger modal -->
                                    <button type="button" class="btn pl-0 pt-0" data-toggle="modal" data-target="#sharebtn<?php echo e($post->id); ?>">
                                        <svg aria-label="Share Post" class="_8-yf5 " fill="#262626" height="22" viewBox="0 0 48 48" width="21"><path d="M47.8 3.8c-.3-.5-.8-.8-1.3-.8h-45C.9 3.1.3 3.5.1 4S0 5.2.4 5.7l15.9 15.6 5.5 22.6c.1.6.6 1 1.2 1.1h.2c.5 0 1-.3 1.3-.7l23.2-39c.4-.4.4-1 .1-1.5zM5.2 6.1h35.5L18 18.7 5.2 6.1zm18.7 33.6l-4.4-18.4L42.4 8.6 23.9 39.7z"></path></svg>
                                    </button>

                                    <!-- Share Modal -->
                                    <div class="modal fade" id="sharebtn<?php echo e($post->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <ul class="list-group">
                                                <li class="list-group-item" style="position: absolute; left: -1000px; top: -1000px">
                                                    <input type="text" value="http://localhost:8000/p/<?php echo e($post->id); ?>" id="copy_<?php echo e($post->id); ?>" />
                                                </li>
                                                <li class="btn list-group-item" data-dismiss="modal" onclick="copyToClipboard('copy_<?php echo e($post->id); ?>')">Salin Link</li>
                                                <li class="btn list-group-item" data-dismiss="modal">Batal</li>
                                            </ul>
                                        </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="flex-row">

                                <!-- Likes -->
                                <?php if(count($post->like->where('State',true)) > 0): ?>
                                    <h6 class="card-title">
                                        <strong><?php echo e(count($post->like->where('State',true))); ?> likes</strong>
                                    </h6>
                                <?php endif; ?>

                                
                                <p class="card-text mb-1">
                                    <a href="/profile/<?php echo e($post->user->username); ?>" class="my-0 text-dark text-decoration-none">
                                        <strong><?php echo e($post->user->name); ?></strong>
                                    </a>
                                    <?php echo e($post->caption); ?>

                                </p>

                                <!-- Comment -->
                                <div class="comments">
                                    <?php if(count($post->comments) > 0): ?>
                                        <a href="/p/<?php echo e($post->id); ?>" class="text-muted">View all <?php echo e(count($post->comments)); ?> comments</a>
                                    <?php endif; ?>
                                    <?php $__currentLoopData = $post->comments->sortByDesc("created_at")->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="mb-1"><strong><?php echo e($comment->user->name); ?></strong>  <?php echo e($comment->body); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                                <!-- Created At  -->
                                <p class="card-text text-muted"><?php echo e($post->created_at->diffForHumans()); ?></p>
                            </div>
                        </div>

                        <!-- Card Footer -->
                        <div class="card-footer p-0">
                            <!-- Add Comment -->
                            <form action="<?php echo e(action('CommentController@store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="form-group mb-0  text-muted">
                                    <div class="input-group is-invalid">
                                        <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>">
                                        <textarea class="form-control" id="body" name='body' rows="1" cols="1" placeholder="Add a comment..."></textarea>
                                        <div class="input-group-append">
                                            <button class="btn btn-md btn-outline-info" type="submit">Post</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <div class="d-flex justify-content-center p-3 py-5 border bg-white">
                        <div class="card border-0 text-center">
                            <img src="<?php echo e(asset('img/nopost.png')); ?>" class="card-img-top" alt="..." style="max-width: 330px">
                            <div class="card-body ">
                                <h3>Tidak Ada Posting di Temukan</h3>
                                <p class="card-text text-muted">Maaf kami tidak dapat menemukan postingan, Tolong untuk mengikuti seseorang</p>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>

                 <!-- Testin Infinite scrooling with vue -->

            </main>

            
            <aside class="aside col-md-4 py-3">
                <div class="position-fixed">

                    <!-- User Info -->
                    <div class="d-flex align-items-center mb-3">
                        <a href="/profile/<?php echo e(Auth::user()->username); ?>" style="width: 56px; height: 56px;">
                            <img src="<?php echo e(asset(Auth::user()->profile->getProfileImage())); ?>" class="rounded-circle w-100">
                        </a>
                        <div class='d-flex flex-column pl-3'>
                            <a href="/profile/<?php echo e(Auth::user()->username); ?>" class='h6 m-0 text-dark text-decoration-none' >
                                <strong><?php echo e(auth()->user()->username); ?></strong>
                            </a>
                            <small class="text-muted "><?php echo e(auth()->user()->name); ?></small>
                        </div>
                    </div>

                    <!-- Suggestions -->
                    <div class='mb-4' style="width: 300px">
                        <h6 class='text-secondary'>Saran Untuk Anda</h5>

                        <!-- Suggestion Profiles-->
                        <?php $__currentLoopData = $sugg_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sugg_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($loop->iteration == 6): ?>
                                <?php break; ?>
                            <?php endif; ?>
                            <div class='suggestions py-2'>
                                <div class="d-flex align-items-center ">
                                    <a href="/profile/<?php echo e($sugg_user->username); ?>" style="width: 32px; height: 32px;">
                                        <img src="<?php echo e(asset($sugg_user->profile->getProfileImage())); ?>" class="rounded-circle w-100">
                                    </a>
                                    <div class='d-flex flex-column pl-3'>
                                        <a href="/profile/<?php echo e($sugg_user->username); ?>" class='h6 m-0 text-dark text-decoration-none' >
                                            <strong><?php echo e($sugg_user->name); ?></strong>
                                        </a>
                                        <small class="text-muted">Yang baru di ArcventLand </small>
                                    </div>
                                    <a href="#" class='ml-auto text-info text-decoration-none'>
                                        Follow
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                    <!-- CopyRight -->


                </div>
            </aside>

        </div>
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

        function showLike(e, id) {
            console.log("Like: ", id);
            var heart = e.firstChild;
            heart.classList.add('fade');
            setTimeout(() => {
                heart.classList.remove('fade');
            }, 2000);
        }

    </script>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ig\resources\views/posts/index.blade.php ENDPATH**/ ?>