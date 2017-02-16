<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 *
 * @ORM\Table(name="team")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TeamRepository")
 */
class Team
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
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Utilisateur", inversedBy="teams")
     */
    private $utilisateurs;

    public function __construct()
    {
        $this->utilisateurs = new ArrayCollection();
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
     * @return Team
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
     * Add utilisateur
     *
     * @param Utilisateur $utilisateur
     *
     * @return Team
     */
    public function addUtilisateur(Utilisateur $utilisateur)
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs->add($utilisateur);
            $utilisateur->addTeam($this);
        }

        return $this;
    }

    /**
     * Remove utilisateur
     *
     * @param Utilisateur $utilisateur
     *
     * @return Team
     */
    public function removeUtilisateur($utilisateur)
    {
        if ($this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs->removeElement($utilisateur);
            $utilisateur->removeTeam($this);
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
}
