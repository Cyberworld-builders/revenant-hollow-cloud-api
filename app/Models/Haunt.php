<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Haunt extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','idle','latitude','longitude','altitude'];
}
