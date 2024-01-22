<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminDusun extends Component
{
    use WithPagination;

    public $ids;
    public $username;
    public $email;
    public $password;
    public $password_confirmation;
 
    protected $rules = [
        'username' => 'required|min:6',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8',
        'password_confirmation' => 'required|same:password|min:8',
    ];
 
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function clearForm(){
        $this->username = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
    }
 
    public function saveAdminDusun()
    {
        
        $validatedData = $this->validate();
        $validatedData['tipe_admin'] = 'dusun';
        
        User::create($validatedData);
        $this->clearForm();
        $this->emit('tambahModal', ['message' => 'Akun berhasil ditambahkan!!!']);
    }

    public function detailAdminDusun($id){
        $user = User::find($id);
        $this->ids= $user->id;
        $this->username= $user->username;
        $this->email= $user->email;
        $this->password= $user->password;
        $this->password_confirmation= $user->password_confirmation;
    }

    public function updateAdminDusun(){

        $this->rules = [
            'username' => 'required|min:6',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];

        $data_update = $this->validate();
        
        User::where('id', $this->ids)->update($data_update);
        $this->clearForm();
        $this->emit('editModal', ['message' => 'Akun dengan username '.$data_update['username'].' berhasil diupdate!!!']);
    }
    
    public function deleteAdminDusun(){
        User::where('email', $this->email)->delete();
        $this->clearForm();
        $this->emit('hapusModal', ['message' => 'Akun berhasil di hapus!!!']);
    }

    public function render()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(5);
        return view('livewire.admin-dusun', compact('users'))->extends('layouts.master-admin')->section('body');
    }
}
