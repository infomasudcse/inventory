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
            'name' => 'required|max:30'            
        ]);
        //validate
        $type = new Expensetype;           
        $type->typename = ucfirst($request->name);       
            if($type->save()){
                return redirect('expensetype')->with('status', 'A New Type Just Created!');
            }else{
                return redirect('expensetype/create')->with('status', 'Something went wrong, Try Again');
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

    public function getExpenseType(){
        $etype = Expensetype::all();
         $typeData =[]; 
         $i=1;       
         foreach($etype as $type){
            $action = "<div class='btn-group'>
                        <a type='button' href='".url('expensetype/'.$type->id.'/edit')."' class='btn btn-default btn-sx'>Edit</a>
                        </div>";

                $typeData['data'][] = array($i,$type->typename,$action);
                $i++;
         }
        return json_encode($typeData);
    }
}
