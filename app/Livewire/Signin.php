<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Signin extends Component
{
    public $username;
    public $password;
    public $errorUsername;
    public $errorPassword;
    public $error = null;

    public function signin() {
        $this->errorUsername = null;
        $this->errorPassword = null;
        $this->error = null;

        $validator = Validator::make([
            'username' => $this->username,
            'password' => $this->password
        ],[
            'username' => 'required',
            'password' => 'required'
        ]);

    if ($validator->fails()) {
        $this->errorUsername = $validator->errors()->get('username')[0] ?? null;
        $this->errorPassword = $validator->errors()->get('password')[0] ?? null;
    } else { 
       $user = User::where('name', $this->username)
       
       ->first();
       
       if ($user && Hash::check($this->password, $user->password)) {
        session()->put('user_id', $user->id);
        session()->put('user_name', $user->name);
        session()->put('level', $user->level);
        $this->redirect('/dashboard');
       } else {
        $this->error = 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง';
       }
    }
}
    public function render()
    {
        return view('livewire.signin');
    }
}
/* หลังใส่  use Illuminate\Support\Facades\Hash; ไม่ใช่ Day15 35:00min */
/*         $user = User::where('name', $this->username)
             ->where('password', $this->password) 
            ->first();

        if (!$user) {
            $this->error = 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง';
        } else {
            session()->put('user_id', $user->id);
            session()->put('user_name', $user->name);
            $this->redirect('/dashboard');
        } */ /* เขียนใหม่ให้ใช้ Hash  */