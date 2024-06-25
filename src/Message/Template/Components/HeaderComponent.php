<?php

namespace Netflie\WhatsAppCloudApi\Message\Template\Components;

use Netflie\WhatsAppCloudApi\Message\Template\Parameters\Parameter;

class HeaderComponent extends BaseComponent
{
    /**
     * Array of Parameters
     * 
     * @var Parameter[]
     */
    protected array $parameters;

    public function __construct()
    {
        parent::__construct('header');
    }

    public function addParameter(Parameter $parameter): void
    {
        $this->parameters[] = $parameter->toArray();
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'parameters' => $this->parameters
        ];
    }
}
