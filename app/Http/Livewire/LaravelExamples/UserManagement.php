<?php

namespace App\Http\Livewire\LaravelExamples;
use Auth;
use Livewire\Component;
use App\Models\Census;
use App\Models\CensusUpdated;

class UserManagement extends Component
{
    public function render()
    {
        $user = Auth::user();
        if($user->level == 1)
            $results = Census::getQueriedResult();
        else
            $results = CensusUpdated::getQueriedResult();
                 
        return view('livewire.laravel-examples.user-management',compact('results'));
    }
}
