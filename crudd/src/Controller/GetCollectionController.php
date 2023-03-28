<?php

namespace App\Controller;

use App\Entity\Toy;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;


class GetCollectionController extends AbstractController
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    public function __invoke(EntityManagerInterface $entityManager): JsonResponse
    {
        $toys = $entityManager->getRepository(Toy::class)->findAll();

        return $this->json($toys);
    }
}