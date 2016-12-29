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
     * @ORM\Column(type="string", length=255)
     */
    private $token;

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
    private $occupation;
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

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $zodiac;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $isSpy;
    /**
     * @ORM\OneToMany(targetEntity="UserStatus", mappedBy="player", cascade={"persist", "remove"})
     */
    private $guestsInfo;

    public function __construct()
    {
        parent::__construct();

        $this->isSpy = false;
    }

    public function getFullName()
    {
        return $this->name . ' ' . $this->surname;
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

    /**
     * Set occupation
     *
     * @param string $occupation
     *
     * @return User
     */
    public function setOccupation($occupation)
    {
        $this->occupation = $occupation;

        return $this;
    }

    /**
     * Get occupation
     *
     * @return string
     */
    public function getOccupation()
    {
        return $this->occupation;
    }

    /**
     * Add guestsInfo
     *
     * @param \InfiltradosBundle\Entity\UserStatus $guestsInfo
     *
     * @return User
     */
    public function addGuestsInfo(\InfiltradosBundle\Entity\UserStatus $guestsInfo)
    {
        $this->guestsInfo[] = $guestsInfo;

        return $this;
    }

    /**
     * Remove guestsInfo
     *
     * @param \InfiltradosBundle\Entity\UserStatus $guestsInfo
     */
    public function removeGuestsInfo(\InfiltradosBundle\Entity\UserStatus $guestsInfo)
    {
        $this->guestsInfo->removeElement($guestsInfo);
    }

    /**
     * Get guestsInfo
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGuestsInfo()
    {
        return $this->guestsInfo;
    }

    /**
     * Set token
     *
     * @param string $token
     *
     * @return User
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Set zodiac
     *
     * @param string $zodiac
     *
     * @return User
     */
    public function setZodiac($zodiac)
    {
        $this->zodiac = $zodiac;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Get zodiac
     *
     * @return string
     */
    public function getZodiac()
    {
        return $this->zodiac;
    }

    /**
     * Set isSpy
     *
     * @param boolean $isSpy
     *
     * @return User
     */
    public function setIsSpy($isSpy)
    {
        $this->isSpy = $isSpy;

        return $this;
    }

    /**
     * Get isSpy
     *
     * @return boolean
     */
    public function getIsSpy()
    {
        return $this->isSpy;
    }
}
