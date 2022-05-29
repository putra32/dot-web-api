<?php

namespace App\Console\Commands;

use App\Models\Province;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ProvinceCommand extends Command
{
    protected $signature = "featch:province";
    protected $description = "Get province from api raja ongkir";

    public function handle()
    {
        $headers = array('key' => env('API_KEY_RAJAONGKIR'));
        $res = Http::withHeaders($headers)->acceptJson()->get('https://api.rajaongkir.com/starter/province');

        $data = json_decode($res);
        for ($i = 0; $i < count($data->rajaongkir->results); $i++) {

            Province::create([
                'province' => $data->rajaongkir->results[$i]->province
            ]);
        }
        echo "Province from rajaongkir success to copy on local database";
    }
}
