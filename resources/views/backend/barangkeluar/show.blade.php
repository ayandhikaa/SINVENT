<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BARANG KELUAR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{!! asset('assets/css/show.css') !!}" rel="stylesheet">
  </head>
  <body>
    <!-- awal container -->
     <div class="container">
        <!-- membuat row header -->
         <!-- <div class="row">
            <div class="col text-center mt-3">
                <h3>Laravel CRUD | barangkeluar</h3>
            </div>
         </div> -->
        <!-- akhir row header -->

        <!-- menampilkan detail record table barangkeluar dalam card -->
         <div class="row p-5">
            <div class="col">
              <div class="card bg-purple mt-5">
                <div class=" card-header text-center ">
                  Detail Barang Keluar
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table border-radius">
                      <tr>
                        <td>ID</td>
                        <td>&nbsp;</td>
                        <td>{{ $rsetbarangkeluar->id }}</td>
                      </tr>
                      <tr>
                        <td>Barang</td>
                        <td>&nbsp;</td>
                        <td>{{ $rsetbarangkeluar->merk }} - {{ $rsetbarangkeluar->seri }}</td>
                      </tr>
                      <tr>
                        <td>Tanggal keluar</td>
                        <td>&nbsp;</td>
                        <td>{{ $rsetbarangkeluar->tgl_keluar }}</td>
                      </tr>
                      <tr>
                        <td>Jumlah keluar</td>
                        <td>&nbsp;</td>
                        <td>{{ $rsetbarangkeluar->qty_keluar }}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- tombol back -->
                <div class="row mt-3">
                  <div class="col text-center">
                    <a href="{{ route('barangkeluar.index')}}" class="btn btn-md btn-dark">BACK</a>
                  </div>
                </div>
          <!-- akhir tombol back -->
              </div>
            </div>
          </div>
          <!-- akhir detail record dalam card -->
    </div>
    <!-- akhir container -->

    <!-- Mengakses JavaScript library  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
