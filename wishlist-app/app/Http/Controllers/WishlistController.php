<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;  // 🔴 JANGAN LUPA ADD INI DI ATAS

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::where('user_id', Auth::id())->get();
        return view('wishlist.index', compact('wishlists'));
    }

    public function create()
    {
        return view('wishlist.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required|numeric',
            'prioritas' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:5120'
        ]);

        $gambarPath = null;
        
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('wishlist', 'public');
            $gambarPath = Storage::url($path);
        }

        Wishlist::create([
            'user_id' => Auth::id(),
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'link_toko' => $request->link_toko,
            'prioritas' => $request->prioritas,
            'catatan' => $request->catatan,
            'status' => $request->status ? 1 : 0,
            'gambar' => $gambarPath
        ]);

        return redirect('/wishlist')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        return view('wishlist.edit', compact('wishlist'));
    }

    public function update(Request $request, $id)
    {
        $wishlist = Wishlist::findOrFail($id);
        
        $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required|numeric',
            'prioritas' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:5120'
        ]);

        $data = [
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'link_toko' => $request->link_toko,
            'prioritas' => $request->prioritas,
            'catatan' => $request->catatan,
            'status' => $request->status ? 1 : 0
        ];

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($wishlist->gambar) {
                $oldPath = str_replace('/storage/', '', $wishlist->gambar);
                Storage::disk('public')->delete($oldPath);
            }
            
            // Upload gambar baru
            $path = $request->file('gambar')->store('wishlist', 'public');
            $data['gambar'] = Storage::url($path);
        }

        $wishlist->update($data);

        return redirect('/wishlist')->with('success', 'Barang berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        
        // Hapus file gambar juga
        if ($wishlist->gambar) {
            $oldPath = str_replace('/storage/', '', $wishlist->gambar);
            Storage::disk('public')->delete($oldPath);
        }
        
        $wishlist->delete();
        
        return redirect('/wishlist')->with('success', 'Barang berhasil dihapus!');
    }
}