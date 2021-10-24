<?php

namespace App\Http\Livewire\LaravelExamples;

use Livewire\Component;
use App\Models\Census;

class UserManagement extends Component
{
    public function render()
    {
        $results = Census::getQueriedResult();
        
        return view('livewire.laravel-examples.user-management',compact('results'));
    }
}
