<?php

namespace App\Services;

use App\Enums\CurrencyEnum;
use Illuminate\Support\Facades\Http;

class ConvertService {
    private $baseURL = "https://economia.awesomeapi.com.br";

    private function buildMessage(array $currencies){
        $currenciesText = "";
        foreach ($currencies as $currency) {
            $currenciesText .= $currency["from"]->value."-".$currency["to"]->value.",";
        }
        $currenciesText = rtrim($currenciesText, ",");
        return $currenciesText;
    }

    public function convert(float $value, CurrencyEnum $from, CurrencyEnum $to){
        $url = "{$this->baseURL}/last/{$to->value}-{$from->value}";
        $response = Http::timeout(5)->get($url);
        return $response->json();
    }

    public function convertByArray(float $value, array $currencies){
        $message = $this->buildMessage($currencies);
        $url = "{$this->baseURL}/last/$message";
        $response = Http::timeout(5)->get($url);
        return $response->json();
    }
}
