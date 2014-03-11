<div id="main-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h1><?php if (isset($lessonPlan['title'])) echo $lessonPlan['title']; ?><br><small>Unleash your creativity!</small></h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- main content output -->
                <div>
                    <p>
                        <?php if (isset($lessonPlan['content'])) echo $lessonPlan['content']; ?></h3>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

