<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlcType extends Model
{
    public $timestamp=false;
    protected $fillable = ['name'];
    public function alcBrands(){
        return $this->hasMany(AlcBrand::class);
    }
}
