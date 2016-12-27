<?php

namespace InfiltradosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="InfiltradosBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $movie;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $book;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $song;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $band;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $sport;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $hobby;


    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}

