<?php
namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests\CreateCourseRequest;
use App\Http\Requests\UpdateCoursesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        $courses = Course::all();
        return view('courses.index', compact('courses', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateCourseRequest $request)
    {
        if(!$request->validated()){
            return redirect()->back()->withInput($request->input())->withErrors($request);
        }
        $course = new Course();
        //check if there is an image in the field
        if ($request->file('image') != null) {
            $image = $request->file('image')->store('/public/images');
            $image = str_replace('public/images/', 'storage/images/', $image);
            $course->image = $image;
        }
        $course->name = $request['name'];
        $course->description = $request['description'];
        $course->save();
        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Courses $courses
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Course $course
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCoursesRequest $request
     * @param Course $course
     * @return string
     */
    public function update(UpdateCoursesRequest $request, Course $course)
    {
        if(!$request->validated()){
            return redirect()->back()->withInput($request->input())->withErrors($request);
        }
        //check if there is an image in the field
        if ($request->file('image') != null) {
            $image = $request->file('image')->store('/public/images');
            $image = str_replace('public/images/', 'storage/images/', $image);
            $course->image = $image;
        }
        $course->name = $request['name'];
        $course->description = $request['description'];
        $course->save();
        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Course $course
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('status', 'Course deleted!');;
    }
}
