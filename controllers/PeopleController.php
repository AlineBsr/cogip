<?php
require_once(ROOT . '/global/Controller.php');

class PeopleController extends Controller 
{
    public function getOne(int $id) {       
        $this->findModel('People');
        $person = $this->People->getOne($id);
        $this->render('getOne.php', ['person' => $person]);
    }

    public function getAll() {
        $this->findModel('People');
        $people = $this->People->getAll();
        $this->render('getAll.php', ['people' => $people]);
    }

    public function  formAddPerson()
    {
        $this->findModel('People');
        // $person = $this->People->add();
        // var_dump($person);
        $this->render('formAddPerson.php', ['']);
    }
    
    
    
    // public function delete(){
    //     $this->findModel('People');
    //     $people = $this->People->delete();   
    // }

    // public function update(){
    //     $this->findModel('People');
    //     $people = $this->People->update();
    // }
}
