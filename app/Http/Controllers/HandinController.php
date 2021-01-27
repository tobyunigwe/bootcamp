<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Course;
use App\Handin;
use App\Http\Requests\CreateHandinRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use PhpParser\Node\Expr\Assign;

class HandinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Course $course
     * @param Assignment $assignment
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Course $course, Assignment $assignment)
    {
        return view('handin.index', ['course' => $course, 'assignment' => $assignment, 'handins' => $assignment->handins, 'user' => Auth::user()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Course $course
     * @param Assignment $assignment
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Course $course, Assignment $assignment)
    {
       return view('handin.create', ['course' => $course, 'assignment' => $assignment]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateHandinRequest $request
     * @param Course $course
     * @param Assignment $assignment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateHandinRequest $request,Course $course,Assignment $assignment)
    {
        if (!$request->validated()) {
            return redirect()->back()->withInput($request->input())->withErrors($request);
        }
        $handin = new Handin();
        if ($request->file('file') != null) {
            $file = $request->file('file')->store('/public/files');
            $file = str_replace('public/files/', '', $file);
            $handin->file = $file;
        }

        $handin->user_id = Auth::id();
        $handin->assignment_id = $assignment->id;
        $handin->info = $request['info'];
        $handin->save();
        return redirect()->route('courses.assignments.show',['course'=>$course,'assignment'=>$assignment])->with('Submitted!');
    }

    /**
     * Display the specified resource.
     *
     * @param Course $course
     * @param Assignment $assignment
     * @param \App\Handin $handin
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Course $course, Assignment $assignment,Handin $handin)
    {
        return view('handin.show',['course'=>$course,'assignment'=>$assignment,'handin'=>$handin,'user'=>Auth::user()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Handin $handin
     * @return \Illuminate\Http\Response
     */
    public function edit(Handin $handin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Handin $handin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Handin $handin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Handin $handin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Handin $handin)
    {
        //
    }

    public function downloadhandin(Course $course, Assignment $assignment, Handin $handin)
    {
        return response()->download('storage/files/'.$handin->file);
    }
}
