<?php

namespace App\Http\Controllers;
use App\Assignment;
use App\Course;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\Assign;

class VideoController extends Controller
{
    public function index()
    {
        return view('videos.index',['courses'=>Course::all(),'assignment'=>Assignment::all()]);
    }
    public function update($assignment){
       $assignment = Assignment::find($assignment);
       if ($assignment!=null) {
           unlink(storage_path('app/public/videos/'.$assignment->video));
           $assignment->video = null;
           $assignment->save();

           return redirect()->route('courses.assignments.index', $assignment->course_id);
       }
    }
}
