<?php

require_once '../vendor/autoload.php';

$builder = new DI\ContainerBuilder();
$container = $builder->build();

class Handler
{
    private TypedTemplates\IndexTemplate $template;

    function __construct(DI\FactoryInterface $factory)
    {
        $this->template = $factory->make(TypedTemplates\IndexTemplate::class);
    }

    function handle()
    {
        $this->template->name = "<b>Pavel</b>";
        echo $this->template->render();
    }
}

$handler = $container->get(Handler::class);
$handler->handle();
