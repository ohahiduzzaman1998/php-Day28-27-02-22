<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Student;
use Illuminate\Http\Request;
use function Symfony\Component\Mime\Header\all;

class StudentController extends Controller
{
    protected $name;
    protected $city;
    protected $students;
    protected $student;
    protected $blog;


    public function index()
    {
        return view('add-student');

    }
    public function create(Request $request)
    {
        $this->student = new Student();
        $this->student->name = $request->name;
        $this->student->email = $request->email;
        $this->student->mobile = $request->mobile;
        $this->student->save();

        return redirect()->back()->with('massage', 'student info save successfully');
    }
    public function manage()
    {

        $this->students = Student::orderBy('id','desc')->get();

        return view('manage-student',['students'=> $this->students]);


    }
//    public function manageBlog()
//    {
//
//        $this->blogs = Blog::orderBy('id', 'desc')->get();
//
//        return view('manage-blog', ['blogs' => $this->blogs]);
//    }
    public function edit($id)
    {

        $this->student = Student::find($id);
        return view('edit-student',['student' => $this->student]);
    }
//    public function editBlog($id)
//    {
//
//        $this->blog = Blog::find($id);
//        return view('edit-blog',['blog' => $this->blog]);
//    }
    public function update(Request $request ,$id)
    {
        $this->student = Student::find($id);
        $this->student->name = $request->name;
        $this->student->email = $request->email;
        $this->student->mobile= $request->mobile;
        $this->student->save();

        return redirect('/manage-student')->with('massage','STUDENT info update successfully');
    }
    public function delete($id)
    {
        $this->student = Student::find($id);
        $this->student->delete();
        return redirect('/manage-student')->with('massage','student info delete successfully');

    }


}
