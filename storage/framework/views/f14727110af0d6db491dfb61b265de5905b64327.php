<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    
    <title><?php echo e(config('app.name', 'ArcventLand')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/util.css')); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/main.css')); ?>">
</head>
<body>
    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				

					<?php echo $__env->yieldContent('form'); ?>

				<div class="login100-more" style="background-image: url('<?php echo e(asset('img/bg-01.jpg')); ?>');"></div>
			</div>
		</div>
	</div>

	<script>

		document.querySelector('.login100-form').addEventListener('submit', function(e){
			var error = document.querySelector('.is-invalid');
			if(error) hideLoading();
			showLoading();
		})

		function showLoading() {
			document.querySelector('.spinner-border').classList.remove('d-none')
		}

		function hideLoading() {
			document.querySelector('.spinner-border').classList.add('d-none')
		}

	</script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\ig\resources\views/layouts/authlayout.blade.php ENDPATH**/ ?>