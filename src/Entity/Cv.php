<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CvRepository")
 */
class Cv
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Experience", mappedBy="cv")
     * @ORM\OrderBy({"display_order" = "ASC"})
     */
    private $experiences;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Formation", mappedBy="cv")
     * @ORM\OrderBy({"display_order" = "ASC"})
     */
    private $formations;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Skill", mappedBy="cv")
     * @ORM\OrderBy({"display_order" = "ASC"})
     */
    private $skills;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Profil", mappedBy="cv", cascade={"persist", "remove"})
     */
    private $profil;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reference", mappedBy="cv")
     */
    private $referencs;

    public function __construct()
    {
        $this->experiences = new ArrayCollection();
        $this->formations = new ArrayCollection();
        $this->skills = new ArrayCollection();
        $this->referencs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    /**
     * @return Collection|Experience[]
     */
    public function getExperiences(): Collection
    {
        return $this->experiences;
    }

    public function addExperience(Experience $experience): self
    {
        if (!$this->experiences->contains($experience)) {
            $this->experiences[] = $experience;
            $experience->setCv($this);
        }

        return $this;
    }

    public function removeExperience(Experience $experience): self
    {
        if ($this->experiences->contains($experience)) {
            $this->experiences->removeElement($experience);
            // set the owning side to null (unless already changed)
            if ($experience->getCv() === $this) {
                $experience->setCv(null);
            }
        }

        return $this;
    }
    public function __toString() {
        return $this->getTitle();
    }

    /**
     * @return Collection|Formation[]
     */
    public function getFormations(): Collection
    {
        return $this->formations;
    }

    public function addFormation(Formation $formation): self
    {
        if (!$this->formations->contains($formation)) {
            $this->formations[] = $formation;
            $formation->setCv($this);
        }

        return $this;
    }

    public function removeFormation(Formation $formation): self
    {
        if ($this->formations->contains($formation)) {
            $this->formations->removeElement($formation);
            // set the owning side to null (unless already changed)
            if ($formation->getCv() === $this) {
                $formation->setCv(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Skill[]
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    public function addSkill(Skill $skill): self
    {
        if (!$this->skills->contains($skill)) {
            $this->skills[] = $skill;
            $skill->setCv($this);
        }

        return $this;
    }

    public function removeSkill(Skill $skill): self
    {
        if ($this->skills->contains($skill)) {
            $this->skills->removeElement($skill);
            // set the owning side to null (unless already changed)
            if ($skill->getCv() === $this) {
                $skill->setCv(null);
            }
        }

        return $this;
    }

    public function getProfil(): ?Profil
    {
        return $this->profil;
    }

    public function setProfil(Profil $profil): self
    {
        $this->profil = $profil;

        // set the owning side of the relation if necessary
        if ($this !== $profil->getCv()) {
            $profil->setCv($this);
        }

        return $this;
    }

    /**
     * @return Collection|Reference[]
     */
    public function getReferencs(): Collection
    {
        return $this->referencs;
    }

    public function addReferenc(Reference $referenc): self
    {
        if (!$this->referencs->contains($referenc)) {
            $this->referencs[] = $referenc;
            $referenc->setCv($this);
        }

        return $this;
    }

    public function removeReferenc(Reference $referenc): self
    {
        if ($this->referencs->contains($referenc)) {
            $this->referencs->removeElement($referenc);
            // set the owning side to null (unless already changed)
            if ($referenc->getCv() === $this) {
                $referenc->setCv(null);
            }
        }

        return $this;
    }
}
