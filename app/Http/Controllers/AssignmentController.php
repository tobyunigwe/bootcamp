<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Course;
use App\Handin;
use App\Http\Requests\CreateAssignmentRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Course $course
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Course $course)
    {
        $locked = [];
        if (Auth::user()->hasRole('admin|teacher')) {
            $assignments = $course->assignments;
        } else {
            $assignments = $course->assignments->filter(function ($assignment, $key) use (&$locked) {
                if ($assignment->unlock_after_assignment_id == null) return true;
                $toCheck = Assignment::find($assignment->unlock_after_assignment_id);
                $handin = $toCheck->handins()->where('user_id', Auth::id())->first();
                if ($handin != null)
                    return true;
                $locked[$assignment->id] = $assignment;
                return false;
            });
        }

        return view('assignments.index', ['assignments' => $assignments, 'locked' => $locked, 'course' => $course]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Course $course
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Course $course)
    {
        $assignments = Assignment::pluck('name', 'id');
        return view('assignments.create', ['course' => $course, 'assignments' => $assignments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateAssignmentRequest $request
     * @param Course $course
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateAssignmentRequest $request, Course $course)
    {
        if (!$request->validated()) {
            return redirect()->back()->withInput($request->input())->withErrors($request);
        }

        $assignment = new Assignment();
        if ($request->file('video') != null) {
            $video = $request->file('video')->store('/public/videos');
            $video = str_replace('public/videos/', '', $video);
            $assignment->video = $video;
        }
        $assignment->course_id = $course->id;
        $assignment->name = $request['name'];
        $assignment->description = $request['description'];
        $assignment->unlock_after_assignment_id = $request['unlock_after_assignment_id'];
        $assignment->save();
        return redirect()->route('courses.assignments.index', ['course' => $course->id]);
    }

    /**
     * Display the specified resource.
     * @param Course $course
     * @param \App\Assignment $assignment
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function show(Course $course, Assignment $assignment)
    {
        if ($assignment->unlock_after_assignment_id != null) {
            $check = Assignment::find($assignment->unlock_after_assignment_id)->handins()->where('user_id', Auth::id())->first();
            if ($check != null) {
                $handins = $assignment->handins()->where('user_id', Auth::id())->first();
                return view('assignments.show', ['course' => $course, 'assignment' => $assignment, 'handin' => $handins, 'user' => Auth::user()]);
            }
        } else {
            $handins = $assignment->handins()->where('user_id', Auth::id())->first();
            return view('assignments.show', ['course' => $course, 'assignment' => $assignment, 'handin' => $handins, 'user' => Auth::user()]);
        }
        return redirect()->route('courses.assignments.index', ['course' => $course]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Assignment $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Assignment $assignment
     * @param Course $course
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CreateAssignmentRequest $request, Course $course, Assignment $assignment)
    {
        if ($request->file('video') != null) {
            $video = $request->file('video')->store('/public/videos');
            $video = str_replace('public/videos/', '', $video);
            $assignment->video = $video;
        }
        $assignment->name = $request['name'];
        $assignment->description = $request['description'];
        $assignment->unlock_after_assignment_id = $request['unlock_after_assignment_id'];
        $assignment->save();
        return redirect()->route('courses.assignments.index', $course);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Course $course
     * @param Assignment $assignment
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Course $course, Assignment $assignment)
    {
        $assignment->delete();
        return redirect()->route('courses.assignments.index', ['course' => $course]);
    }
}
