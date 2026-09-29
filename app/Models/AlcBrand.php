<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlcBrand extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','alcpercent','flavour'];
    public function alcTypes(){
        return $this->belongsTo(AlcType::class);
    }
}
