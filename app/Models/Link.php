<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    public function website()
    {
        return $this->belongsTo(Website::class, 'website_id');
    }
    public function itemSchema()
    {
        return $this->belongsTo(ItemSchema::class, 'item_schema_id');
    }
}
