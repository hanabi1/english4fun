<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
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
        require 'application/views/home/index.php';
        require 'application/views/_templates/footer.php';
    }
}
