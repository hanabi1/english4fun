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
        echo $this->dressTemplate('/_templates/sidebars', array('lessonPlans' => json_decode(file_get_contents(URL . 'lessonplans/getAllLessonPlans'),true),
                                                                'isUserLoggedIn' =>$this->userModel->isUserLoggedIn()));
        echo $this->dressTemplate('/lessonplans/index', array('lessonPlans' => json_decode(file_get_contents(URL . 'lessonplans/getAllLessonPlans'),true)));
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

        // where to go after song has been added
        header('location: ' . URL . 'admin/');
    }
    
    public function getAllLessonPlans(){
        $lessonPlansModel = $this->loadModel('LessonPlansModel');
        echo json_encode($lessonPlansModel->getAllLessonPlans());
        header("Content-type: text/x-json");
    }

    public function getLessonPlan($name){
        $lessonPlansModel = $this->loadModel('LessonPlansModel');
        echo json_encode($lessonPlansModel->getLessonPlan($name));
        header("Content-type: text/x-json");
    }
    public function view($name){
        $lessonPlansModel = $this->loadModel('LessonPlansModel');
        
        // load views. Using templating when necessary
        echo $this->dressTemplate('/_templates/head', array('title'=> $this->pageTitle));        
        require 'application/views/_templates/header.php';
        echo $this->dressTemplate('/_templates/sidebars', array('lessonPlans' => json_decode(file_get_contents(URL . 'lessonplans/getAllLessonPlans'),true),
                                                                   'isUserLoggedIn' => $this->userModel->isUserLoggedIn()));
        echo $this->dressTemplate('/lessonplans/lessonplan', array('lessonPlan' => json_decode(file_get_contents(URL . 'lessonplans/getLessonPlan/'. $name),true)));
        require 'application/views/_templates/footer.php';
    }

    /**
     * ACTION: deleteSong
     * This method handles what happens when you move to http://yourproject/songs/deletesong
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "delete a song" button on songs/index
     * directs the user after the click. This method handles all the data from the GET request (in the URL!) and then
     * redirects the user back to songs/index via the last line: header(...)
     * This is an example of how to handle a GET request.
     * @param int $song_id Id of the to-delete song
     */
    public function deleteLessonPlan($id='')
    {
        // simple message to show where you are
        echo 'Message from Controller: You are in the Controller: Songs, using the method deleteSong().';

        // if we have an id of a song that should be deleted
        if (isset($id)) {
            // load model, perform an action on the model
            $lessonPlanModel = $this->loadModel('LessonPlansModel');
            $lessonPlanModel->deleteLessonPlan($id);
        }

        // where to go after song has been deleted
        header('location: ' . URL . 'lessonplans/');
    }
}
