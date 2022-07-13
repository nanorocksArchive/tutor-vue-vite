<?php

namespace App\Entity;

use App\Repository\LectureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LectureRepository::class)
 * @ORM\Table(name="`lectures`")
 */
class Lecture
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=LectureMaterial::class, mappedBy="lecture_id")
     */
    private $lectureMaterials;

    /**
     * @ORM\OneToMany(targetEntity=LectureUpload::class, mappedBy="lecture", orphanRemoval=true)
     */
    private $lectureUploads;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_active;

    /**
     * @ORM\ManyToOne(targetEntity=Group::class, inversedBy="lectures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $group;

    public function __construct()
    {
        $this->lectureMaterials = new ArrayCollection();
        $this->lectureUploads = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
     * @return Collection<int, LectureMaterial>
     */
    public function getLectureMaterials(): Collection
    {
        return $this->lectureMaterials;
    }

    public function addLectureMaterial(LectureMaterial $lectureMaterial): self
    {
        if (!$this->lectureMaterials->contains($lectureMaterial)) {
            $this->lectureMaterials[] = $lectureMaterial;
            $lectureMaterial->setLectureId($this);
        }

        return $this;
    }

    public function removeLectureMaterial(LectureMaterial $lectureMaterial): self
    {
        if ($this->lectureMaterials->removeElement($lectureMaterial)) {
            // set the owning side to null (unless already changed)
            if ($lectureMaterial->getLectureId() === $this) {
                $lectureMaterial->setLectureId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, LectureUpload>
     */
    public function getLecture(): Collection
    {
        return $this->lectureUploads;
    }

    public function addLecture(LectureUpload $lectureUploads): self
    {
        if (!$this->lectureUploads->contains($lectureUploads)) {
            $this->lectureUploads[] = $lectureUploads;
            $lectureUploads->setLecture($this);
        }

        return $this;
    }

    public function removeLecture(LectureUpload $lectureUploads): self
    {
        if ($this->lectureUploads->removeElement($lectureUploads)) {
            // set the owning side to null (unless already changed)
            if ($lectureUploads->getLecture() === $this) {
                $lectureUploads->setLecture(null);
            }
        }

        return $this;
    }

    public function isIsActive(): ?bool
    {
        return $this->is_active;
    }

    public function setIsActive(bool $is_active): self
    {
        $this->is_active = $is_active;

        return $this;
    }

    public function getGroupId(): ?Group
    {
        return $this->group;
    }

    public function setGroupId(?Group $group): self
    {
        $this->group = $group;

        return $this;
    }
}
