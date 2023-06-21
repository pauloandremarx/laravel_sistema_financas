<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $dates = ['date'];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    protected $guarded = [];
}
