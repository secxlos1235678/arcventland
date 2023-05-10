<?php $__env->startSection('form'); ?>
    <?php if(session('status')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>
    <form method="POST" action="<?php echo e(route('password.email')); ?>" class="login100-form validate-form">
        <?php echo csrf_field(); ?>
        <span class="login100-form-title p-b-34">
            Reset Password
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
            <input id="email" type="email" class="input100 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  name="email" value="<?php echo e(old('email')); ?>" placeholder="Alamat E-Mail" required autocomplete="email" autofocus>
            <span class="focus-input100"></span>
        </div>

        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
                Send Password Reset Link
            </button>
        </div>


        <div class="w-full text-center p-t-27 p-b-100">
            <span class="txt1">
                Ingat Passwordmu?
            </span>

            <a href="<?php echo e(route('login')); ?>" class="txt2">
                Kembali Login
            </a>
        </div>

    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ig\resources\views/auth/passwords/email.blade.php ENDPATH**/ ?>