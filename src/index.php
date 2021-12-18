<?php /** @var TypedTemplates\IndexTemplate $this */ ?>

<h1>Hello, <?= $this->name ?></h1>

Hello, <?= $this->raw(fn () => $this->name) ?>