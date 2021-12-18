<?php

declare(strict_types=1);

namespace TypedTemplates;

use Exception;
use RuntimeException;

class RuntimeTemplate
{
    // private RuntimeTemplate|null $child;

    function __construct(private Template $inner, private ?RuntimeTemplate $child)
    {
        // $this->child = $child;
    }

    public function render(): string
    {
        if (!is_file($this->inner->file)) {
            throw new RuntimeException("Missing template file {$this->inner->file}");
        }

        ob_start();
        include $this->inner->file;
        $output = ob_get_clean();

        assert($output !== false);
        return $output;
    }

    public function child(): string
    {
        if ($this->child === null) {
            return "";
        }

        return $this->child->render();
    }

    public function __get(string $name): mixed
    {
        return Escaping::default()->apply($this->inner->{$name});
    }

    /**
     * @param mixed[] $arguments
     */
    public function __call(string $name, array $arguments): mixed
    {
        $callback = [$this->inner, $name];
        if (!is_callable($callback)) {
            throw new Exception("Trying to call {$name}");
        }
        return call_user_func_array($callback, $arguments);
    }
}
