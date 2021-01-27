<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Course;
use App\Grade;
use App\Handin;
use App\Http\Requests\CreateGradeRequest;
use App\Score;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function store(CreateGradeRequest $request,Course $course,Assignment $assignment,Handin $handin){
        $grade = new Grade();
        $grade->grade = $request['grade'];
        $grade->comment = $request['comment'];
        $grade->handin_id= $handin->id;
        $grade->save();
        return redirect()->route('courses.assignments.handin.show',[$course->id,$assignment->id,$handin])->with('Grade saved!');
    }
    public function update(CreateGradeRequest $request,Course $course,Assignment $assignment,Handin $handin,Grade $grade){
        $grade->grade = $request['grade'];
        $grade->comment = $request['comment'];
        $grade->handin_id= $handin->id;
        $grade->save();
        return redirect()->route('courses.assignments.handin.show',[$course->id,$assignment->id,$handin])->with('Grade saved!');
    }
}
