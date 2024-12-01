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
    <!-- awal container -->
    <div class="container mt-4">
        <!-- membuat row header -->
        <div class="row mb-4">
            <div class="col text-center text-white pt-3 pb-4">
                <h3>Edit Kategori</h3>
            </div>
        </div>

        <!-- body component card -->
        <div class="card">
            <div class="card-body">
                <!-- sub judul: Edit kategori -->
                <div class="row mb-4">
                    <!-- <div class="col">
                        <h4></h4>
                    </div> -->
                </div>
                
                <!-- form edit record table kategori -->
                <form action="{{ route('kategori.update', $rsetKategori->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    @method('PUT')

                    <!-- Field: Deskripsi -->
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="text" id="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Deskripsi" value="{{ old('deskripsi', $rsetKategori->deskripsi) }}">
                            <label for="deskripsi">Deskripsi</label>

                            <!-- error message untuk deskripsi -->
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Field: Kategori -->
                    <div class="mb-3">
                        <div class="form-floating">
                            <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" aria-label="Default Select Example">
                                @foreach($listKategori as $key => $val)
                                    <option value="{{ $key }}" {{ old('kategori', $rsetKategori->kategori) == $key ? 'selected' : '' }}>{{ $val }}</option>
                                @endforeach
                            </select>
                            <label for="kategori">Kategori</label>

                            <!-- error message untuk kategori -->
                            @error('kategori')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <!-- tombol update dan batal -->
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">
                            UPDATE
                        </button>
                        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
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
