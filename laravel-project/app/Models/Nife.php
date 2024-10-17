<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Nif;

class Nife extends Model
{
    use HasFactory;
    protected $table = 'nifes';
    // protected $guarded = [];
    public function nife(){
        return $this->belongsTo(Nif::class,'nif_id');
    }
}
