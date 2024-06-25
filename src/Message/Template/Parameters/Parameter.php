<?php

namespace Netflie\WhatsAppCloudApi\Message\Template\Parameters;

abstract class Parameter
{
    protected string $type;

    protected function __construct(string $type)
    {
        $this->type = $type;
    }

    abstract public function toArray(): array;
}
