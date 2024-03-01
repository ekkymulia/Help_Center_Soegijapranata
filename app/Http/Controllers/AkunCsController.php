<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AkunCsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (session('level') == null) {
            return view("index");
        }

        if (session('role') == 2) {
            return view("index");
        }
    
        if (session('role') == 1) {
            $akun = User::where('role_id', '!=', 2)->get();
            $widget = [
                $akun->count()
            ];
        } else {
            $akun = User::where('role_id', session('role'))->get();
            $widget = [
                $akun->count()
            ];
        }
    
        return view("apps.akun-cs", [
            'akun' => $akun,
            'widget' => $widget
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("apps.detail-akun");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
