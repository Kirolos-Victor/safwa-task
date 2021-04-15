@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Products</div>

                    @if(session()->has('success'))
                        <div class="alert alert-success mt-1">{{session()->get('success')}}</div>
                        @endif
<product></product>

                </div>
            </div>
        </div>
    </div>
@endsection
