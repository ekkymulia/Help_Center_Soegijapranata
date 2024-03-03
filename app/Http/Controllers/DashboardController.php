<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(session('role') == 1){
            $data = Ticket::all();
        } else if(session('role') == 2){
            $data = Ticket::where('user_id', session('user_id'))->get();
        } else if(session('role') > 2){
            $role = session('role');

            $data = Ticket::whereHas('topik', function ($query) use ($role) {
                $query->where('cs_assigned', $role);
            })->get();
        }

        $widget = [
            $data->count(),
            $data->where('status_layanan', 'diproses')->count(),
            $data->where('status_layanan', 'ditutup')->count(),
            $data->where('takeover_id', null)->count()
        ];
        return view("index",[
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
        //
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
