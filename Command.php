<?php

class Command {

    private $manager;

    public function __construct()
    {
        $this->manager = new ContactManager();
    }

    public function list(): void
    {
        $contacts = $this->manager->findAll();
            if (empty($contacts)) {
                echo "Aucun contact";
                return;
            }
            echo "Liste des contacts : ";
            echo "id, name, email, phone numer";
            foreach ($contacts as $contact) {
                echo $contact->toString();
            }
    }

    public function detail($id): void {
        $contact = $this->manager->findById($id);
        if (!$contact) {
            echo "Contact non trouvé\n";
            return;
        }
        echo $contact->toString();
    }

    public function create($name, $email, $phoneNumber): void
    {
        $contact = $this->manager->create($name, $email, $phoneNumber);
        echo "Contact créé : " . $contact->toString();
    }


    public function delete($id): void
    {
        $this->manager->delete($id);
        echo "Contact supprimé\n";
    }

}