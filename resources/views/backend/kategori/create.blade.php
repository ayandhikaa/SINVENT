<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KATEGORI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{!! asset('assets/css/entry-edit.css') !!}" rel="stylesheet">
</head>
<body>
    <!-- Content Area -->
    <div class="container mt-4">
        <!-- Header Row -->
        <div class="row">
            <div class="col text-center text-white pb-2 pt-4">
                <h3>Entry Kategori</h3>
            </div>
        </div>
        <!-- End Header Row -->
  
        <!-- Content Row -->
        <div class="row pt-5">
            <!-- Card Component -->
            <div class="card border-1 shadow-sm rounded">
                <!-- Card Body -->
                <div class="card-body">
                    <!-- Subheading: Entry Kategori -->
                    <!-- <div class="row mb-3">
                        <h4></h4>
                    </div> -->
                    <!-- End Subheading -->

                    <!-- Form Entry -->
                    <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Field: Deskripsi -->
                        <div class="form-floating mb-3">
                            <input type="text" id="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Deskripsi" value="{{ old('deskripsi') }}">
                            <label for="deskripsi">Deskripsi</label>
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Field: Kategori -->
                        <div class="mb-3">
                            <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" aria-label="Default Select Example">
                                @foreach($listKategori as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                            @error('kategori')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- End Field: Kategori -->

                        <!-- Layout for buttons -->
                        <div class="row">
                            <!-- Save and Reset Buttons -->
                            <div class="col">
                                <button type="submit" class="btn btn-primary me-3">SAVE</button>
                                <button type="reset" class="btn btn-warning">RESET</button>
                            </div>
                            
                            <!-- Back Button -->
                            <div class="col text-end">
                                <a href="{{ route('kategori.index') }}" class="btn btn-secondary">BACK</a>
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
