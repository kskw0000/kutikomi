<?php

namespace App\Models; // 修正した部分

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qual_User extends Model
{
    use HasFactory;
    protected $table = 'tbl_qual_list';

    protected $fillable = [
        'user',
        'qualification_id',
    ];
}
