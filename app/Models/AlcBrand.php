<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlcBrand extends Model
{
    public $timestamps = false;

    protected $table = 'alcbrands';

    protected $fillable = ['alctype_id', 'name', 'alcpercent', 'flavour'];

    public function alcType()
    {
        return $this->belongsTo(AlcType::class, 'alctype_id');
    }
}
