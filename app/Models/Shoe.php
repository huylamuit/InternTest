<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoe extends Model
{
    use HasFactory;
    protected $table = "shoes";
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'image',
        'name',
        'description',
        'price',
        'color'
    ];

    public $timestamps = true;
}
