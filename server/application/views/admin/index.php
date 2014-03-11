	<div id="main-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="page-header">
					 	<h1>Admin <br><small>Change stuff...</small></h1>
					</div>
				</div>
			</div>
			<div class="row">
	            <div class="col-md-4 col-md-offset-2">
	                <h3>Add a lesson plan</h3>
	                <form name="addLessonPlan" action="<?php echo URL; ?>lessonplans/addLessonPlan" method="POST">
	                    <div class="form-4">
	                        <input type="text" name="name" class="form-control" placeholder="Name..." required > 
	                    </div>
	                    <div class="form-group">        
	                        <input type="text" name="title" class="form-control" placeholder="Title..." required >
	                    </div>
	                    <div class="form-group">        
	                        <textarea type="text" name="content" class="form-control" placeholder="Content..."required ></textarea>
	                    </div>
	                    <div class="form-group-btn">
	                        <button type="submit" class="btn btn-success">Add</button>
	                    </div>
	                </form>
	            </div>           
                <div class="col-md-4">
                    <h3>List of Lesson Plans (tot: <?php echo count($lessonPlans);?>)</h3>
                    <!-- main content output -->
                    <div>
                        <table class="table table-striped">
                            <thead style="background-color: #ddd; font-weight: bold;">
                                <tr>
                                    <td>ID</td>
                                    <td>Name</td>
                                    <td>Title</td>
                                    <td>Delete</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($lessonPlans as $plan): ?>
                                <tr>
                                    <td><?php if (isset($plan['id'])) echo $plan['id']; ?></td>
                                    <td><?php if (isset($plan['name'])):?>
                                        <a href="<?php echo URL . 'lessonplans/view/' . $plan['name'] . '/'; ?>"><?php echo $plan['name']; ?></a>              
                                    <?php endif;?>
                                    </td>
                                    <td><?php if (isset($plan['title'])) echo $plan['title']; ?></td>
                                    <td><a href="<?php echo URL . 'lessonplans/deleteLessonPlan/' . $plan['id']; ?>">(x)</a></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
			<div class="row">
	            <div class="col-md-4 col-md-offset-2">
	                <h3>Add a user</h3>
	                <form name="addNewUser" action="<?php echo URL; ?>admin/addUser" method="POST">
	                    <div class="form-4">
	                        <input type="text" name="username" class="form-control" placeholder="Username..." required > 
	                    </div>
	                    <div class="form-group">        
	                        <input type="password" name="password" class="form-control" placeholder="Password..." required >
	                    </div>
	                    <div class="form-group">        
	                        <input type="number" name="userlevel" class="form-control" placeholder="Userlevel..."required >
	                    </div>
	                    <div class="form-group-btn">
	                        <button type="submit" class="btn btn-success">Add</button>
	                    </div>
	                </form>
	            </div>           
                <div class="col-md-4">
                    <h3>List of Users (tot: <?php echo count($users);?>)</h3>
                    <!-- main content output -->
                    <div>
                        <table class="table table-striped">
                            <thead style="background-color: #ddd; font-weight: bold;">
                                <tr>
                                    <td>User ID</td>
                                    <td>Username</td>
                                    <td>Userlevel</td>
                                    <td>Delete</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?php if (isset($user['userid'])) echo $user['userid']; ?></td>                                   
                                    <td><?php if (isset($user['username'])) echo $user['username']; ?></td>
                                    <td><?php if (isset($user['userlevel'])) echo $user['userlevel']; ?></td>
                                	<td><a href="<?php echo URL . 'admin/deleteUser/' . $user['userid']; ?>">(x)</a></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h3>Statistics<br><small>Google stuff...</small></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <img src="http://checkpagerank.net/pricon.php?key=800a2921ff27963cc36346ddca32abbd&t=1" width="88" height="31" alt="Page Rank" />
                </div>
            </div>
		</div>
	</div>		

