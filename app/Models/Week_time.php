<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week_time extends Model
{
    use HasFactory;

    protected $table = 'week_times';
    protected $fillable = ['id','name'];
}
