<?php

namespace App\Twig\Components;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;

#[AsTwigComponent(
    name: 'Table',
    template: '@App/components/Table.html.twig',
)]
final class Table
{
    public array $datas;

    public string $filter;

    #[PreMount]
    public function preMount(array $data): array
    {
        // validate data
        $resolver = new OptionsResolver();
        $resolver->setIgnoreUndefined(true);
        $resolver->setRequired('datas');
        $resolver->setAllowedTypes('datas', 'array');
        $resolver->setRequired('filter');
        $resolver->setAllowedTypes('filter', 'string');
        $resolver->setAllowedValues('filter', ['boulangerie', 'superette']);

        return $resolver->resolve($data) + $data;
    }

    /**
     * @return string
     */
    public function getFilter(): string
    {
        return $this->filter;
    }
}
