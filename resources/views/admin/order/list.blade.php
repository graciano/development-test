@extends('admin.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Orders</div>

                <div class="panel-body">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Info</th>
                            <th>Items</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                        <tr>
                            <td>
                                <dl class="dl-horizontal">
                                    <dt>Total Value</dt>
                                    <dd>$ {{ number_format($order->total_price, 2)}}</dd>
                                    <dt>Name</dt>
                                    <dd>{{$order->name}}</dd>
                                    <dt>E-mail</dt>
                                    <dd>{{$order->email}}</dd>
                                    <dt>Phone</dt>
                                    <dd>{{$order->phone}}</dd>
                                    <dt>Address</dt>
                                    <dd>{{$order->address}}</dd>
                                    <dt>City/State</dt>
                                    <dd>{{$order->city}} / {{$order->state}}</dd>
                                    <dt>Country</dt>
                                    <dd>{{$order->country}}</dd>
                                </dl>
                            </td>
                            <td>
                                @foreach($order->items as $item)
                                <ul class="list-unstyled">
                                    <li>
                                        <dl class="dl-horizontal">
                                            <dt>Product</dt>
                                            <dd>
                                            {{$item->product->name}}
                                            - ${{number_format($item->product->price, 2)}}
                                            </dd>
                                            <dt>Quantity</dt>
                                            <dd>{{$item->quantity}}</dd>
                                            <dt>Subtotal</dt>
                                            <dd>$ {{ number_format($item->subtotal, 2)}}</dd>
                                        </dl>
                                    </li>
                                </ul>
                                @endforeach
                            </td>
                            <td>
                                {{$order->created_at->format('d/m/Y')}}
                                at
                                {{$order->created_at->format('h:i')}}
                            </td>
                        </tr>
                        @empty
                        <tr><td>
                            No orders to show.
                        </td></tr>
                        @endforelse
                    </tbody>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
