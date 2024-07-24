<?php 

class ContactManager 
{
    private $db;

    public function __construct()
    {
        $this->db = DBConnect::getInstance()->getPDO();
    }


    public function findAll(): array {
        $query = $this->db->prepare("SELECT * FROM contact");
        $query->execute();

        $contacts = [];
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $contacts[] = Contact::fromArray($row);
        }


        return $contacts;
    }

    public function findById(int $id): ?Contact
    {
        $query = $this->db->prepare("SELECT * FROM contact WHERE id = :id");
        $query->execute(["id" => $id]);
        $contact = $query->fetch(PDO::FETCH_ASSOC);
        if (!$contact) {
            return null;
        }
        $contact = Contact::fromArray($contact);
        return $contact;
    }

    public function delete(int $id): void
    {
        $query = $this->db->prepare("DELETE FROM contact WHERE id = :id");
        $query->execute([":id" => $id]);
    }

    public function create(string $name, string $email, string $phoneNumber): Contact
    {
        $query = $this->db->prepare("INSERT INTO contact (name, email, phone_number) VALUES (:name, :email, :phone_number)");
        $query->execute(["name" => $name, "email" => $email, "phone_number" => $phoneNumber]);
        $id = $this->db->lastInsertId();
        return $this->findById($id);
    }
}