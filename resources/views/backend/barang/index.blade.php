<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BARANG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    @extends('backend.layouts.adm_template')

    @section('page')

    <!-- awal container -->
    <div class="container">
        <!-- awal header  -->
        <div class="row">
            <div class="col text-center mb-3">
                <h3 class="fw-bold">Barang</h3>
            </div>

        </div>    
        <!-- akhir header  -->


        <!-- membuat row content  -->
        <div class="row">
            <!-- membuat component card border 1, shadow round -->
            <div class="card border-0 shadow-sm rounded">
                <!-- body component card -->
                <div class="card-body">
                    <!-- menambah baris untuk tombol entry dan form searching -->
                    <div class="row">
                        <!-- membuat column untuk tombol entry -->
                        <div class="col">
                            <!-- tombol entry -->
                            <a href="{{route('barang.create')}}" type="button" class="btn btn-primary">Entry</a>
                            <!-- akhir tombol entry -->
                        </div>
                        <!-- akhir column untuk tombol entry -->

                        <!-- membuat column untuk form searching -->
                        <div class="col">
                            <!-- form searching -->
                            <form action="/barang" method="GET">
                                @csrf <!--enkripsi search -->
                                <div class="input-group mb-3">
                                    <input type="text" 
                                    name="search" 
                                    class="form-control" 
                                    placeholder="Cari Barang" 
                                    aria-label="Recipient's username" 
                                    aria-description="button-addon2">
                                    <button class="btn btn-outline-secondary" 
                                    type="submit" 
                                    id="button-addon2">
                                    Search
                                </button>
                                </div>
                            </form>
                            <!-- akhir form searching -->
                        </div>
                        <!-- akhir column untuk form searching -->
                    </div>
                    <!-- akhir baris tombol entry dan form searching -->

                    <!-- awal baris table -->
                    <div class="row">
                    <!-- awal kolom -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>MERK</th>
                                    <th>SERI</th>
                                    <th>SPESIFIKASI</th>
                                    <th>STOK</th>
                                    <th>KATEGORI</th>
                                    <th class="text-center">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- membaca data recordset barang per record, disimpan pada object $row -->
                                @forelse($rsetbarang as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->merk}}</td>
                                    <td>{{$row->seri}}</td>
                                    <td>{{$row->spesifikasi}}</td>
                                    <td>{{$row->stok}}</td>
                                    <td>{{$row->deskripsi}}</td>
                                    
                                    <!-- awal tombol aksi -->
                                    <td class="text-center">
                                    <form action="{{ route('barang.destroy',$row->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">

                                        <!-- tombol show -->
                                        <a href="{{ route('barang.show',$row->id) }}" class="btn btn-sm btn-dark "><i class="fas fa-eye"></i></a>
                                        
                                        <!-- tombol edit -->
                                        <a href="{{ route('barang.edit',$row->id) }}" class="btn btn-sm btn-primary "><i class="fas fa-pencil-alt"></i></a>
                                        
                                        @csrf <!-- hidden token -->
                                        @method('DELETE') <!-- tambahkan untuk delete form method POST -->
                                        <button type="submit" class="btn btn-sm btn-danger "><i class="fas fa-trash-alt"></i></button> 
                                    </form>
                                    <!-- akhir tombol aksi -->
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">Belum ada record data</td>
                                </tr>
                                @endforelse
                                <!-- akhir membaca data -->
                            </tbody>
                        </table>
                    </div>
                    <!-- akhir kolom -->

                    <!-- menampilkan pagination / isi data pada suatu halaman -->
                    <div class="d-flex justify-content-center">
                        {{ $rsetbarang->links() }}
                    </div>
                </div>

                    <!-- akhir baris table -->

                </div> <!-- akhir card body -->
            </div>
        </div>
        <!-- akhir row content  -->
        @endsection


        <!-- awal footer  -->
        <div class="row">


        </div>
        <!-- akhir footer  -->


    </div>
    <!-- akhir container -->

    

    <!-- javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>