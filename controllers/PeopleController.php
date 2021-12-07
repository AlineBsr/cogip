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
            $person =  [$_POST['firstname'], $_POST['lastname'], $_POST['phone'], $_POST['email'], $_POST['company']];
            $this->People->add($colName, $this->formSanitization($person));
            echo 'Le contact <em>' . $person['firstname'] . ' ' . $person['lastname'] . '</em> a bien été ajouté ! ';
        }
    }

    public function updatePerson(int $id) {
        $this->findModel('People');
        $updatePerson = $this->People->getOne($id);
        $this->render('updatePerson', ['person' => $updatePerson]);

        $updatePerson = array();
        $colName = ['firstname = ?', 'lastname = ?', 'phone = ?', 'email = ?', 'company_name = ?'];
        if (isset($_POST['submitUpdateP'])) {
            $updatePerson = ['firstname' => $_POST['firstname'],'lastname' => $_POST['lastname'], 'phone'=> $_POST['phone'], 'email' => $_POST['email'] ,'company' => $_POST['company']];
            $this->People->update($colName,  $this->formSanitization($updatePerson), $id);
            echo 'Le contact <em>' . $updatePerson['firstname'] . ' ' . strtoupper($updatePerson['lastname']) . '</em> a bien été modifié ! ';
        }
    }

    public function delete(int $id) {
        $this->findModel('People');
        $person = $this->People->getOne($id);
        $this->People->delete($id);
        echo ' Le contact <em>' . $person['lastname'] . ' ' . $person['firstname'] . '</em> a bien été supprimé';
        echo '<br><button  onclick="window.location.href=\'../getPeople\'">Retour à la liste des contacts</button>';
    }

    private function formSanitization(array $person) {
        $tel_pattern = "/^(\+\d{1,3})?[0]?[\d]{9}$/";
        $text_pattern = "/^(?:[a-zA-Z])[\w\s.-]{2,}$/";
        // https://www.developerspot.co.ke/posts/server-side-form-sanitization

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // var_dump($_POST);s
            $firstname = $lastname = $phone = $email = $comp = '';
            $firstname = htmlspecialchars( ucfirst( $_POST['firstname']));
            $lastname = htmlspecialchars( ucfirst( $_POST['lastname']));
            $phone = $_POST['phone'];
            $email = trim($_POST['email']);
            $comp = htmlspecialchars(ucfirst( $_POST['company']));

            $firstname = filter_var($firstname, FILTER_SANITIZE_STRING);
            $lastname = filter_var($lastname, FILTER_SANITIZE_STRING);
            $phone = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $comp = filter_var($comp, FILTER_SANITIZE_STRING);
            // VALIDATION
            if (!preg_match($text_pattern, $firstname) or !preg_match($text_pattern, $lastname) or !preg_match($text_pattern, $comp)) {
                echo 'Veuillez vérifier la saisie pour le nom, le prénom et la société.';
            } else {
                $person = [$firstname, $lastname, $phone, $email, $comp]; 
                return $person;
            }
        }
    }
}
