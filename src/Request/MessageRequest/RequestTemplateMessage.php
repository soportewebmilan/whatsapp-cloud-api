<?php

namespace Netflie\WhatsAppCloudApi\Request\MessageRequest;

use Netflie\WhatsAppCloudApi\Request\MessageRequest;

final class RequestTemplateMessage extends MessageRequest
{
    /**
     * {@inheritdoc}
     */
    public function body(): array
    {
        $body = [
            'messaging_product' => $this->message->messagingProduct(),
            'recipient_type' => $this->message->recipientType(),
            'to' => $this->message->to(),
            'type' => $this->message->type(),
            'template' => [
                'name' => $this->message->name(),
                'language' => ['code' => $this->message->language()],
                'components' => $this->message->components(),
            ],
        ];

        if ($this->message->replyTo()) {
            $body['context']['message_id'] = $this->message->replyTo();
        }

        return $body;
    }
}
