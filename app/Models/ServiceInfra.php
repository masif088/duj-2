<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceInfra extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function infra()
    {
        return $this->belongsTo(Infra::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
