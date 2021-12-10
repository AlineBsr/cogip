<?php
    abstract class Controller{


        public function findModel(string $model){
            require_once(ROOT.'models/'.$model.'.php');
            $this->$model = new $model();
        }

        public function render(string $files, array $data){
            extract($data);

            ob_start();

            (PHP_OS == "WINNT") ? require_once(ROOT.'views/'.strtolower(get_class($this)).'/'.$files.'.php') :
            require_once(ROOT.'views/'.strtolower(get_class($this)).'/'.$files);

            $content = ob_get_clean();

            require_once(ROOT.'views/layouts/default.php');
        }
        
        public function checkIfLogged(){
            if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true){
                header("location: ../AdminController/login");
            }
        }

        public function checkPrivilege(){
            $this->findModel('Admin');
            $currentUser = $this->Admin->getOneByCondition($_SESSION['username'],'login',$_SESSION['id']);
            if($currentUser['isAdmin'] == 1){
                return 'Admin';
            }
            elseif($currentUser['isMod'] === 1){
                return 'Mod';
            }
            else{
                return 'UserLambda';
            }
        }

    }