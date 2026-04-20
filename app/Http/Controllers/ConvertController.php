<?php

namespace App\Http\Controllers;

use App\Enums\CurrencyEnum;
use App\Services\ConvertService;
use Exception;
use Illuminate\Http\Request;

class ConvertController extends Controller
{
    public function index(Request $request, ConvertService $convertService){
        $currenciesArray = [
            [
                "from" => CurrencyEnum::USD,
                "to" => CurrencyEnum::BRL
            ],
            [
                "from" => CurrencyEnum::BTC,
                "to" => CurrencyEnum::BRL
            ],
            [
                "from" => CurrencyEnum::EUR,
                "to" => CurrencyEnum::BRL
            ],
        ];
        try {
            $currencies = $convertService->convertByArray(1, $currenciesArray);
            return view("convert", [
                "currencies" => $currencies ?? [],
                "error" => null
            ]);
        }
        catch(Exception $error){
            return view("convert")->with(
                [
                    "currencies" => [],
                    "error" => "Sistema externo não respondeu"
                ]
            );
        }
    }
}
