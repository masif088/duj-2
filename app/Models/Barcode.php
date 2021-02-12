<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barcode extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function masuk()
    {
        return $this->belongsTo(Masuk::class);
    }
    public function mutasi()
    {
        return $this->hasOne(Mutasi::class);      
    }
    public function check()
    {
        return $this->hasOne(Check::class);      
    }
}
