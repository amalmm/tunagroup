<?php

namespace App\Repository;

use App\Models\ProcessData;
use App\Models\loan_detail;

use Illuminate\Support\Facades\Schema;

use DB;
use DateTime;
use DatePeriod;
use DateInterval;

class ProcessDataEloquent implements  ProcessDataRepository
{

public function TableAllData(){
   
   return  DB::table('emi_details')->get();
}

public function TableExistDrop()
{
   if(Schema::hasTable('emi_details')){
        	 Schema::drop('emi_details');
        }
}


public function TableCreateNew()
{
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
}


public function TableInsertData()
{

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
               	  	   $dev = $sdks->loan_amount / $sdks->num_of_payment;
                 	   $pdata[ $dts->format("Y_M") ] = $dev ;
                    }

                 $rdata = DB::table('emi_details')->insert($pdata);
       }
}


}