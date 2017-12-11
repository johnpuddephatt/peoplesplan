<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Interview;
use Illuminate\Support\Facades\Auth;




use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;


class InterviewController extends Controller
{
  public function show($slug)
  {
    $interview = Interview::where('slug',$slug)->with(['comments.user','comments.likes','likes'])->firstOrFail();
    return view('interview.single', compact('interview'));
  }

  public function index()
  {

    Schema::table('ideas', function (Blueprint $table) {
      $table->softDeletes();
    });
    $interviews = Interview::withCount('comments')->get();
    return view('interview.index', compact('interviews'));
  }
}