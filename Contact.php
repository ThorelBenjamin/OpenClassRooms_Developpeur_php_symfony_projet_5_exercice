<?php

class Contact {

    private ?int $id;
    private ?string $name;
    private ?string $email;
    private ?string $phone_number;

    public function __construct(?int $id = null, ?string $name = null, ?string $email = null, ?string $phoneNumber = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
    }

    public static function fromArray(array $data): Contact
    {
        return new self(
            $data['id'] ?? null,
            $data['name'] ?? null,
            $data['email'] ?? null,
            $data['phone_number'] ?? null
        );
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function setPhoneNumber(?string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function toString(): string
    {
        return "id: " . $this->id . ", Name: " . $this->name . ", Email: " . $this->email . ", Phone Number: " . $this->phoneNumber;
    }
}



