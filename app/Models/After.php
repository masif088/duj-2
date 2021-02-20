<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class After extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function serviceAfter()
    {
        return $this->hasOne(ServiceAfter::class);
    }
    public function serviceAfters()
    {
        return $this->hasMany(ServiceAfter::class);
    }
    public function barcode()
    {
        return $this->belongsTo(Barcode::class);
    }
}
