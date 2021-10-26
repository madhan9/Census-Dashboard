<?php

namespace App\Http\Livewire\LaravelExamples;
use Auth;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Census;
use App\Models\CensusUpdated;

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
        $user = Auth::user();
        
        $result = Census::where("RunID",$request->RunID)->first();

        $result->update(["edited_flag"=>"S"]);

        $input_exists = $result->getAttributes();

        unset($input_exists["edited_flag"]);
        $input_exists["edited_level"] = $user->level; 

        $record_updated = new CensusUpdated();
        $record_updated->fill($input_exists)->save();
        
        $input =[];
        $input["Q1_OName"] = $request->Q1_OName;
        $input["Q1_OAddress"]= $request->Q1_OAddress;
        $input["Q1_OPinCode"]= $request->Q1_OPinCode;
        $input["Q1_OPhno"]= $request->Q1_OPhno;
        
        $record_updated->update($input);

        return redirect('/census-dashboard');
    }
}
