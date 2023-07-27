@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card p-4">

                <h2>Dashboard</h2>

                <div class="row">
                    <div class="col-md-3">
                        <div class="card bg-success text-white p-3">
                            <h5>Products</h5>
                            <h1 class="mb-0 pb-0">
                                @if(auth()->user()->role == 1)
                                    {{count(App\Models\Product::all())}}
                                @else
                                    {{count(App\Models\Product::where('seller_id', auth()->user()->id)->get())}}
                                @endif
                            </h1>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card bg-warning text-dark p-3">
                            <h5>Orders</h5>
                            <h1 class="mb-0 pb-0">
                                @if(auth()->user()->role == 1)
                                    {{count(App\Models\Order::all())}}
                                @else
                                    {{count(App\Models\Order::where('seller_id', auth()->user()->id)->get())}}
                                @endif
                            </h1>
                        </div>
                    </div>

                    @if(auth()->user()->role == 1)
                    <div class="col-md-3">
                        <div class="card bg-primary text-light p-3">
                            <h5>Seller</h5>
                            <h1 class="mb-0 pb-0">
                                {{count(App\Models\User::where('role', 2)->get())}}
                            </h1>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card bg-info text-dark p-3">
                            <h5>Customer</h5>
                            <h1 class="mb-0 pb-0">
                                {{count(App\Models\User::where('role', 1)->get())}}
                            </h1>
                        </div>
                    </div>

                    @endif

                    @if(auth()->user()->role == 2)
                    <div class="col-md-3">
                        <div class="card bg-primary text-light p-3">
                            <h5>Balance</h5>
                            <h1 class="mb-0 pb-0">
                                {{auth()->user()->balance}}
                            </h1>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card bg-info text-dark p-3">
                            <h5>Withdraw</h5>
                            <h1 class="mb-0 pb-0">
                                {{count(App\Models\Withdraw::where('user_id', auth()->user()->id)->get())}}
                            </h1>
                        </div>
                    </div>

                    @endif
                </div>

                
            </div>
        </div>
    </div>
</div>
@endsection
