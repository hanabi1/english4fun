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
                return $userDataFromDB['userlevel']/1;
            }
        }
        //Anon/invalid user detected, returning false
        return false;
    }
    public function getAllUsers()
    {
        $sql = "SELECT username,userlevel,userid FROM users";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }
    
    public function addUser($userName, $password, $userLevel)
    {
        if($this->isUserLoggedIn()!==1){
            $this->redirect('home');
        }      
        require_once('application/utils/hashing.php');

        $sql = "INSERT INTO users (username, userlevel, hash) VALUES (:username, :userlevel, :hash)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':username' => $userName, ':userlevel' => $userLevel, ':hash' => create_hash($password)));
    }
    public function deleteUser($userId)
    {
        $sql = "DELETE FROM users WHERE userid = :userid";
        $query = $this->db->prepare($sql);
        $query->execute(array(':userid' => $userId));
    }
}