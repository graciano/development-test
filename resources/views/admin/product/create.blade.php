@extends('admin.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{ route('product.index') }}">Products</a></div>

                <div class="panel-body">
                    <h2>New Product</h2>
                    <br>
                    <form action="{{ route('product.store') }}" method="POST">
                        {!! csrf_field() !!}
                        @if($errors)
                        <p class="text-danger">{{$errors->first()}}</p>
                        @endif
                        @include('admin.product.fields')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
