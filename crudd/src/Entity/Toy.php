<?php

namespace App\Entity;


use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Controller\DeleteController;
use App\Controller\GetCollectionController;
use App\Controller\GetItemController;
use App\Controller\PatchController;
use App\Controller\PostController;
use App\Controller\PutController;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ApiResource(operations:
    [
        new GetCollection(
            controller: GetCollectionController::class
        ),
        new Get(
            controller: GetItemController::class
        ),
        new Post(
            controller: PostController::class
        ),
        new Put(
            controller: PutController::class
        ),
        new Patch(
            controller: PatchController::class
        ),
        new Delete(
            controller: DeleteController::class
        )
    ])]

class Toy
{

    #[ORM\Id]
    #[ORM\GeneratedValue] //значение будет автоматически генерироваться при создании новой записи в базе данных

    #[ORM\Column(type: "integer", nullable: false)]
    private ?int $Id = null;

    #[ORM\Column(type: "string", length: 255, unique: true)]
    private string $name;

    #[ORM\Column(type: "string", length: 255)]
    private string $description;

    #[ORM\Column(type: "integer", nullable: false)]
    private int $price;



    public function getId(): ?int
    {
        return $this->Id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

}