<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Http; // ✅ TAMBAHAN

class WishlistApiController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::all();
        return response()->json($wishlists);
    }

    public function store(Request $request)
    {
        $wishlist = Wishlist::create([
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'link_toko' => $request->link_toko,
            'prioritas' => $request->prioritas,
            'catatan' => $request->catatan
        ]);

        return response()->json([
            'message' => 'Data berhasil ditambahkan',
            'data' => $wishlist
        ]);
    }

    public function show($id)
    {
        $wishlist = Wishlist::find($id);
        return response()->json($wishlist);
    }

    public function update(Request $request, $id)
    {
        $wishlist = Wishlist::find($id);

        $wishlist->update([
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'link_toko' => $request->link_toko,
            'prioritas' => $request->prioritas,
            'catatan' => $request->catatan
        ]);

        return response()->json([
            'message' => 'Data berhasil diupdate'
        ]);
    }

    public function destroy($id)
    {
        Wishlist::destroy($id);

        return response()->json([
            'message' => 'Data berhasil dihapus'
        ]);
    }

    // 🔥 TAMBAHAN FITUR AUTO PREVIEW
    public function preview(Request $request)
    {
        $link = $request->link;

        $data = [
            'nama_barang' => null,
            'gambar' => null,
            'harga' => null
        ];

        try {
            $response = \Illuminate\Support\Facades\Http::withHeaders([
                'User-Agent' => 'Mozilla/5.0'
            ])->get($link);

            if ($response->successful()) {
                $html = $response->body();

                // 🔥 AMBIL GAMBAR (LEBIH FLEXIBLE)
                preg_match('/property="og:image"\s*content="([^"]+)"/i', $html, $img);

                if (isset($img[1])) {
                    $data['gambar'] = $img[1];
                } else {
                    // fallback ambil img pertama
                    preg_match('/<img[^>]+src="([^">]+)"/i', $html, $img2);
                    if (isset($img2[1])) {
                        $data['gambar'] = $img2[1];
                    }
                }

                // 🔥 AMBIL NAMA
                preg_match('/property="og:title"\s*content="([^"]+)"/i', $html, $title);
                if (isset($title[1])) {
                    $data['nama_barang'] = $title[1];
                }

                // 🔥 AMBIL HARGA (opsional)
                preg_match('/Rp[\s0-9\.]+/i', $html, $price);
                if (isset($price[0])) {
                    $data['harga'] = $price[0];
                }
            }

        } catch (\Exception $e) {}

        return response()->json($data);
    }

    public function ambilGambar(Request $request)
    {
        $url = $request->link;

        try {
            $response = Http::get($url);
            $html = $response->body();

            preg_match('/<meta property="og:image" content="([^"]+)"/', $html, $matches);

            $gambar = $matches[1] ?? null;

            return response()->json([
                'success' => true,
                'gambar' => $gambar
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal ambil gambar'
            ]);
        }
    }
}