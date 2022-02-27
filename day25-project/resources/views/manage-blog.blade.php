@extends('master')

@section('title')
    Manage blog page
@endsection

@section('body')
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-danger text-center text-white">All blog</div>
                        <div class="card-body">
                            <h4 class="text-center text-danger">{{ Session::get('massage')}}</h4>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Blog Id</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($blogs as $blog)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$blog->id}}</td>
                                        <td>{{$blog->title}}</td>
                                        <td>{{$blog->author}}</td>
                                        <td>{{$blog->description}}</td>
                                        <td>
                                            <a href="{{route('edit-blog',['id' => $blog->id])}}" class="btn btn-success btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <a href="" class="btn btn-danger btn-sm" onclick="deleteBlog({{$blog->id}})">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <form method="POST" action="{{route('delete-blog',['id' => $blog->id])}}" id="deleteBlogForm{{$blog->id}}">
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function deleteBlog(id)
        {
            event.preventDefault();
            //alert('test');
            var  check  = confirm('Are you sure to delete this..');
            if(check)
            {

                document.getElementById('deleteBlogForm'+id).submit();
            }

        }
    </script>
@endsection

