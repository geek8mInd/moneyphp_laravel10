<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\MoneyService;

class Countrycurrency extends Model
{
    use HasFactory;

    protected $table = "countrycurrency";

    protected $fillable = [
        "country_id",
        "currency_id",
        "currency_rate"
    ];
    public function country()
    {
        return $this->hasOne(Countries::class,"id","country_id");
    }
    public function currency()
    {
        return $this->hasOne(Currencies::class,"id","currency_id");
    }
    public function getFormattedCurrencyRateAttribute()
    {
        $moneyService = new MoneyService();
        $result = $moneyService->transformToMoneyObject($this->currency_rate, $this->currency->currency_iso_code);
        
        return $moneyService->formatMoney($result);
    }
}