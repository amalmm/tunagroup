@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">process_data</div>

                <div class="card-body">

                    {{$data}}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
