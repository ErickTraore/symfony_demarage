<?php

// src/Entity/User.php


namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository") 
 * @UniqueEntity(fields="username", message="Username already taken")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=191, unique=true)
     * @Assert\NotBlank()
     */
    private $username;

    /**
     * @Assert\NotBlank()
     * * @Assert\Length(
     *      min = 4,
     *      max = 50,
     *      minMessage = "Your PASSWORD must be at least {{ 4 }} characters long",
     *      maxMessage = "Your PASSWORD cannot be longer than {{ 50 }} characters"
     * )
     */
    private $plainPassword;

    private $passwordEncoder;


    /**
     * The below length depends on the "algorithm" you use for encoding
     * the password, but this works well with bcrypt.
     *
     * @ORM\Column(type="string", length=70)
     */
    private $password;

      /**
     * @ORM\Column(type="array")
     */
    private $roles = [];
    
    /**
     *  @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    public function __construct()
    {
        $this->roles = array('ROLE_SYMPATHISANT');
    }
    // other properties and methods


    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername(?string $username)
    {
        $this->username = $username;
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

     /**
     * @see UserInterface
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

     /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // The bcrypt and argon2i algorithms don't require a separate salt.
        // You *may* need a real salt if you choose a different encoder.
        return null;
    }

    public function eraseCredentials()
    {
    }

    public function getRoles(): array   {
        $roles = $this->roles;
        $roles[] = '';
        return array_unique($roles);
    }
  public function setRoles(array $roles): self
  {
      $this->roles = $roles;

      return $this;
  }
    

 

    }
  