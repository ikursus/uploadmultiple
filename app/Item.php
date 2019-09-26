<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name'];

    // Relationship one to many ItemDetails
    public function details()
    {
    	return $this->hasMany(ItemDetails::class);
    }
}
