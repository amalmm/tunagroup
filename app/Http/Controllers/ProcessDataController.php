<?php

namespace App\Http\Controllers;

use App\Repository\ProcessDataRepository;

use Illuminate\Http\Request;

class ProcessDataController extends Controller
{

      private $pdr;
     
       public function __construct(ProcessDataRepository $pdr)
    {
        $this->middleware('auth');
       $this->pdr = $pdr;
    }
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

        $this->pdr->TableExistDrop();

        $this->pdr->TableCreateNew();

        $this->pdr->TableInsertData();

        $data =  $this->pdr->TableAllData();

        $column =  $this->pdr->TableAllColumn();


        return view('/process_data',compact('data','column'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProcessData  $processData
     * @return \Illuminate\Http\Response
     */
    public function show(ProcessData $processData)
    {
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
