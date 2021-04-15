@extends('layouts.app')

@section('content')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cart</div>
                    @if(session()->has('success'))
                        <div class="alert alert-success mt-1">{{session()->get('success')}}</div>
                    @endif
                    <div class="card-body">
                        @if($cart->totalQty > 0)

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ITEM</th>
                                <th scope="col">QUANTITY</th>
                                <th scope="col">UNIT PRICE</th>
                                <th scope="col">SUB TOTAL</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cart->items as $item)
                            <tr>
                                <th>{{$loop->index+1}}</th>
                                <td>{{$item['name']}}</td>
                                <td>
                                    <form action="{{route('cart.product.update',$item['id'])}}" method="post">
                                        @csrf
                                        @method('put')
                                        <input type="number" name="qtyNumber" value="{{$item['Qty']}}" class="form-control-sm">
                                        <button type="submit" class="btn btn-primary">Change</button>
                                    </form>
                                </td>
                                <td>{{$item['price']}}</td>
                                <td>{{$item['qtyPrice']}}</td>
                                <td><form action="{{route('cart.product.destroy',$item['id'])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                    </form></td>

                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <div class="row">
                            <div class="col-10">
                                Final total: {{$cart->totalPrice}}
                            </div>

                            <div class="col-2 float-right">
                                <form action="{{route('cart.destroy')}}" method="get">

                                    <button type="submit" class="btn btn-danger">Empty Cart</button>
                                </form>
                            </div>
                        </div>
                        @else
                        Cart is empty
                            @endif

                    </div>
                </div>
            </div>
        </div>

@endsection
