<?php $__env->startSection('form'); ?>
    <form method="POST" action="<?php echo e('api/masuk'); ?>" class="login100-form validate-form">
        <?php echo csrf_field(); ?>
        <span class="login100-form-title p-b-34">
            MASUK
        </span>


        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger w-100 mb-1"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <div class="wrap-input100 validate-input m-b-20" data-validate="Type user name">
            <input id="email" class="input100 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="email" name="email" placeholder="Email">
            <span class="focus-input100"></span>
        </div>

        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger w-100 mb-1"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <div class="wrap-input100 validate-input m-b-20" data-validate="Type password">
            <input id="password" class="input100 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="password" name="password" placeholder="Password">
            <span class="focus-input100"></span>
        </div>

        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
                <span class="spinner-border spinner-border-sm d-none mr-1" role="status" aria-hidden="true"></span>
                Sign in
            </button>
        </div>

        <div class="w-full text-center p-t-27 p-b-100">
            <?php if(Route::has('password.request')): ?>
                <span class="txt1">
                    Lupa
                </span>

                <a href="<?php echo e(route('password.request')); ?>" class="txt2">
                    Username / password?
                </a>
            <?php endif; ?>
        </div>

        <div class="w-full text-center">
            <a href="<?php echo e(route('register')); ?>" class="txt3">
                DAFTAR
            </a>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.authlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ig\resources\views/auth/login.blade.php ENDPATH**/ ?>