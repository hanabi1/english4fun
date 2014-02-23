	<div class="sidebar-left">
		<?php if(isset($_SESSION['username'])):?>
			<h4>Hi <?php echo $_SESSION['username']?>!</h4>
		<?php endif;?>
		<ul>
			<h4>Navigation</h4>
			<?php if($isUserLoggedIn>=1):?>		
				<li><a href="<?php echo URL;?>admin"><strong>ADMIN</strong></a></li>
			<?php endif;?>

			<li><a href="<?php echo URL?>home">Home</a></li>
			<li><a href="<?php echo URL?>lessonplans">View All Lessonplans</a></li>
			
			<?php if($isUserLoggedIn):?>		
				<li><a href="<?php echo URL?>logout">Logout</a></li>
			<?php else:?>
				<li><a href="<?php echo URL?>login">Login</a></li>
			<?php endif;?>
		</ul>

		<?php if(isset($lessonPlans)):?>
			<h4>Lesson Plans</h4>
			<ul>
			<?php foreach ($lessonPlans as $lessonPlan):?>
				<li>
					<a href="<?php echo URL . 'lessonplans/view/' . $lessonPlan['name'] . '/'; ?>"><?php echo $lessonPlan['title']; ?></a>
				</li>
			<?php endforeach;?>
			</ul>
		<?php else:?>
			<?php echo 'No Lessonplans yet =(';?>
		<? endif;?>
	</div>