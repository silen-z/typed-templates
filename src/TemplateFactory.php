<?php

declare(strict_types=1);

namespace TypedTemplates;

use DI\FactoryInterface;
use Exception;

final class TemplateFactory
{
    function __construct(private FactoryInterface $factory)
    {
    }

    /**
     * @template T
     * @psalm-param class-string<T> $templateClass 
     * @param class-string<T> $templateClass
     * @return T
     */
    function create(string $templateClass)
    {
        /* @phpstan-ignore-next-line */
        return $this->factory->make($templateClass);
    }
}
