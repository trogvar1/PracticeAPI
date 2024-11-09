<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/api/test')]
class TestController extends AbstractController
{

    #[Route('/get', name: 'app_test_get', methods: ['GET'])]
    #[IsGranted("ROLE_ADMIN")]
    public function get(Request $request): JsonResponse
    {
        /** @var User $user */
        $user = $this->getUser();

        dd($user);

        $queryParams = $request->query->all();

        return new JsonResponse($queryParams);
    }

    #[Route('/post', name: 'app_test_post', methods: ['POST'])]
    public function post(Request $request): JsonResponse
    {
        $requestBody = json_decode($request->getContent(), true);

        return new JsonResponse($requestBody);
    }

    #[Route('/get-item/{id}', name: 'app_test_get_item', methods: ['GET'])]
    public function getItem(string $id): JsonResponse
    {
        return new JsonResponse();
    }

}
