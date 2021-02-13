<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function masuk()
    {
        return $this->hasMany(Masuk::class);
    }
    public function barcodes()
    {
        return $this->hasManyThrough(Barcode::class, Masuk::class);
    }
}
