<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//mengakses library query builder
use Illuminate\Support\Facades\DB;
use App\Models\barang;
use App\Models\barangmasuk;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //mendeteksi kondisi apakah ada searching
        if (request('search')){
            $rsetbarang = DB::table('barang')       ->join('kategori', 'barang.kategori_id', "=", "kategori.id", 'left')
                                                    ->select('barang.id',
                                                            'barang.merk',
                                                            'barang.seri',
                                                            'barang.spesifikasi',
                                                            'barang.stok',
                                                            'barang.kategori_id',
                                                            'kategori.deskripsi'
                                                        )
                                                ->paginate(2);
        } else { //tidak ada searching
            //query mengakses table barang
            $rsetbarang = DB::table('barang')   ->join('kategori', 'barang.kategori_id', "=", "kategori.id", 'left')
                                                ->select('barang.id',
                                                        'barang.merk',
                                                        'barang.seri',
                                                        'barang.spesifikasi',
                                                        'barang.stok',
                                                        'barang.kategori_id',
                                                        'kategori.deskripsi'
                                                            )
                                                ->paginate(2);
        }

            //mengirim data ke view barang.index, menyertakan object $rsetbarang
            return view('backend.barang.index', compact('rsetbarang'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch the list of categories from the 'kategori' table, with 'id' as the key and 'name' as the value.
        $listKategoriID = \App\Models\Kategori::pluck('deskripsi', 'id')->toArray();
        
        // Add an empty option for the dropdown
        $listKategoriID = ['' => 'Pilih Kategori'] + $listKategoriID;

        // Return the 'create' view with the categories list
        return view('backend.barang.create', compact('listKategoriID'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate data
        $request->validate([
            'merk' => 'required',
            'seri' => 'required',
            'spesifikasi' => 'required',
            'stok' => 'required',
            'kategori_id' => 'required'
        ]);
    
        // Create new barang record
        $barang = barang::create([
            'merk'         => $request->merk,
            'seri'         => $request->seri,
            'spesifikasi'  => $request->spesifikasi,
            'stok'         => $request->stok,
            'kategori_id'  => $request->kategori_id
        ]);
    
        // Redirect back to index with success message
        return redirect()->route('barang.index')->with(['success' => 'Data berhasil disimpan!']);
    }
    


    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    // Ambil data dari tabel 'barang'
    $rsetbarang = DB::table('barang')
    ->join('kategori', 'barang.kategori_id', "=", "kategori.id", 'left')
    ->select('barang.id',
            'barang.merk',
            'barang.seri',
            'barang.spesifikasi',
            'barang.stok',
            'barang.kategori_id',
            'kategori.deskripsi'
            )
        ->where('barang.id', $id) // Kondisi untuk mengambil data berdasarkan ID
        ->first();

    // Mengakses view barang.blade.php pada folder barang, disertai recordset $rsetbarang
    return view('backend.barang.show', compact('rsetbarang'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $listKategoriID = $listKategoriID = \App\Models\Kategori::pluck('deskripsi', 'id')->toArray();

    $rsetbarang = barang::find($id);

    return view('backend.barang.edit', compact('rsetbarang','listKategoriID'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id' => 'required',
            'merk' => 'required',
            'seri' => 'required',
            'spesifikasi' => 'required',
            'stok' => 'required',
            'kategori_id' => 'required',
        ]);

        $rsetbarang = barang::findOrFail($id);
        $rsetbarang->update($request->all());

        return redirect()->route('backend.barang.index')->with(['success' => 'data berhasil disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
            $rseKategori = barang::findorFail($id);
           
            $rseKategori->delete();
            return redirect()->route('barang.index')->with(['Success' => 'Berhasil dihapus']);
        }
        
}  

