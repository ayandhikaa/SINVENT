<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BARANG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{!! asset('assets/css/entry-edit.css') !!}" rel="stylesheet">
    <style>

    
    </style>
</head>
<body>
    <!-- awal container -->
    <div class="container mt-4 ">
        <!-- membuat row header -->
        <div class="row mb-4">
            <div class="col text-center text-white">
                <h3>Edit Barang</h3>
            </div>
        </div>

        <!-- body component card -->
        <div class="card">
            <div class="card-body">
                <!-- sub judul: Edit barang -->
                <!-- <div class="row mb-4">
                    <div class="col">
                        <h4>Edit barang</h4>
                    </div>
                </div> -->
                
                <!-- form edit record table barang -->
                <form action="{{ route('barang.update', $rsetbarang->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    @method('PUT')
                    <!-- Field: merk -->
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="text" id="merk" name="merk" class="form-control @error('merk') is-invalid @enderror" placeholder="merk" value="{{ old('merk', $rsetbarang->merk) }}">
                            <label for="merk">Merk</label>

                            <!-- error message untuk merk -->
                            @error('merk')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="text" id="seri" name="seri" class="form-control @error('seri') is-invalid @enderror" placeholder="seri" value="{{ old('seri', $rsetbarang->seri) }}">
                            <label for="seri">Seri</label>

                            <!-- error message untuk seri -->
                            @error('seri')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="text" id="spesifikasi" name="spesifikasi" class="form-control @error('spesifikasi') is-invalid @enderror" placeholder="spesifikasi" value="{{ old('spesifikasi', $rsetbarang->spesifikasi) }}">
                            <label for="spesifikasi">Spesifikasi</label>

                            <!-- error message untuk spesifikasi -->
                            @error('spesifikasi')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                    <div class="form-floating">
                        <div class="form-control-plaintext" id="stok">
                            {{ old('stok', $rsetbarang->stok) }}
                        </div>
                        <label for="stok">Stok</label>

                        <!-- error message untuk stok -->
                        @error('stok')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    </div>
                    <div class="form-floating mb-3">
                    <select name="kategori_id" class="form-select" aria-label="Default select example">
                        <option value="">Pilih Kategori</option> <!-- Opsi kosong -->
                                @foreach($listKategoriID as $key => $val)
                                    <option value="{{ $key }}" {{ $key = $rsetbarang->kategori_id ? 'selected' : '' }}>
                                    {{ $val }}
                                    </option>
                                @endforeach
                    </select>
                                        <!-- Label yang muncul di atas form ketika floating -->
                    <label for="kategori_id">Kategori</label>

                        @error('kategori_id')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- tombol update dan batal -->
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">
                            UPDATE
                        </button>
                        <a href="{{ route('barang.index') }}" class="btn btn-secondary">
                            BATAL
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- akhir container -->

    <!-- JavaScript Library -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>