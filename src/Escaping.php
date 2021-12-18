<?php

declare(strict_types=1);

namespace TypedTemplates;

use Attribute;
use Exception;

#[Attribute]
class Escaping
{
    const HTML = "HTML";
    const NONE = "NONE";

    private static ?Escaping $defaultEscaping;

    private string $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public static function default(): Escaping
    {
        if (!isset(self::$defaultEscaping)) {
            self::$defaultEscaping = new Escaping(Escaping::HTML);
        }
        return self::$defaultEscaping;
    }

    public function apply(string $value): string
    {
        switch ($this->type) {
            case Escaping::NONE:
                return $value;
            case Escaping::HTML:
                return htmlspecialchars($value);
            default:
                throw new Exception("Invalid escaping {$this->type}");
        }
    }
}
