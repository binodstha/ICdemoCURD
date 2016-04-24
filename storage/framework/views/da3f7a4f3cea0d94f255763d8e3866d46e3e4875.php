<?php $__env->startSection('title'); ?>
<?php if($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
	<?php echo "Search | " . Input::get('entry'); ?>

<?php else: ?> 
	<?php echo "Home"; ?>

<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php 
$count = 1; 
$size = 5;
if ((count($infolist) % $size) > 0 )
	$pagecount = (count($infolist) - (count($infolist) % $size)) / $size + 1;
else 
	$pagecount = count($infolist) / $size;

?>

<?php if(count($infolist) == 0): ?>
	<?php if($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
		<div class="alert alert-info" role="alert">
			<strong>Info!</strong>
			The Search list is empty
		</div> 
	<?php else: ?>
		<div class="alert alert-info" role="alert">
			<strong>Info!</strong>
			The list is empty.
		</div> 
	<?php endif; ?>
<?php else: ?>
	<?php if($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
		<p class="text-ledt"> Showing Result for : <strong><?php echo Input::get('entry'); ?></strong></p>
	<?php else: ?>
		<p class="text-ledt"> Current Page : <strong> <?php echo $page; ?> </strong>  OF  <?php echo $pagecount; ?></p>
	<?php endif; ?>
	
	<div class="table-responsive">
		<table class = 'table table-hover'>
			<thead class="thead-inverse">
				<tr>
					<th>Name</th>
					<th>Gender</th>
					<th>Phone Num</th>
					<th>Email</th>
					<th>Adderss</th>
					<th>Date of Birth</th>
					<th>Education</th>
				</tr>
			</thead>
			<?php if($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
				<?php foreach($infolist as $info): ?>
					<?php if($count > ($size * ($page - 1)) AND $count <= ($size * $page)): ?>
					<tr>
						<td><?php echo Html::link('/info/'. $info[3], $info[0]); ?></td>
						<td><?php echo $info[1]; ?></td>
						<td><?php echo $info[2]; ?></td>
						<td><?php echo $info[3]; ?></td>
						<td><?php echo $info[4]; ?></td>
						<td><?php echo $info[6]; ?></td>
						<td><?php echo $info[7]; ?></td>	
					</tr>
					<?php endif; ?>
					<?php $count++; ?>
				<?php endforeach; ?>
			<?php else: ?>

			<?php foreach($infolist as $info): ?>
				<?php if($count > ($size * ($page - 1)) AND $count <= ($size * $page)): ?>
					<tr>
						<td><?php echo Html::link('/info/'. $info[3], $info[0]); ?></td>
						<td><?php echo $info[1]; ?></td>
						<td><?php echo $info[2]; ?></td>
						<td><?php echo $info[3]; ?></td>
						<td><?php echo $info[4]; ?></td>
						<td><?php echo $info[6]; ?></td>
						<td><?php echo $info[7]; ?></td>	
					</tr>
				<?php endif; ?>
				<?php $count++; ?>
			<?php endforeach; ?>
		</table>
		<ul class="pagination">
			<?php for($i = 1; $i <= $pagecount; $i++): ?>
				<li class="page-item">
					<?php echo Html::link('/list/'. $i, $i); ?>

				</li>
			<?php endfor; ?>
		</ul>
		<?php endif; ?>
	</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('shared.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>