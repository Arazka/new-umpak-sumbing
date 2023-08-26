<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UserController extends Controller 
{
    public function index(Request $request)
    {
        $this->authorize('admin');

        $users = User::orderBy('created_at', 'DESC')->paginate(5);
        return view('admin.account.index', [
            'data' => $users
        ]);
    }

    public function create()
    {
        $this->authorize('admin');
        return view('admin.account.create');
    }

    public function store(UserRequest $request)
    {

        $user = User::create([
            'type' => $request->type,
            'username' => $request->username,
            'password' => Hash::make($request['password'])
        ]);

        // return redirect('admin/dashboard');
        if ($user) {
            return redirect('/admin/account')->with('success','Data akun berhasil ditambahkan!');
        } else {
            return redirect('/admin/create')->with('validationErrors',$user->message);
        }
    }

    public function show($id)
    {
    $this->authorize('admin');
       $user = User::find($id);
    }

    public function edit($id)
    {
        $this->authorize('admin');
        
        $user = User::find($id);

        return view('admin.account.edit', compact('user'));
    }

    public function updated(UserRequest $request, $id)
    {
        $this->authorize('admin');

        $user = User::find($id);

        $user->update([
            'type' => $request->type,
            'username' => $request->username,
            'password' => Hash::make($request['password'])
        ]);

        if ($user) {
            return redirect('/admin/account')->with('success','Data akun berhasil diedit!');
        } else {
            return redirect('/admin/account/{id}/edit')->with('validationErrors',$user->message);
        }
    }

    public function destroy($id)
    {
        $user = User::find($id)->delete();

        if ($user) {
            return redirect('/admin/account')->with('success','Data akun berhasil dihapus!');
        } else {
            return redirect('/admin/account')->with('validationErrors',$user->message);
        }
    }
}
