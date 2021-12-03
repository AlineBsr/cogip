<?php
require_once(ROOT . '/global/Controller.php');

class PeopleController extends Controller
{
    public function getPerson(int $id) {
        $this->findModel('People');
        $person = $this->People->getOne($id);
        $this->render('getPerson.php', ['person' => $person]);
    }

    public function getPeople() {
        $this->findModel('People');
        $people = $this->People->getAll();
        $this->render('getPeople.php', ['people' => $people]);
    }


    public function addPerson() {
        $this->findModel('People');
        $person = array();

        $this->render('addPerson.php', $person);
        $colName = ['firstname', 'lastname', 'phone', 'email', 'company_name'];
        if (isset($_POST['submitContact'])) {
            $person = [$_POST['firstname'], $_POST['lastname'], $_POST['phone'], $_POST['email'], $_POST['company']];
            $this->People->add($colName, $person);
            echo 'Le contact <em>' . $_POST['firstname'] . ' ' . $_POST['lastname'] . '</em> a bien été ajouté ! ';
            echo '<br><button  onclick="window.location.href=\'./getPeople\'">Retour à la liste des contacts</button>';
        } 
    }

    public function delete(int $id) {
        $this->findModel('People');
        $person = $this->People->getOne($id);
        $this->People->delete($id);
        echo ' Le contact <em>' . $person['lastname'] . ' ' . $person['firstname'] . '</em> a bien été supprimé';
        echo '<br><button  onclick="window.location.href=\'../getPeople\'">Retour à la liste des contacts</button>';
    }

    public function updatePerson(int $id) {
        $this->findModel('People');
        $updatePerson = $this->People->getOne($id);
        $this->render('updatePerson.php', ['person' => $updatePerson]);
        $updatePerson = array();
        $colName = ['firstname = ?', 'lastname = ?', 'phone = ?', 'email = ?', 'company_name = ?'];
        if (isset($_POST['submitUpdateP'])) {
            $person = [$_POST['firstname'], $_POST['lastname'], $_POST['phone'], $_POST['email'], $_POST['company']];
            $this->People->update($colName, $person, $id);
            echo 'Le contact <em>' . $_POST['firstname'] . ' ' . $_POST['lastname'] . '</em> a bien été modifié ! ';
            echo '<br><button  onclick="window.location.href=\'../getPeople\'">Retour à la liste des contacts</button>';
        } 
    }
}
