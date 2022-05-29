<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    /**
     * @var string
     */
    protected $table = 'province';

    /**
     * @var array
     */
    protected $fillable = [
        'province'
    ];
}