<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infra extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function serviceInfra()
    {
        return $this->hasMany(ServiceInfra::class);
    }
    public function gudang()
    {
        return $this->belongsTo(Gudang::class);
    }
}
