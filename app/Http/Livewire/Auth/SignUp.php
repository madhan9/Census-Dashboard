<?php

namespace App\Http\Livewire\Auth;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Validator;

class SignUp extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email:rfc,dns|unique:users',
        'password' => 'required|min:6'
    ];

    public function mount() {
        if(auth()->user()){
            redirect('/dashboard');
        }
    }

    public function register(Request $request) {
        $validated = Validator::make($request->all(),$this->rules);
     
        if ($validated->fails()) {
            return redirect('/sign-up')
                    ->withErrors($validated)
                    ->withInput();
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        auth()->login($user);

        return redirect('/dashboard');
    }

    public function render()
    {
        return view('livewire.auth.sign-up');
    }
}
