<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class OutPut extends Model
{
    protected $table = 'outputs';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'is_draft'
    ];
}
