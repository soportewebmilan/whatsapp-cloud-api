<?php

namespace Netflie\WhatsAppCloudApi\Message\Template\Parameters\Media;

class Document extends \Netflie\WhatsAppCloudApi\Message\Template\Parameters\Media
{

    public function __construct(string $value, string $filename = '', string $caption = '')
    {
        parent::__construct($value, 'document', $filename, $caption);
    }
}
