<?php

namespace App\Controller;

use App\Entity\Toy;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class PostController extends AbstractController
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function __invoke(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $toy = new Toy();
        $toy->setName($data['name']);
        $toy->setDescription($data['description']);
        $toy->setPrice($data['price']);

        $entityManager->persist($toy);
        $entityManager->flush();

        return $this->json(
            ['message' => 'Успешно создано', 'toy' => $toy]);
    }
}
