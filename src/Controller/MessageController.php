<?php

namespace App\Controller;

use App\Entity\Message;
use App\Entity\User;
use App\Repository\MessageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    public function __construct(private MessageRepository $repo)
    {
    }

    #[Route()]
    public function index(): Response
    {
        return $this->render('message/index.html.twig', [
            'messages' => $this->repo->findAll(),
        ]);
    }

    #[Route('/add-message')]
    public function addMessage(Request $request): Response
    {
        $formData = $request->request->all();


        if (!empty($formData)) {
            $message = new Message($formData['content'], $this->getUser());
            $this->repo->persist($message);
            return $this->redirect('/');
        }
        return $this->render('message/add-message.html.twig', [

        ]);
    }
    #[Route("/delete-message/{id}")]
    /**
     * Summary of removeMessage
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function removeMessage(int $id): Response
    {
        $message = $this->repo->findbyId($id);
        /**
         * @var User
         */

        $user = $this->getUser();
        if ($user->getId() == $message?->getUser()->getId()) {
            $this->repo->delete($id);
        }

        return $this->redirect("/");
    }
}