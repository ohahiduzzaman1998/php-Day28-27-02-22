@extends('master')

@section('title')
    Manage product page
@endsection

@section('body')
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-danger text-center text-white">All Product</div>
                        <div class="card-body">
                            <h4 class="text-center text-danger">{{Session::get('massage')}}</h4>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Product Category</th>
                                    <th>Product Brand</th>
                                    <th>Product Price</th>
                                    <th>Product Description</th>
                                    <th>Product image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->category}}</td>
                                        <td>{{$product->brand}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->description}}</td>
                                        <td>{{$product->image}}</td>
                                        <td>
                                            <a href="{{route('edit-product',['id' => $product->id])}}" >
                                                <i class="fa fa-edit text-success"></i>
                                            </a>

                                            <a href=""  onclick="deleteProduct({{$product->id}})">
                                                <i class="fa fa-trash text-danger"></i>
                                            </a>
                                            <form method="POST" action="{{route('delete-product',['id' => $product->id])}}" id="deleteProductForm{{$product->id}}">
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
        function deleteProduct(id)
        {
            event.preventDefault();
            //alert('test');
            var  check  = confirm('Are you sure to delete this..');
            if(check)
            {

                document.getElementById('deleteProductForm'+id).submit();
            }

        }
    </script>

@endsection

