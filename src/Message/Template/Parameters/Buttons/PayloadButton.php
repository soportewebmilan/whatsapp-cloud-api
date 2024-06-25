<?php

namespace Netflie\WhatsAppCloudApi\Message\Template\Parameters\Buttons;

use Netflie\WhatsAppCloudApi\Message\Template\Parameters\Button;

class PayloadButton extends Button
{

    /**
     * Developer-defined payload to be returned when the button is clicked along with the button's on-screen text.
     *
     * @var string
     */
    protected string $payload;

    public function __construct(string $payload)
    {
        $this->payload = $payload;
        parent::__construct('payload');
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'payload' => $this->payload
        ];
    }
}
