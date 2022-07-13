<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StudentRepository::class)
 * @ORM\Table(name="`students`")
 */
class Student
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
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_blocked;

    /**
     * @ORM\ManyToMany(targetEntity=Group::class, inversedBy="students")
     */
    private $group_id;

    /**
     * @ORM\OneToMany(targetEntity=LectureUpload::class, mappedBy="student_id")
     */
    private $lectureUploads;

    public function __construct()
    {
        $this->group_id = new ArrayCollection();
        $this->lectureUploads = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function isIsBlocked(): ?bool
    {
        return $this->is_blocked;
    }

    public function setIsBlocked(bool $is_blocked): self
    {
        $this->is_blocked = $is_blocked;

        return $this;
    }

    /**
     * @return Collection<int, Group>
     */
    public function getGroupId(): Collection
    {
        return $this->group_id;
    }

    public function addGroupId(Group $groupId): self
    {
        if (!$this->group_id->contains($groupId)) {
            $this->group_id[] = $groupId;
        }

        return $this;
    }

    public function removeGroupId(Group $groupId): self
    {
        $this->group_id->removeElement($groupId);

        return $this;
    }

    /**
     * @return Collection<int, LectureUpload>
     */
    public function getLectureUploads(): Collection
    {
        return $this->lectureUploads;
    }

    public function addLectureUpload(LectureUpload $lectureUpload): self
    {
        if (!$this->lectureUploads->contains($lectureUpload)) {
            $this->lectureUploads[] = $lectureUpload;
            $lectureUpload->setStudentId($this);
        }

        return $this;
    }

    public function removeLectureUpload(LectureUpload $lectureUpload): self
    {
        if ($this->lectureUploads->removeElement($lectureUpload)) {
            // set the owning side to null (unless already changed)
            if ($lectureUpload->getStudentId() === $this) {
                $lectureUpload->setStudentId(null);
            }
        }

        return $this;
    }
  
}
