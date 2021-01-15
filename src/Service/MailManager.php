<?php


namespace App\Service;


use App\Entity\Mail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Symfony\Component\VarDumper\VarDumper;

class MailManager
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendMail(Mail $mail)
    {
        $email = (new Email())
            ->from(new Address($mail->getSentFrom(), $mail->getMailName()))
            ->to($mail->getSentTo())
            ->subject($mail->getSubject())
            ->text($mail->getText());

        try {
            $this->mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            VarDumper::dump($e);exit;
        }
    }
}