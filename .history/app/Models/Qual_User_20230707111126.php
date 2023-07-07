<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model // この行を変更します。
{
    use HasFactory;
    protected $table = 'tbl_qual_list';

    protected $fillable = [
        'user',
        'qualification_id',
    ];
}
