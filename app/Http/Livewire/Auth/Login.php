<?php

namespace App\Http\Livewire\Auth;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\User;
use Validator;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember_me = false;

    protected $rules = [
        'email' => 'required|email:rfc,dns',
        'password' => 'required',
    ];

    public function mount() {
        if(auth()->user()){
            redirect('/dashboard');
        }
        //$this->fill();
    }

    public function login(Request $request) {
        //$credentials = $this->validate();
        $validated = Validator::make($request->all(),$this->rules);
     
        if ($validated->fails()) {
            return redirect('/login')
                    ->withErrors($validated)
                    ->withInput();
        }
        if(auth()->attempt(['email' => $request->email, 'password' => $request->password], $request->remember_me)) {
            $user = User::where(["email" => $request->email])->first();
            auth()->login($user, $request->remember_me);
            return redirect()->intended('/dashboard');        
        }
        else{
            return $this->addError('email', trans('auth.failed')); 
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
