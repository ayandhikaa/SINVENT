<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//mengakses library query builder
use Illuminate\Support\Facades\DB;
use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // //mengakses selruh record kategori, disimpan pada object $kategori
        // $kategori= DB::table('kategori')->get();

        // // //return $kategori;
        // // return view('kategori.index', compact('kategori'));

        // // //method index otomatis tampil, walaupun tanpa dipanggil index
        // // //mengakses view
        // // return view('Selamat datang di Kategori');

        // //mengakses tabel kategori
        // // $rsKategori = Kategori::latest();
        // // return kategori;

        // //mengkases tabel kategori dengan quey builder
        // $rsetKategori = DB::table('kategori')->get(); //DB = class, table = method, seluruh record
        // // return $rsetKategori; //menampilkan semua data
        // // return $rsetKategori[0]->deskripsi; //mengambil data index ke 0
        
        // //mengambil 1 data pada seluruh field/column
        // $row = $rsetKategori[1];
        // return $row->id.$row->deskripsi.$row->kategori;

        //menguji tampilan file adm_template.blade.php
        // return view('backend.layouts.adm_template');


        //mengirim data ke view kategori.index, menyertakan object $rsetKategori
        //return view('backend.layouts.kategori.index', compact('rsetKategori'));
        
        //mendeteksi kondisi apakah ada searching
        if (request('search')){
            $rsetKategori = DB::table('kategori')->select('id',
                                                            'deskripsi',
                                                            'kategori',
                                                            DB::raw('ketKategori(kategori) as ket'))
                                                ->where('id', 'like', $request->search) //mencari data berdasarkan id yang dicari 
                                                ->orWhere('deskripsi','like','%'.$request->search.'%') //mencari data berdasarkan deskripsi yang dicari
                                                ->paginate(2);
        } else { //tidak ada searching
            //query mengakses table kategori
            $rsetKategori = DB::table('kategori')->select('id',
                                                            'deskripsi',
                                                            'kategori',
                                                            DB::raw('ketKategori(kategori) as ket'))
                                                ->paginate(2);
        }

            //mengirim data ke view kategori.index, menyertakan object $rsetKategori
            return view('backend.kategori.index', compact('rsetKategori'));

    }

    // In Kategori model
    public function barang()
    {
        return $this->hasMany(barang::class);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Daftar kategori disimpan pada variabel $listKategori
        $listKategori = [''=>'Pilih Kategori',
                                'M'=>'Modal',
                                'A'=>'Alat',
                                'BHP'=>'Bahan Habis Pakai',
                                'BTHP'=>'Bahan Tidak Habis Pakai'
        ];

    //mengakses view kategori.create disertai variabel $listKategori
    return view('backend.kategori.create', compact('listKategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi data yang dikirim form
        $request->validate([
            'deskripsi' => 'required',
            'kategori' => 'required'
        ]);
        //akhir validasi data yang dikirim dari form

        //menyimpan record data memanfaatkan model kategori method create()
        Kategori::create([
            'deskripsi'             => $request->deskripsi,
            'kategori'              => $request->kategori
        ]);
        //akhir menyimpan record data memanfaatkan model kategori method create()

        //redirect to index
        return redirect()->route('kategori.index')->with('success', 'Data Berhasil Disimpan!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    // Ambil data dari tabel 'kategori'
    $rsetKategori = DB::table('kategori')
        ->select(
            'id',
            'deskripsi',
            'kategori',
            DB::raw('ketKategori(kategori) as ket')
        )
        ->where('id', $id) // Kondisi untuk mengambil data berdasarkan ID
        ->first();

    // Mengakses view kategori.blade.php pada folder kategori, disertai recordset $rsetKategori
    return view('backend.kategori.show', compact('rsetKategori'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $listKategori = [''=>'Pilih Kategori',
                                'M'=>'Modal',
                                'A'=>'Alat',
                                'BHP'=>'Bahan Habis Pakai',
                                'BTHP'=>'Bahan Tidak Habis Pakai'
    ];

    $rsetKategori = Kategori::find($id);

    return view('backend.kategori.edit', compact('rsetKategori','listKategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'deskripsi' => 'required',
            'kategori' => 'required',
        ]);

        $rsetKategori = Kategori::find($id);
        $rsetKategori->update($request->all());

        return redirect()->route('kategori.index')->with(['success' => 'data berhasil disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        if (DB::table('barang')->where('kategori_id', $id)->exists()){
            return redirect()->route('kategori.index')->with(['Gagal' => 'Gagal dihapus!']);
        } else {
            $rseKategori = Kategori::find($id);
            $rseKategori->delete();
            return redirect()->route('kategori.index')->with(['Success' => 'Berhasil dihapus']);
        }
    }

    
} 
