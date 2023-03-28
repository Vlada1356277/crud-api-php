<?php

namespace App\Controller;

use App\Entity\Toy;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PatchController extends AbstractController
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function __invoke(Toy $toy, Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (isset($data['name'])) {
            $toy->setName($data['name']);
        }

        if (isset($data['description'])) {
            $toy->setDescription($data['description']);
        }

        if (isset($data['price'])) {
            $toy->setPrice($data['price']);
        }

        $entityManager->persist($toy);
        $entityManager->flush();

        return $this->json(
            ['message' => 'Успешно изменено', 'toy' => $toy,]);
    }
}