<?php

namespace Netflie\WhatsAppCloudApi\Message\Template\Parameters;

class DateTime extends Parameter
{
    protected string $fallback_value;

    public function __construct(string $fallback_value)
    {
        $this->fallback_value = $fallback_value;

        parent::__construct('date_time');
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'date_time' => [
                'fallback_value' => $this->fallback_value
            ]
        ];
    }
}
