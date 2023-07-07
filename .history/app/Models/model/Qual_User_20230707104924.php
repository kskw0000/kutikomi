<?php

namespace App\Models\Model; // この行を変更します。

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
