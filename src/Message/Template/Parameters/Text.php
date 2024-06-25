<?php

namespace Netflie\WhatsAppCloudApi\Message\Template\Parameters;

class Text extends Parameter
{
    protected string $text;

    protected bool $preview_url;

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
