<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement", indexes={@ORM\Index(name="id_club", columns={"id_club"})})
 * @ORM\Entity(repositoryClass="App\Repository\EvenementRepository")
 */
class Evenement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_event", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEvent;

    /**
     * @var string
     *
     * @ORM\Column(name="evnt_name", type="string", length=255, nullable=false)
     */
    private $evntName;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="evnt_date", type="date", nullable=true, options={"default"="NULL"})
     */
    private $evntDate = 'NULL';

    /**
     * @var \Club
     *
     * @ORM\ManyToOne(targetEntity="Club")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_club", referencedColumnName="id_club")
     * })
     */
    private $idClub;

    public function getIdEvent(): ?int
    {
        return $this->idEvent;
    }

    public function getEvntName(): ?string
    {
        return $this->evntName;
    }

    public function setEvntName(string $evntName): self
    {
        $this->evntName = $evntName;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getEvntDate(): ?\DateTimeInterface
    {
        return $this->evntDate;
    }

    public function setEvntDate(?\DateTimeInterface $evntDate): self
    {
        $this->evntDate = $evntDate;

        return $this;
    }

    public function getIdClub(): ?Club
    {
        return $this->idClub;
    }

    public function setIdClub(?Club $idClub): self
    {
        $this->idClub = $idClub;

        return $this;
    }


}
