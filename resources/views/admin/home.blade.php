@extends('admin.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="links">
                        <a href="{{ route('product.index') }}">Products</a>
                        <br>
                        <a href="{{ route('order.index') }}">Orders</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
