	<div id="main-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="page-header">
					 	<h1>Admin <br><small>Add some lesson plans...</small></h1>
					</div>
				</div>
			</div>
			<div class="row">
	            <div class="col-md-3 col-md-offset-2">
	                <form name="addLessonPlan" action="<?php echo URL; ?>lessonplans/addLessonPlan" method="POST">
	                    <div class="form-4">
	                        <input type="text" name="name" class="form-control" placeholder="Name..." required > 
	                    </div>
	                    <div class="form-group">        
	                        <input type="text" name="title" class="form-control" placeholder="Title..." required >
	                    </div>
	                    <div class="form-group">        
	                        <input type="text" name="content" class="form-control" placeholder="Content..."required >
	                    </div>
	                    <div class="form-group-btn">
	                        <button type="submit" class="btn btn-success">Add</button>
	                    </div>
	                </form>
	            </div>
        	</div>
		</div>
	</div>		

