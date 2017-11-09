@extends('layout');
@section('title', 'Home')

@section('content')
    <div style="min-height: 500px;">
        <h2>This is section</h2>
        <a href="{{route('product')}}">Products</a>
        <p>Name : {!! $myname !!}</p>
        <p>Name : {{ $myname }}</p>

        <form action="{{ route('login', ['name'=>'NTT','age'=>28]) }}" method="post">
            {{ csrf_field() }}

            <label for="txtUsername">User name:</label>
            <input type="text" name="txtUsername" id="txtUsername">
            <br><br>
            <label for="txtPass">Password:</label>
            <input type="password" name="txtPass" id="txtPass">
            <br><br>
            <button type="submit" name="btnsubmit">Login</button>
        </form>
        <br><br>
        <button type="button" id="sendAjax">Ajax</button>
    </div>
    <script type="text/javascript">
        $(function(){
            $('#sendAjax').click(function() {
                var username = $('#txtUsername').val().trim();
                var password = $('#txtPass').val().trim();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url : "{{ route('ajax') }}",
                    type : 'POST',
                    data: {username : username , password : password},
                    beforeSend : function(){
                        $('#sendAjax').text('Loading...');
                    },
                    success : function(res){
                        $('#sendAjax').text('Ajax');
                        console.log(res);
                    }
                });
            });
        });
    </script>
@endsection