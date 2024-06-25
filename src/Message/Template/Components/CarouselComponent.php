<?php

namespace Netflie\WhatsAppCloudApi\Message\Template\Components;

use InvalidArgumentException;
use Netflie\WhatsAppCloudApi\Message\Template\Components\Cards\Card;

class CarouselComponent extends BaseComponent
{
    /**
     * Array of Component objects with the content of the carousel.
     * 
     * @var Card[]
     */
    protected array $cards;

    public function __construct()
    {
        $this->cards = [];
        parent::__construct('carousel');
    }

    public function addCard(Card $card): void
    {
        if (count($this->cards) == 10) {
            throw new InvalidArgumentException('The maximum number of card must be 10');
        }
        //Ensures that index is set in order of addition
        $card->setIndex(count($this->cards));
        $this->cards[] = $card->toArray();
    }

    public function toArray(): array
    {
        if (count($this->cards) > 10) {
            throw new InvalidArgumentException('The maximum number of card must be 10');
        }
        return [
            'type' => $this->type,
            'cards' => $this->cards
        ];
    }
}
