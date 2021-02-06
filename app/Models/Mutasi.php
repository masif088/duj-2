<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function gudang()
    {
        return $this->belongsTo(Gudang::class);
    }
    public function barcode()
    {
        return $this->belongsTo(Barcode::class);
    }
}
