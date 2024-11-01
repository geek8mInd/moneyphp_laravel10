<?php

namespace App\Services;

use Money\Money;
use Money\Converter;
use Money\Currency;
use Money\Currencies\ISOCurrencies;
use Money\Exchange\FixedExchange;
use Money\Formatter\IntlMoneyFormatter;
class MoneyService {

    public function __construct(private $currencies = null,
        private $numberFormatter = null)
    {
        $this->currencies = new ISOCurrencies();
        $this->numberFormatter = new \NumberFormatter('en_US', \NumberFormatter::CURRENCY);
    }

    public function transformToMoneyObject($amount = 0, $currency = 'USD'): Money
    {
        return Money::{$currency}($amount);
    }
        
    public function calculateBasic($currency, $operation = "add", $value1 = 0, $value2 = 0) 
    {
        
        $value1 = Money::{$currency}($value1);

        switch ($operation) {
            case "add":
                $value2 = Money::{$currency}($value2);
                $result = $value1->add($value2);
                break;
            case "substract":
                $value2 = Money::{$currency}($value2);
                $result = $value1->subtract($value2);
                break;
            case "multiply":
                $result = $value1->multiply($value2);
                break;
            default:
                $result = $value1->divide($value2);
                break;
        }

        return $this->formatMoney($result);
    }

    public function formatMoney(Money $result)
    {
        $moneyFormatter = new IntlMoneyFormatter($this->numberFormatter, $this->currencies);
        $result = $moneyFormatter->format($result);

        return $result;
    }

    public function calculateDiscount($discount = 0, $listPrice = 0, $currency = 'USD')
    {
        $result = (($discount/$listPrice)* 100);
        $result = Money::{$currency}($result);

        return $this->formatMoney($result);
    }

    public function calculateAggregation($operation = 'sum',
        $value1 = 0,
        $value2 = 0,
        $value3 = 0,
        $currency = 'USD'
    )
    {    
        $value1 = Money::{$currency}($value1);
        $value2 = Money::{$currency}($value2);
        $value3 = Money::{$currency}($value3);

        $result = Money::{$operation}($value1, $value2, $value3);
        
        return $this->formatMoney($result);
    }

    public function calculateExchange($base_currency = '', $converting_currency = '', $conversion_ratio = 0, $amount = 0)
    {
        $exchange = new FixedExchange([
            $base_currency => [
                $converting_currency => $conversion_ratio
            ]
        ]);
        
        $converter = new Converter($this->currencies, $exchange);
        
        $amountToConvert = Money::{$base_currency}($amount);
        $result = $converter->convert($amountToConvert, new Currency($converting_currency));

        return $this->formatMoney($result);
    }
}