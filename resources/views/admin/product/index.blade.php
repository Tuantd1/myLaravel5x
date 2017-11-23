@extends('admin.layout.layout')

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
    </div>
</div>
@endsection