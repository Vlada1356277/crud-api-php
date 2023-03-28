<?php

namespace App\Controller;

use App\Entity\Toy;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
class PutController extends AbstractController
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    public function __invoke(Request $request, EntityManagerInterface $entityManager, Toy $toy): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $toy->setName($data['name']);
        $toy->setDescription($data['description']);
        $toy->setPrice($data['price']);

        $entityManager->persist($toy);
        $entityManager->flush();

        return $this->json($toy);
    }
}