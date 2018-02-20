<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;

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
    protected $fillable = ['quote','name','code','thumb','slug','featured'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    // public static function storeImage($imagerequest) {
    //   if (starts_with($imagerequest, 'data:image')) {
    //     $image = \Image::make($imagerequest);
    //     $image->resize(500,null,function ($constraint) {
    //       $constraint->aspectRatio();
    //     });
    //     $filename = md5(time()).'.jpg';
    //     \Storage::disk('uploads')->put($filename, $image->stream());
    //     $imagerequest = 'uploads/' . $filename;
    //     return $imagerequest;
    //   }
    //   else {
    //     $imagerequest = null;
    //   }
    // }

    public function setThumbAttribute($value)
      {
        $attribute_name = "thumb";
        $disk = "public";
        $destination_path = "interviews";

        // if the image was erased
        if ($value==null) {
            // delete the image from disk
            \Storage::disk($disk)->delete($this->{$attribute_name});

            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }

        // if a base64 was sent, store it in the db
        if (starts_with($value, 'data:image'))
        {
            // 0. Make the image
            $image = \Image::make($value);
            // 1. Generate a filename.
            $filename = md5($value.time()).'.jpg';
            // 2. Store the image on disk.
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            // 3. Save the path to the database
            $this->attributes[$attribute_name] = '/storage/'.$destination_path.'/'.$filename;
        }
      }


    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function comments()
     {
         return $this->morphMany('App\Models\Comment', 'commentable');
     }

     public function likes()
     {
         return $this->morphMany('App\Models\Like', 'likeable');
     }

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
