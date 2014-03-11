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
        if($this->userModel->isUserLoggedIn()!==1){
            $this->redirect('home');
        }
        //Loads the model to recieve lesson plans data
        $lessonPlansModel = $this->loadModel('lessonPlansModel');

        // load views. within the views we can echo out $songs and $amount_of_songs easily
        //head.php only contains


        echo $this->dressTemplate('/_templates/head', array('title'=> $this->pageTitle));  
        //Adds the sidebars
        echo $this->dressTemplate('/_templates/sidebar-left', array('lessonPlans' => json_decode($this->getData(URL . 'lessonplans/getAllLessonPlans'),true),
                                                                'isUserLoggedIn' =>$this->userModel->isUserLoggedIn()));
        
        require 'application/views/_templates/header.php';
        echo $this->dressTemplate('/admin/index', array('lessonPlans' => json_decode($this->getData(URL . 'lessonplans/getAllLessonPlans'),true),
                                                        'users' => $this->userModel->getAllUsers()));
        require 'application/views/_templates/footer.php';
    }

    public function addUser()
    {
        if($this->userModel->isUserLoggedIn()!==1){
            $this->redirect('home');
        }
        // Check if we have POST data to create a new LessonPlan entry
        if (isset($_POST["username"],$_POST["password"],$_POST["userlevel"])) {
            // load model, perform an action on the model
            $this->userModel->addUser($_POST["username"],$_POST["password"],$_POST["userlevel"]);
        }

        // where to go after user has been added
        header('location: ' . URL . 'admin/');
    }
    public function deleteUser($userId)
    {
        if($this->userModel->isUserLoggedIn()!==1){
            $this->redirect('home');
        }
        // Check if we have POST data to create a new LessonPlan entry
        // load model, perform an action on the model
        $this->userModel->deleteUser($userId);

        // where to go after user has been added
        header('location: ' . URL . 'admin/');
    }

    public function getAllUsers(){
        if($this->userModel->isUserLoggedIn()!==1){
            $this->redirect('home');
        }
        echo json_encode($this->userModel->getAllUsers());
        header("Content-type: text/x-json");
        $this->redirect('admin');
    }

}
