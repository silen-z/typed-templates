<?php

declare(strict_types=1);

namespace TypedTemplates;

class IndexTemplate extends Template
{
    public LayoutTemplate $parent;

    public string $name = "";

    #[Escaping(Escaping::NONE)]
    public string $unescaped = "";

    function __construct(TemplateFactory $templateFactory)
    {
        $this->file = __DIR__ . '/index.php';

        $this->parent = $templateFactory->create(LayoutTemplate::class);
        $this->parent->title = "Homepage";
    }
}
