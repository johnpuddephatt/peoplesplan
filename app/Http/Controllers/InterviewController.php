<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Interview;
use Illuminate\Support\Facades\Auth;

class InterviewController extends Controller
{
  public function show($slug)
  {
    $interview = Interview::where('slug',$slug)->with(['comments.user','comments.likes','likes'])->firstOrFail();
    return view('interview.single', compact('interview'));
  }
}