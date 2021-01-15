<?php

namespace App\Entity;

use App\Repository\MailRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MailRepository::class)
 */
class Mail
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sentFrom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sentTo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $subject;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $text;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mailName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSentFrom(): ?string
    {
        return $this->sentFrom;
    }

    public function setSentFrom(string $sentFrom): self
    {
        $this->sentFrom = $sentFrom;

        return $this;
    }

    public function getSentTo(): ?string
    {
        return $this->sentTo;
    }

    public function setSentTo(string $sentTo): self
    {
        $this->sentTo = $sentTo;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getMailName(): ?string
    {
        return $this->mailName;
    }

    public function setMailName(string $mailName): self
    {
        $this->mailName = $mailName;

        return $this;
    }
}
