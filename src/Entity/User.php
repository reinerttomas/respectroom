<?php
declare(strict_types=1);

namespace App\Entity;

use DateTime;
use DateTimeImmutable;

class User
{
    private int $id;
    private string $name;
    private string $surname;
    private string $email;
    private ?string $password;
    private array $roles;
    private DateTimeImmutable $createdAt;
    private ?DateTime $updatedAt;

    public function __construct(
        string $name,
        string $surname,
        string $email,
        DateTimeImmutable $createdAt,
    ) {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = null;
        $this->roles = [];
        $this->createdAt = $createdAt;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function changeName(string $name, string $surname): self
    {
        $this->name = $name;
        $this->surname = $surname;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function changeEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function changePassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return array<int, string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;

        if ($roles === []) {
            // guarantee every user at least has ROLE_USER
            $roles[] = 'ROLE_USER';
        }

        return array_unique($roles);
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    public function changeUpdatedAt(DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
