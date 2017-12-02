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
  protected $fillable = ['title','slug','description','date','icon'];


  public function getMonth()
    {
    return date('F', strtotime($this->date));
  }

  public static function storeImage($imagerequest) {
    if (starts_with($imagerequest, 'data:image')) {
      $image = \Image::make($imagerequest);
      $image->resize(400,null,function ($constraint) {
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

  public function ideas() {
    return $this->hasMany('App\Models\Idea');
  }

  public function addIdea(Idea $idea) {
    return $this->ideas()->save($idea);
  }

}
