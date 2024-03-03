<?php

namespace App\Http\Controllers;

use App\Models\MessageHistory;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validatedData = $request->validate([
            'tiket_id' => 'required|integer',
            'message' => 'required|string'
        ]);

        $message = MessageHistory::create([
            'tiket_id' => $validatedData['tiket_id'],
            'role_id' => session('role'),
            'sender_id' => session('user_id'),
            'chat' => $validatedData['message'],
            'is_flagged' => 0
        ]);

        $tiket = Ticket::with('topik')->find($validatedData['tiket_id']);

        if($tiket->takeover_id == null){
            try{
                $response = Http::post(env('AI_API_LINK', null), [
                    'sessionKey' => $tiket->chat_api_id,
                    'question' => $validatedData['message'],
                    'queryDetail' => [
                        'judul' => $tiket->judul,
                        'deskripsi' => $tiket->deskripsi,
                        'topik' => $tiket->topik->nama,
                        'nama' => session('user_name'),
                    ],
                ]);
        
                $message = MessageHistory::create([
                    'tiket_id' => $validatedData['tiket_id'],
                    'role_id' => 0,
                    'sender_id' => 0,
                    'chat' => $response->json()['output'],
                    'is_flagged' => 0
                ]);
    
                return redirect()->route('pengaduan.edit', $validatedData['tiket_id']);
            } catch (\Throwable $th) {
                return redirect()->route('pengaduan.edit', $validatedData['tiket_id']);
            }
        }

        return redirect()->route('pengaduan.edit', $validatedData['tiket_id']);
       

       

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $message = MessageHistory::where('tiket_id', $id)->with(['sender', 'sender.role'])->get();

        return response()->json($message);
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
