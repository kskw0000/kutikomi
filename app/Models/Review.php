<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'tbl_review';

    protected $fillable = [
        'employment',
        'experience',
        'workperiod',
        'workhour',
        'rating',
        'content',
        'review_id',
        'review_type',        
    ];
}
