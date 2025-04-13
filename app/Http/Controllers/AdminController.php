<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Tampilkan semua admin
    public function index()
    {
        $users = User::where('role', 'admin')->get();
        return view('admin.index', compact('users'));
    }

    // Simpan admin baru
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'admin',
        ]);

        return redirect()->route('admin.index')->with('success', 'Admin berhasil ditambahkan!');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Cari data berdasarkan nama, email, atau role
        $users = User::where('name', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->orWhere('role', 'LIKE', "%{$query}%")
            ->paginate(10)
            ->appends($request->all()); // Menjaga query string saat berpindah halaman

        return view('admin.index', compact('users'));
    }
}
