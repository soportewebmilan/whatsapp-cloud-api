<?php

namespace Netflie\WhatsAppCloudApi\Message\Template\Parameters;

abstract class Button extends Parameter
{

    public function __construct(string $type)
    {
        parent::__construct($type);
    }

    abstract public function toArray(): array;
}
