<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Country Model
 */
class Country extends Model
{
    protected $table = 'country';

    /**
     * @return
     */
    public function getAll()
    {
        return Country::all();
    }
}
