<?php

namespace App\Http\Controllers\Student;

use App\Comment;
use App\Course;
use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class CourseController extends Controller
{
    public function studentCourses($studentId)
    {
        $course = Course::whereHas('students', function ($q) use ($studentId) {
            $q->where('student_id', $studentId);
        });
        return $course;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentId = student::find(JWTAuth::user())->pluck('id');


        $courses = Course::whereHas('students', function ($q) use ($studentId) {
            $q->where('student_id', $studentId);
        });
        if (empty($courses)) {
            return response()->json(['courses' => 'you have not join any courses yet']);
        }

        $enrolled_courses = $courses->join('users', 'courses.teacher_id', '=', 'users.id')
            ->select('courses.name', 'courses.price', 'courses.start_date', 'courses.end_date', 'users.name as teacher')
            ->get();
        $comments = $courses->join('comments', 'courses.id', 'comments.course_id')
            ->where('status', 'approved')
            ->select('courses.name', 'courses.price', 'courses.start_date', 'courses.end_date', 'users.name as teacher', 'comments.body As comment')

            ->get();

        return response()->json(['courses' => $enrolled_courses, 'comments' => $comments]);
    }

    /**
     * enroll a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function enroll(Request $request, $id)
    {
        $student = student::find(JWTAuth::user());
        $courses = Course::find($id);
        $courses->students()->sync($student);
        return response()->json(['message' => 'you have enrolled successfully']);
    }


    /**
     * comment the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function comment(Request $request, $id)
    {
        $student = JWTAuth::user()->id;

        $comment = Comment::create([
            'course_id' => $id,
            'student_id' => $student,
            'body' => $request->body
        ]);

        return response()->json(['message' => 'your comment is added successfully', 'comments', $comment]);
    }
}
