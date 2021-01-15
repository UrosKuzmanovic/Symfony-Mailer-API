<?php

namespace App\Controller;

use App\Entity\Mail;
use App\Service\MailManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class MailerController extends AbstractController
{
    private $mailManager;

    public function __construct(MailManager $mailManager)
    {
        $this->mailManager = $mailManager;
    }

    /**
     * @Route("/send", name="send", methods={"POST"})
     * @param Mail $mail
     * @ParamConverter(name="mail_converter")
     * @return JsonResponse
     */
    public function sendMail(Mail $mail): JsonResponse
    {
        $this->mailManager->sendMail($mail);
        return new JsonResponse(1);
    }
}
