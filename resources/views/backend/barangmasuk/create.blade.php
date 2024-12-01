<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BARANG MASUK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{!! asset('assets/css/entry-edit.css') !!}" rel="stylesheet">
</head>
<body>
    <!-- Content Area -->
    <div class="container mt-5">
        <!-- Header Row -->
        <div class="row">
            <div class="col text-center text-white pb-2 mb-4">
                <h3>Entry Barang Masuk</h3>
            </div>
        </div>
        <!-- End Header Row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Card Component -->
            <div class="card border-1 shadow-sm rounded">
                <!-- Card Body -->
                <div class="card-body">
                    <!-- Subheading: Entry barangmasuk -->
                    <!-- <div class="row mb-3">
                        <h4>Entry barangmasuk</h4>
                    </div> -->
                    <!-- End Subheading -->

                    <!-- Form Entry -->
                    <form action="{{ route('barangmasuk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Field: barang -->
                        <div class="mb-3">
                            <label for="barang_id" class="form-label">Barang</label>
                            <select name="barang_id" id="barang_id" class="form-select @error('barang_id') is-invalid @enderror">
                                @foreach($listbarangID as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                            @error('barang_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- End Field: barang -->

                        <!-- Field: tanggal masuk -->
                        <div class="form-floating mb-3">
                            <input type="date" id="tgl_masuk" name="tgl_masuk" class="form-control @error('tgl_masuk') is-invalid @enderror" placeholder="tgl_masuk" value="{{ old('tgl_masuk') }}">
                            <label for="tgl_masuk">Tanggal Masuk</label>
                            @error('tanggal masuk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- End Field: tanggal masuk -->

                        <!-- Field: Jumlah Masuk -->
                        <div class="form-floating mb-3">
                            <input type="text" id="qty_masuk" name="qty_masuk" class="form-control @error('qty_masuk') is-invalid @enderror" placeholder="Jumlah Masuk" value="{{ old('qty_masuk') }}">
                            <label for="qty_masuk">Jumlah Masuk</label>
                            @error('qty_masuk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- End Field: Jumlah Masuk -->

                        <!-- Layout for buttons -->
                        <div class="row">
                            <!-- Save and Reset Buttons -->
                            <div class="col">
                                <button type="submit" class="btn btn-primary me-3">SAVE</button>
                                <button type="reset" class="btn btn-warning">RESET</button>
                            </div>
                            
                            <!-- Back Button -->
                            <div class="col text-end">
                                <a href="{{ route('barangmasuk.index') }}" class="btn btn-secondary">BACK</a>
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
