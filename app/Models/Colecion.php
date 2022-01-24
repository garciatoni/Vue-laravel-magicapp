<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colecion extends Model
{
    use HasFactory;
    protected $table = 'coleciones';
    public $timestamps = false;
}
