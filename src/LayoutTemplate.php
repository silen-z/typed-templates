<?php

declare(strict_types=1);

namespace TypedTemplates;

class LayoutTemplate extends Template
{
    public string $title = "";

    function __construct()
    {
        $this->file = __DIR__ . '/layout.php';
    }
}