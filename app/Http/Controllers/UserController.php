<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        return view('menu_admin.user', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu_admin.form_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user -> nip = $request -> nip;
        $user -> name = $request -> name;
        $user -> email = $request -> email;
        $user -> password = Hash::make($request -> password);
        $user -> no_hp = $request -> no_hp;
        
        $user->assignRole('user');
        $user -> save();
        
        return redirect('/user')->with('success', 'Pembuatan akun baru berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::find($id);
        return view('menu_admin.view_user', ['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('menu_admin.edit_user', ['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $param = $request->all();
        
        $data_user = [
            'name' => $param['name'],
            'email' => $param['email'],
            'nip' => $param['nip'],
            'password' => Hash::make($param['password']),
            'no_hp' => $param['no_hp'],
        ];

        try {
            DB::table('users') -> where('id', '=', $id) -> update($data_user);
                        
            return redirect('/user')->with('success', 'Data akun tersimpan!');
        } catch (\Exception $e) {
            // dd($e);
            return redirect('/user')->with('error', 'Terjadi kesalahan! Data akun tidak tersimpan!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/user')->with('success', 'Akun berhasil dihapus!');
    }
}