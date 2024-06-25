<?php

namespace Netflie\WhatsAppCloudApi\Message\Template\Components;

class Buttons
{

    /**
     * Array of ButtonComponent
     *
     * @var ButtonComponent[]
     */
    protected array $buttons;

    public function __construct(array $buttons  = [])
    {
        $this->buttons = $buttons;
    }

    public function addButton(ButtonComponent $buttonComponent)
    {
        /**The index is added as the buttons are added*/
        $buttonComponent->setIndex(count($this->buttons));

        $this->buttons[] = $buttonComponent;
    }

    public function toArray(): array
    {
        return $this->buttons;
    }
}
