<?php
    abstract class Controller{

        public function findModel(string $model){
            require_once(ROOT.'/models/'.$model.'.php');
            $this->$model = new $model();
        }

        public function render(string $files, array $data){
            extract($data);

            ob_start();

            require_once(ROOT.'/views/'.strtolower(get_class($this)).'/'.$files.'.php');

            $content = ob_get_clean();

            require_once(ROOT.'/views/layouts/default.php');
        }
    }