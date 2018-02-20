<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Theme extends Model
{
  use CrudTrait;

  /**
  * Fillable array
  */
  protected $fillable = ['title','slug','description','date','icon','whitepaper_title','whitepaper_summary','whitepaper_body','whitepaper_file'];

  public function ideas() {
    return $this->hasMany('App\Models\Idea');
  }

  public function comments()
  {
    return $this->morphMany('App\Models\Comment', 'commentable');
  }

  public function getMonth()
    {
    return date('F', strtotime($this->date));
  }

  // public static function storeImage($imagerequest) {
  //   if (starts_with($imagerequest, 'data:image')) {
  //     $image = \Image::make($imagerequest);
  //     $image->resize(400,null,function ($constraint) {
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

  public function setWhitepaperFileAttribute($value)
    {
      $attribute_name = "whitepaper_file";
      $disk = "public";
      $destination_path = "whitepapers";
      $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }

  public function setIconAttribute($value)
    {
      $attribute_name = "icon";
      $disk = "public";
      $destination_path = "icons";

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

  public function addIdea(Idea $idea) {
    return $this->ideas()->save($idea);
  }

}
