<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//mengakses library query builder
use Illuminate\Support\Facades\DB;
use App\Models\barangmasuk;
use App\Models\barang;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //mendeteksi kondisi apakah ada searching
        if (request('search')){
            $rsetbarangmasuk = DB::table('barangmasuk')       ->join('barang', 'barangmasuk.barang_id', "=", "barang.id", 'left')
                                                    ->select('barangmasuk.id',
                                                            'barangmasuk.tgl_masuk',
                                                            'barangmasuk.qty_masuk',
                                                            'barangmasuk.barang_id',
                                                            'barang.merk',
                                                            'barang.seri'
                                                        )
                                                ->paginate(2);
        } else { //tidak ada searching
            //query mengakses table barangmasuk
            $rsetbarangmasuk = DB::table('barangmasuk')   ->join('barang', 'barangmasuk.barang_id', "=", "barang.id", 'left')
                                                ->select('barangmasuk.id',
                                                        'barangmasuk.tgl_masuk',
                                                        'barangmasuk.qty_masuk',
                                                        'barangmasuk.barang_id',
                                                        'barang.merk',
                                                        'barang.seri'
                                                            )
                                                ->paginate(2);
        }

            //mengirim data ke view barangmasuk.index, menyertakan object $rsetbarangmasuk
            return view('backend.barangmasuk.index', compact('rsetbarangmasuk'));

    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch the list of barang with merk and seri combined
        $listbarangID = \App\Models\barang::select(DB::raw("id, CONCAT(merk, ' - ', seri) as name"))
            ->pluck('name', 'id')
            ->toArray();
    
        // Add an empty option for the dropdown
        $listbarangID = ['' => 'Pilih Barang'] + $listbarangID;
    
        // Return the 'create' view with the categories list
        return view('backend.barangmasuk.create', compact('listbarangID'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    
    // validasi data
    $request->validate([
        'qty_masuk' => 'required',
        'barang_id' => 'required|exists:barang,id',
    ]);

    // Ambil data barang berdasarkan ID
    $barang = \App\Models\barang::findOrFail($request->barang_id);

    barangmasuk::create([
        'tgl_masuk'         =>$request->tgl_masuk,
        'qty_masuk'         =>$request->qty_masuk,
        'barang_id'         =>$request->barang_id,
    ]);



    // redirect ke index
    return redirect()->route('barangmasuk.index')->with(['success' => 'data berhasil disimpan!']);
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Ambil data dari tabel 'barangmasuk'
        $rsetbarangmasuk = DB::table('barangmasuk')
            ->join('barang', 'barangmasuk.barang_id', '=', 'barang.id') // Join dengan tabel 'barang'
            ->select(
                'barangmasuk.id',
                'barangmasuk.tgl_masuk',
                'barangmasuk.qty_masuk',
                'barangmasuk.barang_id',
                'barang.merk', // Ambil merk barang
                'barang.seri'  // Ambil seri barang
            )
            ->where('barangmasuk.id', $id) // Kondisi untuk mengambil data berdasarkan ID
            ->first();
    
        // Kirim data ke view
        return view('backend.barangmasuk.show', compact('rsetbarangmasuk'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $listbarangID = $listbarangID = \App\Models\barang::pluck('merk', 'seri', 'id')->toArray();

    $rsetbarangmasuk = barangmasuk::find($id);

    return view('backend.barangmasuk.edit', compact('rsetbarangmasuk','listbarangID'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tgl_masuk' => 'required',
            'qty_masuk' => 'required',
            'barang_id' => 'required',
        ]);

        $rsetbarangmasuk = barangmasuk::find($id);
        $rsetbarangmasuk->update($request->all());

        return redirect()->route('barangmasuk.index')->with(['success' => 'data berhasil disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
            $rsebarang = barangmasuk::findorFail($id);
            $rsebarang->delete();
            return redirect()->route('barangmasuk.index')->with(['Success' => 'Berhasil dihapus']);
        }
}  

