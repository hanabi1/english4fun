<?php

/**
 * Class Admin
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Admin extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        // debug message to show where you are, just for the demo
        //echo 'Message from Controller: You are in the controller Admin, using the method index()';
      
        //Loads the model to recieve lesson plans data
        $lessonPlansModel = $this->loadModel('lessonPlansModel');

        // load views. within the views we can echo out $songs and $amount_of_songs easily
        //head.php only contains


        echo $this->dressTemplate('/_templates/head', array('title'=> $this->pageTitle));  
        //Adds the sidebars
        echo $this->dressTemplate('/_templates/sidebars', array('lessonPlans' => json_decode(file_get_contents(URL . 'lessonplans/getAllLessonPlans'),true),
                                                                'isUserLoggedIn' =>$this->userModel->isUserLoggedIn()));
        
        require 'application/views/_templates/header.php';
        require 'application/views/admin/index.php';
        require 'application/views/_templates/footer.php';
    }
}
