<?php

namespace InfiltradosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * UserStatus
 *
 * @ORM\Table(name="userStatus")
 * @ORM\Entity(repositoryClass="InfiltradosBundle\Repository\UserRepository")
 */
class UserStatus
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="guestsInfo")
     */
    private $player;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     */
    private $suspect;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return UserStatus
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set player
     *
     * @param \InfiltradosBundle\Entity\User $player
     *
     * @return UserStatus
     */
    public function setPlayer(\InfiltradosBundle\Entity\User $player = null)
    {
        $this->player = $player;

        return $this;
    }

    /**
     * Get player
     *
     * @return \InfiltradosBundle\Entity\User
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * Set suspect
     *
     * @param \InfiltradosBundle\Entity\User $suspect
     *
     * @return UserStatus
     */
    public function setSuspect(\InfiltradosBundle\Entity\User $suspect = null)
    {
        $this->suspect = $suspect;

        return $this;
    }

    /**
     * Get suspect
     *
     * @return \InfiltradosBundle\Entity\User
     */
    public function getSuspect()
    {
        return $this->suspect;
    }
}
