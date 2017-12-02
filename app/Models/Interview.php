<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Interview extends Model
{
    use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    //protected $table = 'tags';
    //protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['quote','name','code','thumb','slug'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public static function storeImage($imagerequest) {
      if (starts_with($imagerequest, 'data:image')) {
        $image = \Image::make($imagerequest);
        $image->resize(500,null,function ($constraint) {
          $constraint->aspectRatio();
        });
        $filename = md5(time()).'.jpg';
        \Storage::disk('uploads')->put($filename, $image->stream());
        $imagerequest = 'uploads/' . $filename;
        return $imagerequest;
      }
      else {
        $imagerequest = null;
      }
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
