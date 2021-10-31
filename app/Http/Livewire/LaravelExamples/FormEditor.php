<?php

namespace App\Http\Livewire\LaravelExamples;
use Auth;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Census;
use App\Models\CensusUpdated;
use App\Models\QuestionOptions;

class FormEditor extends Component
{
    protected $result;
    public function mount($id) {
        $this->result = Census::where("UniqueId",$id)->first();
    }


    public function render()
    {
        $result = $this->result;
        $quest_prop =  QuestionOptions::getQueriedResult();
        return view('livewire.laravel-examples.content-edit', compact("result","quest_prop"))->layout('layouts.app');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        if( $user->level == 1)
        {
            $result = Census::where("RunID",$request->RunID)->first();
            $result->update(["edited_flag"=>"S"]);
            $input_exists = $result->getAttributes();
            unset($input_exists["edited_flag"]);
            $input_exists["edited_level"] = $user->level; 
            $record_updated = new CensusUpdated();
            $record_updated->fill($input_exists)->save();
        }

        $input = $request->all();
        $run_id = $input["RunID"];
        unset($input["_token"]);
        unset($input["RunID"]);
        $input_arr = [];
        foreach($input as $k=>$val)
        {
            $input_arr[$k] = is_array($val) ? implode('',$val): $val;
        }
        $input_arr["edited_level"] = $user->level;
        $record_updated = CensusUpdated::where("RunID",$request->RunID)->first();
        $record_updated->update($input_arr);

        return redirect('/census-dashboard');
    }
}
