<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
   use HasFactory;

    public $fillable = [
        'name',
        'brand',
        'veiculo_ano',
        'kilometers',
        'city',
        'type',
        'price',
        'image',
        'description',
        'contact_name',
        'contact_phone',
        'contact_mail',
    ];
    
}