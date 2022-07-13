<?php

namespace App\Entity;

use App\Repository\LectureUploadRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LectureUploadRepository::class)
 * @ORM\Table(name="`lectures_uploads`")
 */
class LectureUpload
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $deadline;

    /**
     * @ORM\Column(type="boolean")
     */
    private $visible;

    /**
     * @ORM\OneToMany(targetEntity=Lecture::class, mappedBy="lectureUpload")
     */
    private $lecture_id;

    /**
     * @ORM\ManyToOne(targetEntity=Lecture::class, inversedBy="lecture")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lecture;

    /**
     * @ORM\ManyToOne(targetEntity=Student::class, inversedBy="lectureUploads")
     */
    private $student;

    public function __construct()
    {
        $this->student = new ArrayCollection();
        $this->lecture_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDeadline(): ?\DateTimeInterface
    {
        return $this->deadline;
    }

    public function setDeadline(?\DateTimeInterface $deadline): self
    {
        $this->deadline = $deadline;

        return $this;
    }

    public function isVisible(): ?bool
    {
        return $this->visible;
    }

    public function setVisible(bool $visible): self
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * @return Collection<int, Lecture>
     */
    public function getLectureId(): Collection
    {
        return $this->lecture_id;
    }

    public function addLectureId(Lecture $lectureId): self
    {
        if (!$this->lecture_id->contains($lectureId)) {
            $this->lecture_id[] = $lectureId;
            $lectureId->setLectureUpload($this);
        }

        return $this;
    }

    public function removeLectureId(Lecture $lectureId): self
    {
        if ($this->lecture_id->removeElement($lectureId)) {
            // set the owning side to null (unless already changed)
            if ($lectureId->getLectureUpload() === $this) {
                $lectureId->setLectureUpload(null);
            }
        }

        return $this;
    }

    public function getLecture(): ?Lecture
    {
        return $this->lecture;
    }

    public function setLecture(?Lecture $lecture): self
    {
        $this->lecture = $lecture;

        return $this;
    }

    public function getStudent(): ?Student
    {
        return $this->student;
    }

    public function setStudent(?Student $student): self
    {
        $this->student = $student;

        return $this;
    }
}
