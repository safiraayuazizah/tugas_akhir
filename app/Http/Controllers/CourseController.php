<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        $course_total = Course::count();
        return view('admin.courses.index', compact('courses', 'course_total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $thumbnail = $request->file('thumbnail')->storeAs('thumbnails', time().'.'.$request->file('thumbnail')->getClientOriginalExtension(), 'public');
        $video = $request->file('video')->storeAs('videos', time().'.'.$request->file('video')->getClientOriginalExtension(), 'public');

        $course = new Course;
        $course->title = $request->title;
        $course->creator = $request->creator;
        $course->price = $request->price;
        $course->thumbnail = $thumbnail;
        $course->video = $video;
        $course->save();

        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('admin.courses.detail', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        if ($request->file('thumbnail')) 
        {
            if($course->thumbnail && file_exists(storage_path('app/public/' . $course->thumbnail)))
            {
                \Storage::delete('public/'.$course->thumbnail);
            }
            $thumbnail = $request->file('thumbnail')->storeAs('thumbnails', time().'.'.$request->file('thumbnail')->getClientOriginalExtension(), 'public');
            $course->thumbnail = $thumbnail;
        }

        if ($request->file('video'))
        {
            if($course->video && file_exists(storage_path('app/public/' . $course->video)))
            {
                \Storage::delete('public/'.$course->video);
            }
            $video = $request->file('video')->storeAs('videos', time().'.'.$request->file('video')->getClientOriginalExtension(), 'public');
            $course->video = $video;
        }

        $course->title = $request->title;
        $course->creator = $request->creator;
        $course->price = $request->price;
        $course->save();

        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        \Storage::delete('public/'.$course->thumbnail);
        \Storage::delete('public/'.$course->video);
        $course->delete();
        return redirect()->route('courses.index');
    }
}
