<?php

namespace Netflie\WhatsAppCloudApi\Message\Template\Parameters;

class Media extends \Netflie\WhatsAppCloudApi\Message\Template\Parameters\Parameter
{
    /**
     * Value of Media Link or ID
     *
     * @var string
     */
    protected string $value;
    /**
     * Media asset caption.
     *
     * @var string
     */
    protected string $caption;

    /**
     * Describes the filename for the specific document.
     *
     * @var string
     */
    protected string $filename;

    /**
     *
     * @param string $value
     * Value of Media Link or ID
     * @param string $type
     * Media Type e.g. Image, Video, Document
     * @param string $filename
     * Describes the filename for the specific document. Use only with document media.
     * @param string $caption
     * Media asset caption. Do not use with audio or sticker media.
     */
    public function __construct(string $value, string $type, string $filename = '', string $caption = '')
    {
        $this->value = $value;
        $this->filename = $filename;
        $this->caption = $caption;

        parent::__construct($type);
    }

    public function handleValue(): array
    {
        $value = $this->value;
        $result = [];
        //Validate if value is Url or Id
        if (filter_var($value, FILTER_VALIDATE_URL)) {
            $result['link'] = $value;
        } else {
            $result['id'] = $value;
        }

        return $result;
    }

    public function toArray(): array
    {
        $result = [
            'type' => $this->type,
            $this->type => $this->handleValue()
        ];


        if (!isset($this->filename) || $this->filename != null) {
            $result[$this->type]['filename'] = $this->filename;
        }

        if (!isset($this->caption) || $this->caption != null) {
            $result[$this->type]['caption'] = $this->caption;
        }

        return $result;
    }
}
