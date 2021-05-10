<?php

namespace App\Http\Controllers;

use App\Models\Expensetype;
use Illuminate\Http\Request;

class ExpensetypeController extends Controller
{
    public $title = 'Configuration';    
    public $subtitle = "Expense-Type";

    public function index()
    {
        $data = ['title'=>$this->title, 'subtitle'=>$this->subtitle];
        return view('admin.expensetype.index',$data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['title'=>$this->title, 'subtitle'=>$this->subtitle];
        return view('admin.expensetype.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //print_r( $request->input());          
        $validatedData = $request->validate([          
            'name' => 'required|max:30', 
            'br_code'=>  'required|max:99|min:10|numeric|unique:categories',       
            'tax_code' => 'required|max:50|numeric'
        ]);
        //validate
        $type = new Expensetype;           
        $newCategory->name = ucfirst($request->name); 
        $newCategory->br_code = $request->br_code;           
        $newCategory->tax_code = $request->tax_code;
            if($newCategory->save()){
                return redirect('categories')->with('status', 'Category Just Created!');
            }else{
                return redirect('categories/create')->with('status', 'Something went wrong, Try Again');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expensetype  $expensetype
     * @return \Illuminate\Http\Response
     */
    public function show(Expensetype $expensetype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expensetype  $expensetype
     * @return \Illuminate\Http\Response
     */
    public function edit(Expensetype $expensetype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expensetype  $expensetype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expensetype $expensetype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expensetype  $expensetype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expensetype $expensetype)
    {
        //
    }
}
