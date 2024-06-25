<?php

namespace Netflie\WhatsAppCloudApi\Message\Template;

use InvalidArgumentException;
use Netflie\WhatsAppCloudApi\Message\Template\Components\BaseComponent;
use Netflie\WhatsAppCloudApi\Message\Template\Components\BodyComponent;
use Netflie\WhatsAppCloudApi\Message\Template\Components\CarouselComponent;
use Netflie\WhatsAppCloudApi\Message\Template\Components\ButtonComponent;
use Netflie\WhatsAppCloudApi\Message\Template\Components\Buttons;
use Netflie\WhatsAppCloudApi\Message\Template\Components\HeaderComponent;

final class Component
{
    /**
     * Parameters of a header template.
     * @var HeaderComponent
     */
    private HeaderComponent $header;

    /**
     * Parameters of a body template.
     * @var BodyComponent
     */
    private BodyComponent $body;

    /**
     * Carousel to attach to a template
     * @var CarouselComponent
     */
    private CarouselComponent $carousel;

    /**
     * Buttons to attach to a template.
     * @var ButtonComponent[]
     */
    private array $buttons;

    /**
     * Inicialize the component 
     * The arguments are instance of [BaseComponent]. 
     * All button should be inside an array.
     * Supported Component arg Types
     * - BodyComponent
     * - HeaderComponent
     * - CarouselComponent
     * - Array of ButtonComponent
     *
     * @param BaseComponent
     */
    public function __construct(...$args)
    {
        foreach ($args as $arg) {
            if ($arg instanceof HeaderComponent) {
                $this->header = $arg;
            } else if ($arg instanceof BodyComponent) {
                $this->body = $arg;
            } else if ($arg instanceof CarouselComponent) {
                $this->carousel = $arg;
            } else if ($arg instanceof Buttons) {
                foreach ($arg->toArray() as $component) {
                    if (!$component) {
                        throw new InvalidArgumentException('El Componente no está definido');
                    }
                    if (!($component instanceof ButtonComponent)) {
                        throw new InvalidArgumentException('Only the buttons should be passed as an array');
                    }
                    $this->buttons[] = $component;
                }
            } else {
                throw new InvalidArgumentException('Argument is not a valid Instance');
            }
        }
    }

    public function header(): array
    {
        return $this->header
            ? $this->header->toArray()
            : [];
    }

    public function body(): array
    {
        return $this->body
            ? $this->body->toArray()
            : [];
    }

    public function buttons(): array
    {
        $handleComponent = function (BaseComponent $component) {
            return $component->toArray();
        };
        return count($this->buttons) > 0
            ? array_map($handleComponent, $this->buttons)
            : [];
    }

    public function carousel(): array
    {
        return $this->carousel
            ? $this->carousel->toArray()
            : [];
    }

    public function toArray(): array
    {

        $result = [];
        foreach (get_object_vars($this) as $value) {
            if (!isset($value) || $value != null) {
                if (is_array($value)) {
                    foreach ($value as $element) {
                        $result[] = $element->toArray();
                    }
                } else {
                    $result[] = $value->toArray();
                }
            }
        }

        return $result;
    }
}
