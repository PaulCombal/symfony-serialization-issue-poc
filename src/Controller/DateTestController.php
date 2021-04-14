<?php

namespace App\Controller;

use App\Entity\DateTest;
use App\Repository\DateTestRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DateTestController extends AbstractController
{
    #[Route('/date/test', name: 'date_test')]
    public function index(): Response
    {
        /**
         * This will print the date with a lot of timezones info
         */
        $date_test = new DateTest();
        $date_test->setDateTest(new \DateTime());
        return $this->json($date_test);
    }

    #[Route('/date/test2', name: 'date_test2')]
    public function index2(DateTestRepository $repo): Response
    {
        /**
         * This will print the same than index()
         */
        $date_test = $repo->findAll();
        return $this->json($date_test);
    }

    #[Route('/date/test3', name: 'date_test3')]
    public function index3(DateTestRepository $repo): Response
    {
        /**
         * This will print the same than index()
         */
        $qb = $repo->createQueryBuilder('d');
        $paginator = new Paginator($qb, false);
        return $this->json($paginator);
    }

    #[Route('/date/test4', name: 'date_test4')]
    public function index4(DateTestRepository $repo): Response
    {
        /**
         * This will print the same than index()
         */
        $qb = $repo->createQueryBuilder('d');
        $paginator = new Paginator($qb, false);
        $entity = ['count' => count($paginator), 'data' => $paginator];
        return $this->json($entity);
    }

    #[Route('/date/test5', name: 'date_test5')]
    public function index5(DateTestRepository $repo): Response
    {
        /**
         * This will not print the intended result
         */
        $qb = $repo->createQueryBuilder('d');
        $paginator = new Paginator($qb, false);
        $entity = ['count' => count($paginator), 'data' => $paginator];
        return $this->json($entity, context: ['groups' => ['base']]);
    }
}
