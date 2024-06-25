<?php

namespace Netflie\WhatsAppCloudApi\Message\Template\Parameters;

class Currency extends Parameter
{

    /**
     * This parameter represents a fallback or default value for the currency. 
     * If the specific currency cannot be determined, this value is used
     *
     * @var string
     */
    protected string $fallback_value;

    /**
     * The currency code (e.g., “USD” for US dollars or “EUR” for euros). 
     * It’s a string that identifies the currency according to ISO 4217 standards.
     *
     * @var string
     */
    protected string $code;

    /**
     * This numeric value represents the amount of money in the specified currency, but multiplied by 1000. 
     * For example, if amount_1000 is 500, it means the actual amount is 0.5 in the corresponding currency.
     *
     * @var float
     */
    protected float $amount_1000;

    public function __construct(string $fallback_value, string $code, float $amount_1000)
    {
        $this->fallback_value = $fallback_value;
        $this->code = $code;
        $this->amount_1000 = $amount_1000;

        parent::__construct('currency');
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'currency' => [
                'fallback_value' => $this->fallback_value,
                'code' => $this->code,
                'amount_1000' => $this->amount_1000
            ]
        ];
    }
}
