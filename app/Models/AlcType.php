<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlcType extends Model
{
    public $timestamps = false;

    protected $table = 'alctypes';

    protected $fillable = ['name'];

    public function alcBrands()
    {
        return $this->hasMany(AlcBrand::class, 'alctype_id');
    }
}
