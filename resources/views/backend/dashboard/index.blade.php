<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
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
                <h3></h3>
            </div>

        </div>    
        <!-- akhir header  -->


        <!-- membuat row content  -->
        <div class="row">
            <!-- membuat component card border 1, shadow round -->
            <div class="card border-0 shadow-sm rounded">
                <!-- body component card -->
                
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