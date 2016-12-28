<?php

namespace InfiltradosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Bridge\Doctrine\Validator\Constraints;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @Constraints\UniqueEntity("email")
 * @Constraints\UniqueEntity("username")
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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $movie;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $book;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $song;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $band;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sport;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
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

    /**
     * Set surname
     *
     * @param string $surname
     *
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set movie
     *
     * @param string $movie
     *
     * @return User
     */
    public function setMovie($movie)
    {
        $this->movie = $movie;

        return $this;
    }

    /**
     * Get movie
     *
     * @return string
     */
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * Set book
     *
     * @param string $book
     *
     * @return User
     */
    public function setBook($book)
    {
        $this->book = $book;

        return $this;
    }

    /**
     * Get book
     *
     * @return string
     */
    public function getBook()
    {
        return $this->book;
    }

    /**
     * Set song
     *
     * @param string $song
     *
     * @return User
     */
    public function setSong($song)
    {
        $this->song = $song;

        return $this;
    }

    /**
     * Get song
     *
     * @return string
     */
    public function getSong()
    {
        return $this->song;
    }

    /**
     * Set band
     *
     * @param string $band
     *
     * @return User
     */
    public function setBand($band)
    {
        $this->band = $band;

        return $this;
    }

    /**
     * Get band
     *
     * @return string
     */
    public function getBand()
    {
        return $this->band;
    }

    /**
     * Set sport
     *
     * @param string $sport
     *
     * @return User
     */
    public function setSport($sport)
    {
        $this->sport = $sport;

        return $this;
    }

    /**
     * Get sport
     *
     * @return string
     */
    public function getSport()
    {
        return $this->sport;
    }

    /**
     * Set hobby
     *
     * @param string $hobby
     *
     * @return User
     */
    public function setHobby($hobby)
    {
        $this->hobby = $hobby;

        return $this;
    }

    /**
     * Get hobby
     *
     * @return string
     */
    public function getHobby()
    {
        return $this->hobby;
    }
}
