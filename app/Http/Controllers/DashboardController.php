<?php
namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil kategori dengan jumlah barang yang terkait
        $kategoriBarang = Kategori::withCount('barang')->get();
    
        // Cek jika data berhasil diambil
        if ($kategoriBarang->isEmpty()) {
            return view('backend.dashboard.index')->with('error', 'No data found.');
        }
    
        // Pisahkan nama kategori dan jumlah barang
        $categories = $kategoriBarang->pluck('deskripsi')->toArray(); // Pastikan field 'deskripsi' ada di database
        $counts = $kategoriBarang->pluck('barang_count')->toArray();
    
        // Kirim data ke view
        return view('backend.dashboard.index', compact('categories', 'counts'));
    }
}    
