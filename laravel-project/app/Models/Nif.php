<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nif extends Model
{
    use HasFactory;
    protected $table = 'nif';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'whatsapp_number',
        'country',
        'certification_type',
        'document_type',
        'destination_country',
        'file_name',
        'check_box'
    ];

}
