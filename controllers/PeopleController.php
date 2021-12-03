<?php
require_once(ROOT . '/global/Controller.php');

class PeopleController extends Controller
{
    public function getOne(int $id)
    {
        $this->findModel('People');
        $person = $this->People->getOne($id);
        $this->render('getOne.php', ['person' => $person]);
    }

    public function getAll()
    {
        $this->findModel('People');
        $people = $this->People->getAll();
        $this->render('getAll.php', ['people' => $people]);
    }


    public function addPerson()
    {
        $this->findModel('People');
        $person = array();

        $this->render('addPerson.php', $person);
        $colName = ['firstname', 'lastname', 'phone', 'email', 'company_name'];
        if ( isset($_POST['submitContact'])) {
            $person = [$_POST['firstname'], $_POST['lastname'], $_POST['phone'], $_POST['email'], $_POST['company']];
            $this->People->add($colName, $person);
            echo 'Le contact <em>' . $_POST['firstname'] . ' ' .$_POST['lastname'] . '</em> a bien été ajouté ! ';
            echo '<br><button  onclick="window.location.href=\'./getAll\'">Retour à la liste des contacts</button>';
        }else{
            echo 'Tous les champs sont requis';
        }
    }

    public function delete(int $id)
    {
        $this->findModel('People');
        $person = $this->People->getOne($id);
        $this->People->delete($id);
        echo ' Le contact <em>' . $person['lastname'] . ' ' . $person['firstname'] . '</em> a bien été supprimé';
        echo '<br><button  onclick="window.location.href=\'../getAll\'">Retour à la liste des contacts</button>';
    }

    // public function update(){
    //     $this->findModel('People');
    //     $people = $this->People->update();
    // }
}
