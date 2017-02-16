<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Challenge;
use AppBundle\Entity\Utilisateur;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Contest
 *
 * @ORM\Table(name="contest")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContestRepository")
 */
class Contest
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="duree", type="integer")
     */
    private $duree;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Utilisateur", inversedBy="contests")
     */
    private $utilisateurs;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Challenge", inversedBy="contests")
     */
    private $challenges;

    public function __construct()
    {
        $this->utilisateurs = new ArrayCollection();
        $this->challenges = new ArrayCollection();
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Contest
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set duree
     *
     * @param int $duree
     *
     * @return Contest
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return int
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Add utilisateur
     *
     * @param Utilisateur $utilisateur
     *
     * @return Contest
     */
    public function addUtilisateur($utilisateur)
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs->add($utilisateur);
            $utilisateur->addContest($this);
        }

        return $this;
    }

    /**
     * Remove utilisateur
     *
     * @param Utilisateur $utilisateur
     *
     * @return Contest
     */
    public function removeUtilisateur($utilisateur)
    {
        if ($this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs->removeElement($utilisateur);
            $utilisateur->removeContest($this);
        }

        return $this;
    }

    /**
     * Get utilisateurs
     *
     * @return ArrayCollection
     */
    public function getUtilisateurs()
    {
        return $this->utilisateurs;
    }

    /**
     * Add challenge
     *
     * @param Challenge $challenge
     *
     * @return Contest
     */
    public function addChallenge($challenge)
    {
        if (!$this->challenges->contains($challenge)) {
            $this->challenges->add($challenge);
            $challenge->addContest($this);
        }

        return $this;
    }

    /**
     * Remove challenge
     *
     * @param Challenge $challenge
     *
     * @return Contest
     */
    public function removeChallenge($challenge)
    {
        if ($this->challenges->contains($challenge)) {
            $this->challenges->removeElement($challenge);
            $challenge->removeContest($this);
        }

        return $this;
    }

    /**
     * Get challenges
     *
     * @return ArrayCollection
     */
    public function getChallenges()
    {
        return $this->challenges;
    }
}
