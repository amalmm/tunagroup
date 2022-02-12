@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">loan details</div>

                <div class="card-body">
                   
                   @if($data)

                       <table style="width:100%">
                        <tr>
                            <th>clientid</th>
                            <th>num_of_payment</th>
                            <th>first_payment_date</th>
                            <th>last_payment_date</th>
                            <th>loan_amount</th>
                        </tr>

                   @foreach($data as $datas)

                        <tr>
                            <td>{{ $datas->clientid   }}</td>
                            <td>{{ $datas->num_of_payment   }}</td>
                            <td>{{ $datas->first_payment_date   }}</td>
                            <td>{{ $datas->last_payment_date   }}</td>
                            <td>{{ $datas->loan_amount   }}</td>
                        </tr>

                   @endforeach

                   </table>
 
                   @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
