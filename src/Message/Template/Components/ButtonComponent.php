<?php

namespace Netflie\WhatsAppCloudApi\Message\Template\Components;

use Netflie\WhatsAppCloudApi\Message\Template\Parameters\Parameter;

class ButtonComponent extends BaseComponent
{
    /**
     * Array of Parameter objects with the content of the message.
     * 
     * @var Parameter[]
     */
    protected array $parameters;

    /**
     * Type of button to create.
     * @var string
     */
    protected string $sub_type;

    /**
     * Position index of the button.
     * @var int
     */
    protected int $index;

    /**
     * @param integer $index
     * Position index of the button.
     * You can have up to 10 buttons using index values of 0 to 9.
     * 
     * @param string $sub_type
     * Supported Options
     * - quick_reply : Refers to a previously created quick reply button that allows for the customer to return a predefined message.
     * - url : Refers to a previously created button that allows the customer to visit the URL generated by appending the text parameter to the predefined prefix URL in the template.
     */
    public function __construct(string $sub_type = 'quick_reply')
    {
        $this->sub_type = $sub_type;
        $this->parameters = [];
        parent::__construct('button');
    }

    public function setParameter(Parameter $parameter): ButtonComponent
    {
        $this->parameters[] = $parameter->toArray();
        return $this;
    }

    public function setIndex(int $index): void
    {
        $this->index = $index;
    }

    public function getIndex(): int
    {
        return $this->index;
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'sub_type' => $this->sub_type,
            'index' => $this->index,
            'parameters' => $this->parameters,
        ];
    }
}