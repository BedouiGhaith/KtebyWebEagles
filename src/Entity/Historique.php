<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Historique
 *
 * @ORM\Table(name="historique", indexes={@ORM\Index(name="id_user", columns={"id_user"}), @ORM\Index(name="id_livre", columns={"id_livre"})})
 * @ORM\Entity(repositoryClass="App\Repository\HistoriqueRepository")
 */
class Historique
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_histo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idHisto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_histo", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $dateHisto = 'current_timestamp()';

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     * })
     */
    private $idUser;

    /**
     * @var \Livre
     *
     * @ORM\ManyToOne(targetEntity="Livre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_livre", referencedColumnName="id_livre")
     * })
     */
    private $idLivre;

    public function getIdHisto(): ?int
    {
        return $this->idHisto;
    }

    public function getDateHisto(): ?\DateTimeInterface
    {
        return $this->dateHisto;
    }

    public function setDateHisto(\DateTimeInterface $dateHisto): self
    {
        $this->dateHisto = $dateHisto;

        return $this;
    }

    public function getIdUser(): ?Utilisateur
    {
        return $this->idUser;
    }

    public function setIdUser(?Utilisateur $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getIdLivre(): ?Livre
    {
        return $this->idLivre;
    }

    public function setIdLivre(?Livre $idLivre): self
    {
        $this->idLivre = $idLivre;

        return $this;
    }


}
