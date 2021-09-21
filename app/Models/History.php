<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'histories';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'output_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function output()
    {
        return $this->belongsTo(OutPut::class,'output_id','id');
    }

}
