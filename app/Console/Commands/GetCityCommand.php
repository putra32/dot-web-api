<?php

namespace App\Console\Commands;

use App\Models\City;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetCityCommand extends Command
{
    protected $signature = "featch:city";
    protected $description = "Get city from api raja ongkir";

    public function handle()
    {
        $headers = array('key' => env('API_KEY_RAJAONGKIR'));
        $res = Http::withHeaders($headers)->acceptJson()->get('https://api.rajaongkir.com/starter/city');

        $data = json_decode($res);
        for ($i = 0; $i < count($data->rajaongkir->results); $i++) {

            City::create([
                'city' => $data->rajaongkir->results[$i]->city_name,
                'id_province' => $data->rajaongkir->results[$i]->province_id,
            ]);
        }
        echo "Cities from rajaongkir success to copy on local database";
    }
}
