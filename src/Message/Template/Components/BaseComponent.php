<?php

namespace Netflie\WhatsAppCloudApi\Message\Template\Components;

abstract class BaseComponent
{
    /**
     * Describes the component type.
     *
     * @var string
     * @example location header, body, button, carousel
     */
    protected string $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    abstract public function toArray(): array;
}
