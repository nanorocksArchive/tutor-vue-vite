<?php

namespace App\Entity;

use App\Repository\LectureMaterialRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LectureMaterialRepository::class)
 * @ORM\Table(name="`lectures_materials`")
 */
class LectureMaterial
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
     * @ORM\Column(type="string", length=255)
     */
    private $file_path;

    /**
     * @ORM\ManyToOne(targetEntity=Lecture::class, inversedBy="lectureMaterials")
     */
    private $lecture;

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

    public function getFilePath(): ?string
    {
        return $this->file_path;
    }

    public function setFilePath(string $file_path): self
    {
        $this->file_path = $file_path;

        return $this;
    }

    public function getLectureId(): ?Lecture
    {
        return $this->lecture;
    }

    public function setLectureId(?Lecture $lecture): self
    {
        $this->lecture = $lecture;

        return $this;
    }
}
