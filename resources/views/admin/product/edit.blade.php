@extends('admin.layout.layout')
@section('title',$title);
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
            <h3 class="text-center"> This is add product !</h3>
            <a class="btn btn-primary" href="{{ route('admin.product') }}" title="Add product"> Products </a>
        </div>
        <div class="white-box">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/admin/product/hanldEdit') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="form-group">
                <label for="nameproduct">Product name</label>
                <input type="text" class="form-control" id="nameproduct" placeholder="Name product" name="nameproduct" value="{{ $info->name_pd }}">
                <input type="hidden" name="hddIdProduct" value="{{ $info->id }}">
              </div>
              <div class="form-group">
                <label for="desproduct">Descrption</label>
                <textarea id="desproduct" name="desproduct" class="form-control" rows="5" placeholder="Descrption">{{ $info->des_pd }}</textarea>
              </div>
              <div class="form-group">
                <label for="chooseCat">Choose Category</label>
                <select class="form-control" id="chooseCat" name="chooseCat">
                    @foreach( $cat as $key => $item )
                    <option {{ ($info->id_cat == $item->id) ? 'selected="selected"' : '' }} value="{{ $item->id }}"> {{ $item->name_cat }} </option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="chooseSize">Choose Size</label>
                <select class="form-control" id="chooseSize" name="chooseSize">
                    @foreach($size as $k => $i)
                    <option {{ ($info->id_size == $i->id) ? "selected='selected'" : "" }} value="{{ $i->id }}"> {{ $i->name_size }} </option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="priceproduct">Price</label>
                <input type="text" class="form-control" id="priceproduct" placeholder="Price product" name="priceproduct" value="{{ $info->price_pd }}">
              </div>
              <div class="form-group">
                <label for="photo">Image product</label>
                <input type="file" id="photo" name="photo">
                <br><br>
                <img src="{{ url('uploads/images') }}{{ "/" . $info->img_pd }}" alt="" width="120" height="120">
                <input type="hidden" name="hddImage" value="{{ $info->img_pd }}">
              </div>
              <div class="form-group">
                <label for="chooseStatus">Choose Status</label>
                <select class="form-control" id="chooseStatus" name="chooseStatus">
                    <option {{ ($info->status == 0) ? 'selected="selected"' : ''  }} value="0">Deactive</option>
                    <option {{ ($info->status == 1) ? 'selected="selected"' : ''  }} value="1">Active</option>
                </select>
              </div>
              <div class="form-group">
                <label for="qtyproduct">Quanity</label>
                <input type="text" class="form-control" id="qtyproduct" placeholder="Quanity product" name="qtyproduct" value="{{ $info->qty_pd }}">
              </div>
              <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
</div>
@endsection