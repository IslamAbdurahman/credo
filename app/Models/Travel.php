<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;

    protected $table = 'trips';
    public $timestamps = false;

    protected $fillable = [
        'country',
        'city',
        'price',
        'img',
        'text'
    ];
}
