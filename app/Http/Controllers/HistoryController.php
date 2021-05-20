<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;

class HistoryController extends Controller
{
    public function index()
    {
        $data = History::select(
            'created_at',
            'nama',
            'aktivitas'
        )->orderBy('created_at', 'DESC')->get();
        return view('menu_admin.history', ['data'=>$data]);
    }
    
    public function create()
    {
    }
    
    public function store(Request $request)
    {
    }
    
    public function show($id)
    {
    }
    
    public function edit($id)
    {
    }
    
    public function update(Request $request, $id)
    {
    }
    
    public function destroy($id)
    {
    }
}