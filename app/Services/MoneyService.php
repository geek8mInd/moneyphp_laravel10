<?php

namespace App\Services;

use Money\Money;
use Money\Converter;
use Money\Currency;
use Money\Currencies\ISOCurrencies;
use Money\Exchange\FixedExchange;
use Money\Formatter\IntlMoneyFormatter;
class MoneyService {

    public function __construct(){
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

    public function formatMoney($result)
    {
        $currencies = new ISOCurrencies();
        $numberFormatter = new \NumberFormatter('en_US', \NumberFormatter::CURRENCY);
        $moneyFormatter = new IntlMoneyFormatter($numberFormatter, $currencies);
        $result = $moneyFormatter->format($result);

        return $result;
    }

    public function calculateDiscount($discount = 0, $listPrice = 0, $currency = 'USD')
    {
        $result = (($discount/$listPrice)* 100);
        $result = Money::{$currency}($result);

        return $this->formatMoney($result);
    }

    public function calculateAggregation($operation = 'sum', $sets = [], $currency = 'USD')
    {
        if (count($sets) == 0) return;

        $stringSetsArray = [];
        foreach($sets as $value) {
            $stringSetsArray[] = Money::{$currency}($value);
        }
        $stringSets = implode(",", $stringSetsArray);
        
        return Money::{$operation}($stringSets);
    }
}