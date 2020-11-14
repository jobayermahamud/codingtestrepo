@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <section>
                        <div class="product">
                          {{-- <img
                            src="https://i.imgur.com/EHyR2nP.png"
                            alt="The cover of Stubborn Attachments"
                          /> --}}
                          <div class="description">
                            <h3>Active your account</h3>
                            <h5>$10.00</h5>
                          </div>
                        </div>
                        <button id="checkout-button">Checkout</button>
                      </section>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
