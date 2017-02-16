<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="university", type="string", length=255, nullable=true)
     */
    private $university;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255, nullable=true)
     */
    private $country;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Submission", mappedBy="user")
     */
    private $submissions;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Team", mappedBy="users")
     */
    private $teams;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Contest", mappedBy="users")
     */
    private $contests;

    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->submissions = new ArrayCollection();
        $this->teams = new ArrayCollection();
        $this->contests = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }
    
    /**
     * Set university
     *
     * @param string $university
     *
     * @return User
     */
    public function setUniversity($university)
    {
        $this->university = $university;

        return $this;
    }

    /**
     * Get university
     *
     * @return string
     */
    public function getUniversity()
    {
        return $this->university;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return User
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Add submission
     *
     * @param Submission $submission
     *
     * @return User
     */
    public function addSubmission($submission)
    {
        if (!$this->submissions->contains($submission)) {
            $this->submissions->add($submission);
            $submission->setUser($this);
        }

        return $this;
    }

    /**
     * Remove submission
     *
     * @param Submission $submission
     *
     * @return User
     */
    public function removeSubmission($submission)
    {
        if ($this->submissions->contains($submission)) {
            $this->submissions->removeElement($submission);
            $submission->setUser(null);
        }

        return $this;
    }

    /**
     * Get submissions
     *
     * @return ArrayCollection
     */
    public function getSubmissions()
    {
        return $this->submissions;
    }

    /**
     * Add team
     *
     * @param Team $team
     *
     * @return User
     */
    public function addTeam($team)
    {
        if (!$this->teams->contains($team)) {
            $this->teams->add($team);
        }

        return $this;
    }

    /**
     * Remove team
     *
     * @param Team $team
     *
     * @return User
     */
    public function removeTeam($team)
    {
        if ($this->teams->contains($team)) {
            $this->teams->removeElement($team);
        }

        return $this;
    }

    /**
     * Get teams
     *
     * @return ArrayCollection
     */
    public function getTeams()
    {
        return $this->teams;
    }

    /**
     * Add contest
     *
     * @param Contest $contest
     *
     * @return User
     */
    public function addContest($contest)
    {
        if (!$this->contests->contains($contest)) {
            $this->contests->add($contest);
        }

        return $this;
    }

    /**
     * Remove contest
     *
     * @param Contest $contest
     *
     * @return User
     */
    public function removeContest($contest)
    {
        if ($this->contests->contains($contest)) {
            $this->contests->removeElement($contest);
        }

        return $this;
    }

    /**
     * Get contests
     *
     * @return ArrayCollection
     */
    public function getContests()
    {
        return $this->contests;
    }
}
