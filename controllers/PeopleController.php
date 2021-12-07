<?php
require_once(ROOT . '/global/Controller.php');

class PeopleController extends Controller
{
    public function getPerson(int $id) {
        $this->findModel('People');
        $person = $this->People->getOne($id);
        $this->render('getPerson', ['person' => $person]);
    }

    public function getPeople() {
        $this->findModel('People');
        $people = $this->People->getAll();
        $this->render('getPeople', ['people' => $people]);

    }

    public function addPerson() {
        $this->findModel('People');
        $person = array();
        $this->render('addPerson', $person);
        
        $colName = ['firstname', 'lastname', 'phone', 'email', 'company_name'];
        if (isset($_POST['submitContact'])) {
            $tel_pattern = "/^(\+\d{1,3})?[0]?[\d]{9}$/";
            $text_pattern = "/^(?:[a-zA-Z])[\w\s.-]{2,}$/";
            // https://www.developerspot.co.ke/posts/server-side-form-sanitization

            $person =  [$_POST['firstname'], $_POST['lastname'], $_POST['phone'], $_POST['email'], $_POST['company']];
            $this->People->add($colName, $this->formSanitization($person));
            echo 'Le contact <em>' . $_POST['firstname'] . ' ' . $_POST['lastname'] . '</em> a bien été ajouté ! ';
            echo '<br><button  onclick="window.location.href=\'getPeople\'">Retour à la liste des contacts</button>';
        } 
    }

    public function updatePerson(int $id) {
        $this->findModel('People');
        $updatePerson = $this->People->getOne($id);
        $this->render('updatePerson', ['person' => $updatePerson]);

        $updatePerson = array();
        $colName = ['firstname = ?', 'lastname = ?', 'phone = ?', 'email = ?', 'company_name = ?'];
        if (isset($_POST['submitUpdateP'])) {
            $updatePerson = [$_POST['firstname'], $_POST['lastname'], $_POST['phone'], $_POST['email'], $_POST['company']];
            $this->People->update($colName,  $this->formSanitization($updatePerson), $id);
            echo 'Le contact <em>' . $_POST['firstname'] . ' ' . $_POST['lastname'] . '</em> a bien été modifié ! ';
            echo '<br><button  onclick="window.location.href=\'../getPeople\'">Retour à la liste des contacts</button>';
        } 
    }

    public function delete(int $id) {
        $this->findModel('People');
        $person = $this->People->getOne($id);
        $this->People->delete($id);
        echo ' Le contact <em>' . $person['lastname'] . ' ' . $person['firstname'] . '</em> a bien été supprimé';
        echo '<br><button  onclick="window.location.href=\'../getPeople\'">Retour à la liste des contacts</button>';
    }

    private function formSanitization(array $person){
            $firstname =$lastname=$phone=$email=$comp='';
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $phone = $_POST['phone'];
            $email = trim($_POST['email']);
            $comp = $_POST['company'];
            $firstname = filter_var($firstname, FILTER_SANITIZE_STRING);
            $lastname = filter_var( $lastname, FILTER_SANITIZE_STRING);
            $phone = filter_var( $phone, FILTER_SANITIZE_NUMBER_INT);
            $email = filter_var( $email, FILTER_SANITIZE_EMAIL);
            $comp = filter_var(  $comp, FILTER_SANITIZE_STRING);

            $person = [$firstname, $lastname, $phone, $email, $comp]; 
            return $person;
    }

}
