<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    
    <title><?php echo e(config('app.name', 'ArcventLand')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet">


</head>
<body>
    <div id="app">

        <!-- Header section -->
        <nav class="navbar fixed-top navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                <!-- Logo -->
                <a href="<?php echo e(url('/')); ?>" class="navbar-brand">
                    <img src="<?php echo e(asset('img/cleanlogo.png')); ?>" alt="ArcventLand Logo" >
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar5">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Links -->
                <div class="navbar-collapse collapse justify-content-stretch" id="navbar5">

                    <form action="/search" method="POST" role="search" class="m-auto d-inline w-80">
                        <?php echo csrf_field(); ?>
                        <div class="input-group">
                            <input class="form-control" name="q" type="search" placeholder="Cari" aria-label="Search">
                            <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" style="border-color: #ced4da"><i class="fas fa-search"></i></button>
                        </div>
                    </form>

                    <ul class="navbar-nav">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                            </li>
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item px-2 <?php echo e(Route::is('post.index') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(url('/')); ?>">
                                    <i class="fas fa-home fa-2x"></i>
                                </a>
                            </li>
                            <li class="nav-item px-2 <?php echo e(Route::is('post.explore') ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(url('/explore')); ?>">
                                    <i class="far fa-compass fa-2x"></i>
                                </a>
                            </li>
                            
                            <li class="nav-item pl-2">
                                <a href="/profile/<?php echo e(Auth::user()->username); ?>" class="nav-link" style="width: 42px; height: 22px; padding-top: 6px;" >
                                    <img src="<?php echo e(asset(Auth::user()->profile->getProfileImage())); ?>" class="rounded-circle w-100">
                                    
                                </a>
                            </li>

                            <!-- Add more dropdown in Profile Page -->
                            <!-- To get current routedd(Route::currentRouteName())  -->
                            

                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre></a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', Auth::user()->profile)): ?>
                                            <a class="dropdown-item" href="/p/create" role="button">
                                                Postingan Baru
                                            </a>
                                        <?php endif; ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', Auth::user()->profile)): ?>
                                            <a class="dropdown-item" href="/stories/create" role="button">
                                                Cerita Baru
                                            </a>
                                        <?php endif; ?>

                                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            <?php echo e(__('Keluar')); ?>

                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </div>
                                </li>
                            

                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Content section -->
        <div class="pt-3 mt-5">
            <?php echo $__env->yieldContent('content'); ?>
        </div>

    </div>

    <?php echo $__env->yieldContent('exscript'); ?>

</body>
</html>

<?php /**PATH C:\xampp\htdocs\ig\resources\views/layouts/app.blade.php ENDPATH**/ ?>