@extends('layouts.app')

@section('content')
<div class="container">
    <div class="">
        <div class="">
            <div class="card" >
                <div class="card-header" >process_data</div>

                <div class="card-body " style="overflow:scroll;">
                   
                  <form action="{{route('process_data')}}" method="post">
                       @csrf
                      <input type="submit" name="" value="process data" class="btn btn-sm btn-primary" >
                  </form>
                   
     @if(isset($data))
       <table style="width:100%;
" border="1"  >
         
           <tr>
             @foreach( $column as $key => $value )
               <th> {{$value}}</th>
             @endforeach
          </tr>  
       

        </tr>
    @foreach( $data as $datas )
        <tr>
            @foreach( $column as $key => $value )
               <td> {{$datas->$value}}</td>
             @endforeach
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
