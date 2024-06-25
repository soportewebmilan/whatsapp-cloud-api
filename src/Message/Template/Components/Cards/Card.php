<?php

namespace Netflie\WhatsAppCloudApi\Message\Template\Components\Cards;

use Netflie\WhatsAppCloudApi\Message\Template\Component;
use Netflie\WhatsAppCloudApi\Message\Template\Components\BaseComponent;
use Netflie\WhatsAppCloudApi\Message\Template\Components\Buttons;

class Card
{

    /**
     * Zero-indexed order in which the card appears in the sequence. 0 indicates the first card, 1 indicates the second card, etc.
     *
     * @var integer
     */
    protected int $index;

    /**
     * Array of Component objects
     *
     * @var Component[]
     */
    protected array $components;

    public function __construct(Component $component = null)
    {
        $this->components = $component ? $component->toArray() : [];
    }

    public function addComponent(Component $component): void
    {
        $this->components[] = $component->toArray();
    }


    public function getIndex(): int
    {
        return $this->index;
    }

    public function setIndex(int $index): void
    {
        $this->index = $index;
    }

    public function toArray(): array
    {
        return [
            'card_index' => $this->index,
            'components' => $this->components
        ];
    }

    function handleComponents(array $components): array
    {
        $result = [];
        foreach ($components as $component) {
            if ($component instanceof Buttons) {
                foreach ($component as $button) {
                    $result[] = $button;
                }
            } else {
                $result[] = $component;
            }
        }
        return $result;
    }
}
