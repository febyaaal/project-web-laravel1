<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keluhan extends Model
{
    protected $fillable = ['keluhan', 'status', 'masyarakat_id'];

    public function pelapor()
    {
        return $this->belongsTo(Masyarakat::class);
    }
}