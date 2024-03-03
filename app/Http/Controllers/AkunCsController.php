<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AkunCsController extends Controller
{
 /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(session('role') == 1){
            $akun = User::where('role_id', '>', 2)->get();
        }else if(session('role') > 2){
            $akun = User::where('role_id', session('role'))->get();
        }

        $widget = [
            $akun->count(),
        ];

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
        return view("apps.detail-akun", [
            'role' => Role::all(),
            'nt' => 'cs'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
                'nim' => 'required|string|unique:users,nim',
                'level' => 'nullable|sometimes|integer',
                'role' => 'sometimes|integer'
            ]);

            if(session('role') != 1 && $validatedData['role'] <= 2){
                return back()->with('error', 'An error occurred.');
            }

            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'level' => null,
                'role_id' => $validatedData['role'],
                'nim' => $validatedData['nim'],
            ]);

            $user->save();

            return redirect()->route('akun-cs.index')->with('success', 'Akun Mahasiswa baru telah dibuat.');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred.');
        }
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
        $akun = User::find($id);
        $role = Role::all();
        return view("apps.detail-akun", [
            'akun' => $akun,
            'role' => $role,
            'nt' => 'cs'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'nullable|string',
                'email' => 'nullable|email',
                'password' => 'nullable|min:6',
                'nim' => 'nullable|sometimes|string',
                'level' => 'nullable|sometimes|integer',
                'role' => 'sometimes|integer'
            ]);

            $user = User::find($id);

            if($user == null){
                return back()->with('error', 'An error occurred.');
            }

            if(session('role') != 1 && $validatedData['role'] <= 2){
                return back()->with('error', 'An error occurred.');
            }

            $userData = [
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'level' => null,
                'role_id' => $validatedData['role'],
                'nim' => $validatedData['nim'],
            ];
    
            if (isset($validatedData['password'])) {
                $userData['password'] = Hash::make($validatedData['password']);
            }
    
            $user->update($userData);

            return redirect()->route('akun-cs.index')->with('success', 'Akun Mahasiswa berhasil diedit.');
        } catch (ValidationException $e) {
            dd($e->errors());
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if($user == null){
            return back()->with('error', 'An error occurred.');
        }

        $user->delete();

        return redirect()->route('akun-cs.index')->with('success', 'Akun Mahasiswa berhasil dihapus.');
    }
}
