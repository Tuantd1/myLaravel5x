@extends('admin.layout.layout')

@section('title', $title);

@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Products</h4> </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <a href="http://wrappixel.com/templates/pixeladmin/" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Upgrade to Pro</a>
        <ol class="breadcrumb">
            <li><a href="#">Products</a></li>
        </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="white-box">
            <h3 class="text-center"> This is list product !</h3>
            <a class="btn btn-primary" href="{{ route('admin.addproduct') }}" title="Add product"> Add Product </a>
        </div>
        <div class="white-box">
            <div class="row">
                <h3>{{ $messAction }}</h3>
            </div>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Quanity</th>
                        <th>Create Time</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->name_pd }}</td>
                        <td>
                            <img width="120" height="120" src="{{ url('uploads/images') }}{{ "/" . $item->img_pd }}">
                        </td>
                        <td>
                            {{ $item->price_pd }}
                        </td>
                        <td>{{ $item->qty_pd }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="{{ url('/admin/product/edit/' . $item->id) }}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <a href="{{ route('admin.deleteproduct',['id'=>$item->id]) }}" class="btn btn-primary">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{ $product->links() }}
            </div>

        </div>
    </div>
</div>
@endsection