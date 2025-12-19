<?php

namespace App\Trait;

use Symfony\Contracts\Translation\TranslatorInterface;

trait ControllerTrait
{
    public function __construct(
        private readonly TranslatorInterface $translator
    ) {
    }

    /**
     * @param string $directory
     * @return string
     */
    private function getDirectory(string $directory = 'yaml'): string
    {
        return $this->getParameter('folders')[$directory];
    }
}
