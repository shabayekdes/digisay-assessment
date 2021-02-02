<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function website()
    {
        return $this->belongsTo(Website::class, 'website_id');
    }
    public function itemSchema()
    {
        return $this->belongsTo('App\ItemSchema', 'item_schema_id');
    }
}
