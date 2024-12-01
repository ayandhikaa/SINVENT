<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BARANG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{!! asset('assets/css/entry-edit.css') !!}" rel="stylesheet">
</head>
<body>
    <!-- Content Area -->
    <div class="container mt-4">
        <!-- Header Row -->
        <div class="row">
            <div class="col text-center text-white pb-2">
                <h3>Entry Barang</h3>
            </div>
        </div>
        <!-- End Header Row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Card Component -->
            <div class="card border-1 shadow-sm rounded">
                <!-- Card Body -->
                <div class="card-body">
                    <!-- Subheading: Entry barang -->
                    <!-- <div class="row mb-3">
                        <h4>Entry barang</h4>
                    </div> -->
                    <!-- End Subheading -->

                    <!-- Form Entry -->
                    <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Field: merk -->
                        <div class="form-floating mb-3">
                            <input type="text" id="merk" name="merk" class="form-control @error('merk') is-invalid @enderror" placeholder="merk" value="{{ old('merk') }}">
                            <label for="merk">merk</label>
                            @error('merk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- End Field: merk -->

                        <!-- Field: seri -->
                        <div class="form-floating mb-3">
                            <input type="text" id="seri" name="seri" class="form-control @error('seri') is-invalid @enderror" placeholder="seri" value="{{ old('seri') }}">
                            <label for="seri">Seri</label>
                            @error('seri')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- End Field: seri -->

                        <!-- Field: spesifikasi -->
                        <div class="form-floating mb-3">
                            <input type="text" id="spesifikasi" name="spesifikasi" class="form-control @error('spesifikasi') is-invalid @enderror" placeholder="spesifikasi" value="{{ old('spesifikasi') }}">
                            <label for="spesifikasi">Spesifikasi</label>
                            @error('spesifikasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- End Field: spesifikasi -->

                        <!-- Field: stok -->
                        <div class="form-floating mb-3">
                            <input type="text" id="stok" name="stok" class="form-control @error('stok') is-invalid @enderror" placeholder="stok" value="{{ old('stok') }}">
                            <label for="stok">Stok</label>
                            @error('stok')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- End Field: stok -->

                        <!-- Field: kategori_id -->
                        <div class="mb-3">
                            <select name="kategori_id" class="form-select @error('kategori_id') is-invalid @enderror" aria-label="Default Select Example">
                                @foreach($listKategoriID as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                            @error('kategori_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- End Field: kategori_id -->

                        <!-- Layout for buttons -->
                        <div class="row">
                            <!-- Save and Reset Buttons -->
                            <div class="col">
                                <button type="submit" class="btn btn-primary me-3">SAVE</button>
                                <button type="reset" class="btn btn-warning">RESET</button>
                            </div>
                            
                            <!-- Back Button -->
                            <div class="col text-end">
                                <a href="{{ route('barang.index') }}" class="btn btn-secondary">BACK</a>
                            </div>
                        </div>
                        <!-- End Layout for Buttons -->

                    </form>
                </div>
                <!-- End Card Body -->
            </div>
            <!-- End Card Component -->
        </div>
        <!-- End Content Row -->
    </div>
    <!-- End Content Area -->

    <!-- JavaScript Library -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
