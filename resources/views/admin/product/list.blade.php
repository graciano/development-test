@extends('admin.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Products</div>

                <div class="panel-body">
                    @if(session('deleted-message'))
                        <p class="text text-danger">{{ session('deleted-message') }}</p>
                    @endif
                    <div class="links">
                        <a href="{{ route('product.create') }}" class="btn btn-primary">New Product</a>
                    </div>
                    <br>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                
                                <td><strong>Name</strong></td>
                                <td><strong>Stock Quantity</strong></td>
                                <td><strong>Price</strong></td>
                                <td><strong>Created at</strong></td>
                                <td><strong>Options</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @forelse($products as $p)
                                <tr>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->stock }}</td>
                                    <td>$ {{ number_format($p->price, 2) }}</td>
                                    <td>{{ $p->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <form action="{{ route('product.destroy', $p->id) }}" method='post' class="form-inline">
                                            {!! csrf_field() !!}
                                            {!! method_field('DELETE') !!}
                                            <a href="{{ route('product.edit', $p->id) }}" class="btn btn-default">edit</a>
                                            <button type="submit" class="btn btn-danger">delete</a>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>No products to show</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {!! $products->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
