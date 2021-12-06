<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WinnerLog extends Model
{
    use HasFactory;

    protected $fillable =['member_id', 'winnertype_id'];
}
