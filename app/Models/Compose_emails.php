<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compose_emails extends Model
{
    use HasFactory;

    static public function getAgentRecord ($user_id)
    {
        return self::select('compose_emails.*')
        ->where('compose_emails.user_id', '=', $user_id)
        ->get();
    }
}
