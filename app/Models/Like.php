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
    protected $fillable = ['user_id', 'item_id', 'vote'];
}
