<?php

declare(strict_types=1);

namespace TypedTemplates;

use Closure;

/**
 * @method string child()
 */
abstract class Template
{
    public string $file;

    public function render(RuntimeTemplate $child = null): string
    {
        $runtimeTemplate = new RuntimeTemplate($this, $child);

        if (isset($this->parent)) {
            return $this->parent->render($runtimeTemplate);
        } else {
            return $runtimeTemplate->render();
        }
    }

    /**
     * @template T
     * @param (Closure(): T) $callback
     * @return T
     */
    public function raw(Closure $callback)
    {
        return $callback->call($this);
    }

    function __call($name, $args){}
}
