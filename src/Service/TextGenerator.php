<?php
namespace App\Service;

use Symfony\Contracts\Translation\TranslatorInterface;

class TextGenerator
{
    /**
     * @var TranslatorInterface
     */
    private $translator;



    public function __construct(
        TranslatorInterface $translator

    )
    {
        $this->translator = $translator;


    }
}