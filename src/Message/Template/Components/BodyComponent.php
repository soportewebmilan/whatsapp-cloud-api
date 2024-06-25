<?php

namespace Netflie\WhatsAppCloudApi\Message\Template\Components;

use Netflie\WhatsAppCloudApi\Message\Template\Parameters\Parameter;

class BodyComponent extends BaseComponent
{
    /**
     * Array of Parameters
     * 
     * @var Parameter[]
     */
    protected array $parameters;

    public function __construct()
    {
        parent::__construct('body');
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
