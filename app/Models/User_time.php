<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class User_time extends Model
{
    use HasFactory;

    protected $table = 'user_times';
    protected $fillable = ['id','user_id','week_id','start_time','end_time','status'];

    static function getDetail($weekid)
    {
        return self::where('week_id', '=', $weekid)
        ->where('user_id', '=', Auth::user()->id)
        ->first();
    }
}
