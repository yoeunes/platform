<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Challenge
 *
 * @ORM\Table(name="challenge")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ChallengeRepository")
 */
class Challenge
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, unique=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="difficulte", type="string", length=255)
     */
    private $difficulte;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="lien", type="string", length=255)
     */
    private $lien;

    /**
     * @var string
     *
     * @ORM\Column(name="solution", type="text")
     */
    private $solution;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Submission", mappedBy="challenge")
     */
    private $submissions;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Contest", mappedBy="challenges")
     */
    private $contests;

    public function __construct()
    {
        $this->submissions = new ArrayCollection();
        $this->contests = new ArrayCollection();
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Challenge
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Challenge
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set difficulte
     *
     * @param string $difficulte
     *
     * @return Challenge
     */
    public function setDifficulte($difficulte)
    {
        $this->difficulte = $difficulte;

        return $this;
    }

    /**
     * Get difficulte
     *
     * @return string
     */
    public function getDifficulte()
    {
        return $this->difficulte;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Challenge
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set lien
     *
     * @param string $lien
     *
     * @return Challenge
     */
    public function setLien($lien)
    {
        $this->lien = $lien;

        return $this;
    }

    /**
     * Get lien
     *
     * @return string
     */
    public function getLien()
    {
        return $this->lien;
    }

    /**
     * Set solution
     *
     * @param string $solution
     *
     * @return Challenge
     */
    public function setSolution($solution)
    {
        $this->solution = $solution;

        return $this;
    }

    /**
     * Get solution
     *
     * @return string
     */
    public function getSolution()
    {
        return $this->solution;
    }

    /**
     * Add submission
     *
     * @param Submission $submission
     *
     * @return Challenge
     */
    public function addSubmission($submission)
    {
        if (!$this->submissions->contains($submission)) {
            $this->submissions->add($submission);
            $submission->setChallenge($this);
        }

        return $this;
    }

    /**
     * Remove submission
     *
     * @param Submission $submission
     *
     * @return Challenge
     */
    public function removeSubmission($submission)
    {
        if ($this->submissions->contains($submission)) {
            $this->submissions->removeElement($submission);
            $submission->setChallenge(null);
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
     * Add contest
     *
     * @param Contest $contest
     *
     * @return Challenge
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
     * @return Challenge
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
