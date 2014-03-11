<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Login extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        //Loads the model to recieve lesson plans data
        $lessonPlansModel = $this->loadModel('lessonPlansModel');
        $userModel = $this->loadModel('UserModel');
        
        if($this->userModel->isUserLoggedIn()){
           $this->redirect('home');
        }

        if (isset($_POST["username"]) && isset($_POST["password"])){
            if($this->userModel->userLogIn($_POST["username"],$_POST["password"])){
                //Clean Session
                //unset($_SESSION);
                
                //Add a User Session
                $_SESSION['username']=$_POST["username"];
                $_SESSION['password']=$_POST["password"];                
                $this->redirect('justloggedin');
            }
        }
        // load views. Using templating when necessary
        echo $this->dressTemplate('/_templates/head', array('title'=> $this->pageTitle));        
        require 'application/views/_templates/header.php';
        echo $this->dressTemplate('/_templates/sidebar-left', array('lessonPlans' => json_decode($this->getData(URL . 'lessonplans/getAllLessonPlans'),true),
                                                                'isUserLoggedIn' =>$this->userModel->isUserLoggedIn()));
        require 'application/views/login/index.php';
        require 'application/views/_templates/footer.php';
    }
}