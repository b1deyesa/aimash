<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth as AuthModels;

class Auth extends Component
{
    public $code;
    public $email = 'test@example.com';
    public $password = 'magox1905';

    public function auth()
    {
        // validasi kode
        if ($this->code !== '431905') {
            $this->addError('code', 'Kode salah!');
            return;
        }

        // cek kredensial
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (AuthModels::attempt($credentials)) {
            session()->regenerate();
            return redirect()->route('index');
        }

        // jika login gagal
        $this->addError('email', 'Email atau password salah.');
    }

    public function render()
    {
        return view('livewire.auth');
    }
}
