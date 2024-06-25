<?php

namespace Netflie\WhatsAppCloudApi\Message\Template\Parameters\Buttons;

use Netflie\WhatsAppCloudApi\Message\Template\Parameters\Button;

class UrlButton extends Button
{

    /**
     * Developer-provided suffix that is added to the predefined prefix URL in the template.
     *
     * @var string
     * @example location https://example.com/test/{1} where {1} is the TEXT param of the Button
     */
    protected string $text;

    public function __construct(string $text)
    {
        $this->text = $text;
        parent::__construct('text');
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'text' => $this->text
        ];
    }
}
