<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ApiController extends AbstractFOSRestController
{
    private $em;

    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }
    /**
     * @Route("/api", name="api")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ApiController.php',
        ]);
    }
    /**
     * @Route("/api/user/new", methods="POST")
     * 
     */
    public function test(Request $request, UserPasswordEncoderInterface $encoder, SerializerInterface $s)
    {

        $response = $request->getContent();
        $user = $s->deserialize($response, User::class, 'json');
        $this->em->persist($user);
        $this->em->flush();
        return JsonResponse($user);
    }


}
