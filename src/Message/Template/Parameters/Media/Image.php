<?php

namespace Netflie\WhatsAppCloudApi\Message\Template\Parameters\Media;

class Image extends \Netflie\WhatsAppCloudApi\Message\Template\Parameters\Media
{

    public function __construct(string $value, string $caption = '')
    {
        parent::__construct($value, 'image', '', $caption);
    }
}
