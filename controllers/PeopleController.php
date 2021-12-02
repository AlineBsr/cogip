<?php
require_once(ROOT . '/global/Controller.php');

class PeopleController extends Controller
{
    // public function getOne()
    // {
    //     $this->findModel('People');
    //     $people = $this->People->getOne();
    //     echo $people['id'];


    // }

    public function afficher()
    {
        $this->findModel('People');
        $people = $this->People->getAll();
        $this->render('afficher', ['people'=>$people]);

    }

    // public function  add()
    // {
    //     $this->findModel('People');
    //     $people = $this->People->add();
    //     var_dump($people);
    // }
    
    // public function delete(){
    //     $this->findModel('People');
    //     $people = $this->People->delete();   
    // }

    // public function update(){
    //     $this->findModel('People');
    //     $people = $this->People->update();
    // }
}