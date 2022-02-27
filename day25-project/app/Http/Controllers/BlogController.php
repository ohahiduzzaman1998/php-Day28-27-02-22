<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    protected $blog;
    protected $blogs;

    public function index()
    {
        return view('add-blog');
    }
    public function blogCreate(Request $request)
    {
        $this->blog = new Blog();
        $this->blog->title = $request->title;
        $this->blog->author = $request->author;
        $this->blog->description = $request->description;
        $this->blog->save();

        return redirect()->back()->with('massage', 'blog info save successfully');
    }
    public function manageBlog()
    {

        $this->blogs = Blog::orderBy('id', 'desc')->get();

        return view('manage-blog', ['blogs' => $this->blogs]);
    }
    public function editBlog($id)
    {

        $this->blog = Blog::find($id);
        return view('edit-blog',['blog' => $this->blog]);
    }
    public function updateBlog(Request $request ,$id)
    {
        $this->blog = Blog::find($id);
        $this->blog->name = $request->name;
        $this->blog->email = $request->email;
        $this->blog->mobile= $request->mobile;
        $this->blog->save();

        return redirect('/manage-blog')->with('massage','Blog info update successfully');
    }


}
