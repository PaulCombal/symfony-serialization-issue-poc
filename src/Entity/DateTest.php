<?php

namespace App\Entity;

use App\Repository\DateTestRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=DateTestRepository::class)
 */
class DateTest
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     * @Groups("base")
     */
    private $dateTest;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateTest(): ?\DateTimeInterface
    {
        return $this->dateTest;
    }

    public function setDateTest(\DateTimeInterface $dateTest): self
    {
        $this->dateTest = $dateTest;

        return $this;
    }
}
