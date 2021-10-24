<?php

namespace App\Http\Livewire\LaravelExamples;

use Livewire\Component;
use App\Models\Census;
use Illuminate\Http\Request;
class FormEditor extends Component
{
    protected $result;
    public function mount($id) {
        $this->result = Census::where("UniqueId",$id)->first();
    }


    public function render()
    {
        $result = $this->result;
        return view('livewire.laravel-examples.content-edit', compact("result"))->layout('layouts.app');
    }

    public function update(Request $request)
    {
        
        $result = Census::where("RunID",$request->RunID)->first();
        
        $input =[];
        $input["Q1_OName"] = $request->Q1_OName;
        $input["Q1_OAddress"]= $request->Q1_OAddress;
        $input["Q1_OPinCode"]= $request->Q1_OPinCode;
        $input["Q1_OPhno"]= $request->Q1_OPhno;
        
        $result->update($input);

        return redirect('/census-dashboard');
    }
}
