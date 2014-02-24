<?php
//This model is responsible for gathering and sending
//everything related to the user
class UserModel
{  
    //This constructor is called by controller->loadModel
    //It must be called with a DB class.
    function __construct($db) {
	    try{$this->db = $db;
	    }catch (PDOException $e) {
	        exit('Database connection could not be established.');
	    }
    }

    //Queries the DB for credentials connected to a username
	private function getUserCredentialsFromDB($userName)
    {
        $sql = "SELECT username, hash,userlevel FROM users where username=:username";
        $query = $this->db->prepare($sql);
        $query->execute(array('username'=>$userName));

        //FetchAll now return an Assoc Array of the results
        return $query->fetch();
    }

    public function userLogIn($username,$password){
        require_once('application/utils/hashing.php'); 
        //If There is a session with name and pass, Check it with DB
        if(isset($username,$password)){
            //Ask loginModel for user credentials 
            $userDataFromDB = $this->getUserCredentialsFromDB($username);
            //Compare the DB credentials to our session variable
            if(validate_password($password,$userDataFromDB['hash'])===true){
        
                //admin = userlevel 1
                //User  = userlevel 2
                return $userDataFromDB['userlevel'];
            }
        }
        //Invalid username/password, returning false
        return false;
    }

    public function isUserLoggedIn(){
        require_once('application/utils/hashing.php');
        
        //If There is a session with name and pass, Check it with DB
        if(isset($_SESSION['username']) && isset($_SESSION['password'])){
            //Ask loginModel for user credentials 
            $userDataFromDB = $this->getUserCredentialsFromDB($_SESSION['username']);
            //Compare the DB credentials to our session variable
            if(validate_password($_SESSION['password'],$userDataFromDB['hash'])===true){
        
                //admin = userlevel 1
                //User  = userlevel 2
                return $userDataFromDB['userlevel'];
            }
        }
        //Anon/invalid user detected, returning false
        return false;
    }
}