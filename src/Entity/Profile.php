<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Profile {
    #[Assert\NotBlank(message: 'Le nom ne peut pas être vide.')]
    #[Assert\Length(min: 3, max: 100, minMessage: 'Le nom doit contenir au moins {{ limit }} caractères.', maxMessage: 'Le nom ne peut pas dépasser {{ limit }} caractères.')]
    private string $name;

    #[Assert\NotBlank(message: 'La description ne peut pas être vide.')]
    #[Assert\Length(min: 10, max: 1000, minMessage: 'La description doit contenir au moins {{ limit }} caractères.', maxMessage: 'La description ne peut pas dépasser {{ limit }} caractères.')]
    private string $description;

    #[Assert\Type(type: 'bool', message: 'Le champ relation sérieuse doit être un booléen.')]
    private bool $seriousRelationship;

    #[Assert\NotBlank(message: 'La date de naissance ne peut pas être vide.')]
    #[Assert\NotNull(message: 'La date de naissance ne peut pas être vide.')]
    private \DateTimeInterface $birthdate;

    #[Assert\NotBlank(message: 'L’email ne peut pas être vide.')]
    #[Assert\Email(message: 'L’email {{ value }} n’est pas valide.')] 
    private string $email;

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function getSeriousRelationship()
    {
        return $this->seriousRelationship;
    }

    public function setSeriousRelationship(bool $seriousRelationship)
    {
        $this->seriousRelationship = $seriousRelationship;
    }

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(\DateTimeInterface $birthdate): void
    {
        $this->birthdate = $birthdate;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

}