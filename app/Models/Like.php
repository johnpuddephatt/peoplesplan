<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'likes';

    /**
	 * Fillable array
     */
    protected $fillable = ['user_id', 'vote', 'likeable_id', 'likeable_type',];


    public function likeable()
    {
        return $this->morphTo();
    }
}
