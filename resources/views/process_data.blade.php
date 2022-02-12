@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">process_data</div>

                <div class="card-body">
                   
                  <form action="{{route('process_data')}}" method="post">
                       @csrf
                      <input type="submit" name="" value="process data" class="btn btn-sm btn-primary">
                  </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
