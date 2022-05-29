<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * @var string
     */
    protected $table = 'city';

    /**
     * @var array
     */
    protected $fillable = [
        'city', 'id_province'
    ];
}