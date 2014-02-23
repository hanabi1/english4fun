<div id="main-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-2">
                <div class="page-header">
                    <h1>Lesson Plans<br><small>View 'em all!</small></h1>
                </div>
            </div> 
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <!-- main content output -->
                <div>
                    <h3>Amount of Lesson Plans:<?php echo count($lessonPlans); ?> </h3>
                    <h3>List of Lesson Plans</h3>
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
                        <?php foreach ($lessonPlans as $plan) { ?>
                            <tr>
                                <td><?php if (isset($plan['id'])) echo $plan['id']; ?></td>
                                <td><?php if (isset($plan['name'])):?>
                                        <a href="<?php echo URL . 'lessonplans/view/' . $plan['name'] . '/'; ?>"><?php echo $plan['name']; ?></a>              
                                <?php endif;?>
                                </td>
                                <td><?php if (isset($plan['title'])) echo $plan['title']; ?></td>
                                <td><a href="<?php echo URL . 'lessonplans/deleteLessonPlan/' . $plan['id']; ?>">(x)</a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div> 



    </div>
</div>
