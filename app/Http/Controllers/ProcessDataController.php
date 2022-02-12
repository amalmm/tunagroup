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

// $min_date =  loan_detail::all('first_payment_date')->min('first_payment_date');
// $max_date =  loan_detail::all('last_payment_date')->max('last_payment_date');
// $start    = new DateTime($min_date);
// $start->modify('first day of this month');
// $end      = new DateTime($max_date);
// $end->modify('first day of next month');
// $interval = DateInterval::createFromDateString('1 month');
// $period   = new DatePeriod($start, $interval, $end);

// foreach ($period as $dt) {
//     echo $dt->format("Y-M"). '<br>';
// }


            Schema::create('emi_details', function($table)
                {
                 $table->id();
                 $table->string('clientid');
                           try {

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

    } catch (Throwable $e) {
        return abort(404);
    }                
                });


// save data  1.get seed data
// 2.get coluem belong to inser 



            $sdk = loan_detail::all();
            foreach($sdk as $sdks){

            $min_date =  $sdks->min('first_payment_date');
            $max_date =  $sdks->max('last_payment_date');                          

            $start    = new DateTime($min_date);
            $start->modify('first day of this month');
            $end      = new DateTime($max_date);
            $end->modify('first day of next month');
            $interval = DateInterval::createFromDateString('1 month');
            $period   = new DatePeriod($start, $interval, $end);

                    pdata = array('clientid'=>'51')
                   foreach($period as $dt) {
                     echo $dt->format("Y_M"). $sdks->loan_amount ;
                    }

                  DB::table('emi_details')->insert($pdata);
    }

       // back
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
        //
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
