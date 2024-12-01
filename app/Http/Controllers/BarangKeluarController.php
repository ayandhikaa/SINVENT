<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//mengakses library query builder
use Illuminate\Support\Facades\DB;
use App\Models\barangkeluar;
use App\Models\barang;

class barangkeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //mendeteksi kondisi apakah ada searching
            // If searching is provided, perform the query with filtering
            if (request('search')) {
                $rsetbarangkeluar = DB::table('barangkeluar')
                    ->join('barang', 'barangkeluar.barang_id', '=', 'barang.id', 'left')
                    ->select(
                        'barangkeluar.id',
                        'barangkeluar.tgl_keluar',
                        'barangkeluar.qty_keluar',
                        'barangkeluar.barang_id',
                        'barang.merk',
                        'barang.seri'
                    )
                    ->paginate(2);
            } else {
                // If no search, fetch all items with pagination
                $rsetbarangkeluar = DB::table('barangkeluar')
                    ->join('barang', 'barangkeluar.barang_id', '=', 'barang.id', 'left')
                    ->select(
                        'barangkeluar.id',
                        'barangkeluar.tgl_keluar',
                        'barangkeluar.qty_keluar',
                        'barangkeluar.barang_id',
                        'barang.merk',
                        'barang.seri'
                    )
                    ->paginate(2);
            }

            // Pass the result to the view
            return view('backend.barangkeluar.index', compact('rsetbarangkeluar'));


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
        return view('backend.barangkeluar.create', compact('listbarangID'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'qty_keluar' => 'required|integer|min:1',
            'barang_id' => 'required|exists:barang,id',
            'tgl_keluar' => 'required|date',  // Validate date format
        ]);
    
        // Fetch the barang data based on the ID
        $barang = \App\Models\barang::findOrFail($request->barang_id);
    
        // Check if the stock is sufficient
        if ($barang->stok < $request->qty_keluar) {
            return redirect()->back()->withErrors(['qty_keluar' => 'Stok barang tidak mencukupi!']);
        }
    
        // Insert the data into the 'barangkeluar' table, not 'barang'
        \App\Models\barangkeluar::create([
            'tgl_keluar' => $request->tgl_keluar,  // Correct field for the 'barangkeluar' table
            'qty_keluar' => $request->qty_keluar,
            'barang_id' => $request->barang_id,
        ]);
    
        // Update the stock of the barang
        $barang->stok -= $request->qty_keluar;
        $barang->save();
    
        // Redirect with a success message
        return redirect()->route('barangkeluar.index')->with(['success' => 'Data berhasil disimpan dan stok diperbarui!']);
    }
    
    
    


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Ambil data dari tabel 'barangkeluar'
        $rsetbarangkeluar = DB::table('barangkeluar')
            ->join('barang', 'barangkeluar.barang_id', '=', 'barang.id') // Join dengan tabel 'barang'
            ->select(
                'barangkeluar.id',
                'barangkeluar.tgl_keluar',
                'barangkeluar.qty_keluar',
                'barangkeluar.barang_id',
                'barang.merk', // Ambil merk barang
                'barang.seri'  // Ambil seri barang
            )
            ->where('barangkeluar.id', $id) // Kondisi untuk mengambil data berdasarkan ID
            ->first();
    
        // Kirim data ke view
        return view('backend.barangkeluar.show', compact('rsetbarangkeluar'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $listbarangID = $listbarangID = \App\Models\barang::pluck('merk', 'seri', 'id')->toArray();

    $rsetbarangkeluar = barangkeluar::find($id);

    return view('backend.barangkeluar.edit', compact('rsetbarangkeluar','listbarangID'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tgl_keluar' => 'required',
            'qty_keluar' => 'required',
            'barang_id' => 'required',
        ]);

        $rsetbarangkeluar = barangkeluar::find($id);
        $rsetbarangkeluar->update($request->all());

        return redirect()->route('barangkeluar.index')->with(['success' => 'data berhasil disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
            $rsebarang = barangkeluar::findorFail($id);
            $rsebarang->delete();
            return redirect()->route('barangkeluar.index')->with(['Success' => 'Berhasil dihapus']);
        }
}  

