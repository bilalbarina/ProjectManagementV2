<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreTask extends Model
{
    use HasFactory;

    public function project()
    {
        return $this->belongsTo(PreProject::class);
    }
}
