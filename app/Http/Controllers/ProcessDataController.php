<?php

namespace App\Http\Controllers;

use App\Models\ProcessData;
use App\Models\loan_detail;

use DB;
use DateTime;
use DatePeriod;
use DateInterval;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ProcessDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('process_data');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

      if(Schema::hasTable('emi_details')) 
       {

            Schema::drop('emi_details');
       
       } else{

            Schema::create('emi_details', function($table){
                 $table->id();
                 $table->string('clientid');
                

            $min_date =  loan_detail::all('first_payment_date')->min('first_payment_date');
            $max_date =  loan_detail::all('last_payment_date')->max('last_payment_date');                          

            $start    = new DateTime($min_date);
            $start->modify('first day of this month');
            $end      = new DateTime($max_date);
            $end->modify('first day of next month');
            $interval = DateInterval::createFromDateString('1 month');
            $period   = new DatePeriod($start, $interval, $end);

                   foreach ($period as $dt) {
                      $table->string($dt->format("Y_M"))->nullable();
                    }
});


        $sdk = loan_detail::all();

        foreach($sdk as $sdks){



            $omin_date =  $sdks->first_payment_date;
            $omax_date =  $sdks->last_payment_date;                          

            $ostart    = new DateTime($omin_date);
            $ostart->modify('first day of this month');
            $oend      = new DateTime($omax_date);
            $oend->modify('first day of next month');
            $ointerval = DateInterval::createFromDateString('1 month');
            $operiod   = new DatePeriod($ostart, $ointerval, $oend);

            $pdata = array('clientid' => $sdks->clientid);

                  
                   foreach($operiod as $dts) {
                      
                   // $pdata[ $dts->format("Y_M") ] = $sdks->loan_amount ;
                    $dev = $sdks->loan_amount / $sdks->num_of_payment;
                    $pdata[ $dts->format("Y_M") ] = $dev ;
                    }

                 $rdata = DB::table('emi_details')->insert($pdata);
    }
    return back();

   
       }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProcessData  $processData
     * @return \Illuminate\Http\Response
     */
    public function show(ProcessData $processData)
    {
       $data = DB::table('emi_details')->all();
        return view('show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProcessData  $processData
     * @return \Illuminate\Http\Response
     */
    public function edit(ProcessData $processData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProcessData  $processData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProcessData $processData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProcessData  $processData
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProcessData $processData)
    {
        //
    }
}
