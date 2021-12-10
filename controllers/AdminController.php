<?php
    require_once(ROOT.'/global/Controller.php');

    class AdminController extends Controller{

        public function logIn(){
            $this->findModel('Admin');
            $user = array();
            $this->render('login.php', ['user' => $user ]);
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                header("location: welcome");
            }
            if(isset($_POST["username"])){
                $username = $_POST["username"];
                $password = $_POST["password"];
                $user = $this->Admin->getOneByCondition($username,'login');
                if(is_null($user)){
                    echo "Le nom d'utilisateur est incorecte, etes-vous bien inscrit ?";
                }
                if($user['password'] == $password){
                    
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $user["id"];
                    $_SESSION["username"] = $username;  
                    header("location: welcome");
                }
                else{
                    echo "Le mot de passe est incorecter.";
                }
            }
        }

        public function welcome(){
            $this->findModel('Admin');
            if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true){
                header("location: login");
            }
            $user = $_SESSION["username"];
            $this->render('welcome', ['user' => $user ]);
        }

        public function signIn(){
            $this->findModel('Admin');
            $newUser = array();
            $listeColumn = ['login','password','isAdmin','isMod'];
            $this->render('signIn', ['newUser' => $newUser]);
            if(isset($_POST["username"])){
                if($_POST["password"] != $_POST["passwordRep"]){
                    echo "Les mots de passe ne correspondent pas";
                }
                else{
                    $newUser = [$_POST["username"],$_POST["password"],0,0];
                    $this->Admin->add($listeColumn,$newUser);
                    $user = $this->Admin->getOneByCondition($_POST["username"],'login');
                    session_start();
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $user["id"];
                    $_SESSION["username"] = $user["login"];  
                    header("location: welcome");
                }   
            }
        }

        public function listUser(){
            $check = $this->checkPrivilege();
            if($check != "Admin" || $check != "Mod"){
                echo "Désolé vous n'avez pas les privilèges pour réaliser cette action";
            }
            else{
                $this->checkIfLogged();
                $this->findModel("Admin");
                $users = $this->Admin->getAll();
                $this->render('listUser', ['users' => $users]);
            }
        }

        public function privilegeUpdate(int $id){
            $check = $this->checkPrivilege();
            if($check != "Admin"){
                echo "Désolé vous n'avez pas les privilèges pour réaliser cette action";
            }
            else{
                $this->checkIfLogged();
                $this->findModel("Admin");
                $user = $this->Admin->getOne($id);
                $this->render('privilegeUpdate', ['user' => $user]);
                $updateUser = array();
                $listeColumn = ['isAdmin = ?','isMod = ?'];
                if(isset($_POST["privilege"])){
                    if($_POST["privilege"] == 'isAdmin'){
                        $isAdmin = 1;
                        $isMod = 1;
                    }
                    else if($_POST["privilege"] == 'isMod'){
                        $isAdmin = 0;
                        $isMod = 1;
                    }
                    else{
                        $isAdmin = 0;
                        $isMod = 0;
                    }
                    $updateUser = [$isAdmin,$isMod];
                    $this->Admin->update($listeColumn,$updateUser,$id);
                }
            }
        }

        public function resetPassword(){
            $this->checkIfLogged();
            $this->findModel('Admin');
            $user = $this->Admin->getOnebyCondition($_SESSION["username"],'login');
            $this->render('resetPassword', ['user' => $user]);
            $updateUser = array();
            $listeColumn = ['password = ?'];
            if(isset($_POST['password'])){
                if($_POST['password'] === $_POST['passwordRep']){
                    array_push($updateUser,$_POST['password']);
                    $this->Admin->update($listeColumn,$updateUser,$user["id"]);
                }
                else{
                    echo "les mots de passe ne correspondent pas.";
                }
            }
            
        }

        public function logOut(){
            $this->checkIfLogged();
            $_SESSION = array();
            $this->render('logout',['user' => $_SESSION]);
            session_destroy();
            header("location: login");
        }
    }