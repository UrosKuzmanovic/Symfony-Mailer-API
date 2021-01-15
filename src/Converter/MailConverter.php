<?php


namespace App\Converter;


use App\Entity\Mail;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\VarDumper\VarDumper;

class MailConverter implements ParamConverterInterface
{
    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function apply(Request $request, ParamConverter $configuration): bool
    {
        $mail = $this->serializer->deserialize($request->getContent(), Mail::class, 'json');
        $request->attributes->set($configuration->getName(), $mail);
        return true;
    }

    public function supports(ParamConverter $configuration): bool
    {
        return Mail::class === $configuration->getClass();
    }
}