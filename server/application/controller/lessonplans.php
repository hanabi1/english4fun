<?php

/**
 * Class Songs
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class LessonPlans extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/songs/index
     */
    public function index()
    {
        //Loads the model to recieve lesson plans data
        $lessonPlansModel = $this->loadModel('lessonPlansModel');

        // load views. Using templating when necessary
        echo $this->dressTemplate('/_templates/head', array('title'=> $this->pageTitle));        
        require 'application/views/_templates/header.php';
        echo $this->dressTemplate('/_templates/sidebar-left', array('lessonPlans' => json_decode($this->getData(URL . 'lessonplans/getAllLessonPlans'),true),
                                                                'isUserLoggedIn' =>$this->userModel->isUserLoggedIn()));
        echo $this->dressTemplate('/lessonplans/index', array('lessonPlans' => json_decode($this->getData(URL . 'lessonplans/getAllLessonPlans'),true)));
        require 'application/views/_templates/footer.php';
    }

    /**
     * ACTION: addSong
     * This method handles what happens when you move to http://yourproject/songs/addsong
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "add a song" form on songs/index
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to songs/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function addLessonPlan()
    {
        // Check if we have POST data to create a new LessonPlan entry
        if (isset($_POST["name"],$_POST["title"],$_POST["content"])) {
            // load model, perform an action on the model
            $lessonPlansModel = $this->loadModel('LessonPlansModel');
            $lessonPlansModel->addLessonPlan($_POST["name"],$_POST["title"],$_POST["content"]);
        }

        // where to go after lessonplan has been added
        header('location: ' . URL . 'admin');
    }
    
    public function getAllLessonPlans(){
        $lessonPlansModel = $this->loadModel('LessonPlansModel');
        echo json_encode($lessonPlansModel->getAllLessonPlans());
    }

    public function getLessonPlan($name){
        $lessonPlansModel = $this->loadModel('LessonPlansModel');
        echo json_encode($lessonPlansModel->getLessonPlan($name));
    }
    public function view($name){
        $lessonPlansModel = $this->loadModel('LessonPlansModel');
        
        // load views. Using templating when necessary
        echo $this->dressTemplate('/_templates/head', array('title'=> $this->pageTitle));        
        require 'application/views/_templates/header.php';
        echo $this->dressTemplate('/_templates/sidebar-left', array('lessonPlans' => json_decode($this->getData(URL . 'lessonplans/getAllLessonPlans'),true),
                                                                   'isUserLoggedIn' => $this->userModel->isUserLoggedIn()));
        echo $this->dressTemplate('/lessonplans/lessonplan', array('lessonPlan' => json_decode($this->getData(URL . 'lessonplans/getLessonPlan/'. $name),true)));
        require 'application/views/_templates/footer.php';
    }

    public function deleteLessonPlan($id='')
    {
        // if we have an id of a song that should be deleted
        if (isset($id)) {
            // load model, perform an action on the model
            $lessonPlanModel = $this->loadModel('LessonPlansModel');
            $lessonPlanModel->deleteLessonPlan($id);
        }

        // where to go after lessonplan has been deleted
        header('location: ' . URL . 'admin/');
    }
}