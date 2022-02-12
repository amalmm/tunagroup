<?php

namespace App\Http\Controllers;

use App\Models\loan_detail;
use Illuminate\Http\Request;


class LoanDetailController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = loan_detail::all();
        return view('loan_detail',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\loan_detail  $loan_detail
     * @return \Illuminate\Http\Response
     */
    public function show(loan_detail $loan_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\loan_detail  $loan_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(loan_detail $loan_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\loan_detail  $loan_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, loan_detail $loan_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\loan_detail  $loan_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(loan_detail $loan_detail)
    {
        //
    }
}
