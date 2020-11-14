@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Subscription report</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Paid At</th>
                                <th>Expired At</th>
                                <th>Duration</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($subscription as $item)
                            <tr>
                                <td>{{date("Y-m-d h:i:sa", strtotime('+6 hours',$item->paid_at))}}</td>
                                <td>{{date("Y-m-d h:i:sa", strtotime('+6 hours',$item->subscription_expire))}}</td>
                                <td>{{date_diff(new DateTime(date("Y-m-d h:i:sa", strtotime('+6 hours',$item->paid_at))),new DateTime(date("Y-m-d h:i:sa", strtotime('+6 hours',$item->subscription_expire))))->format('%a days %I minutes %S seconds')}}</td>
                            </tr>
                        @endforeach    
                        
                        
                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
