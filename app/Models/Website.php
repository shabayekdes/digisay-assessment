<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
/**
 * The attributes that should be cast.
 *
 * @var array
 */
protected $casts = [
    'last_scrape_at' => 'datetime:Y-m-d',
    'created_at' => 'datetime:Y-m-d',
];
}
