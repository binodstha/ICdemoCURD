<html>
<head>	
	<title>
		<?php echo $__env->yieldContent('title'); ?>
	</title>

	<link href="<?php echo asset('css/bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo asset('css/bootstrap-theme.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo asset('css/main.css'); ?>" rel="stylesheet">
	<script src="<?php echo asset('js/jquery.js'); ?>"></script>
	<script src="<?php echo asset('js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo asset('js/script.js'); ?>"></script>
</head>
<body>
	<div class="container">
		<?php echo $__env->make('shared/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		
		<?php echo $__env->yieldContent('content'); ?>
		
		<?php echo $__env->make('shared/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</body>
</html>