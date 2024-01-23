<!doctype html>
<html lang="en">
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Include Bootstrap CSS and other styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
</style>
</head>
<body>
    
        <!-- Page content -->
        <div id="page-content-wrapper" class="container-fluid">
            <div class="row">
                <div class="col-12">
                <img src="{{ asset('images/logoBOT.png') }}" style="width: 150px">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                <form method="post" action="{{route('login')}}">
                    @csrf
<input type="text" name="email" placeholder="username">
<input type="password" name="password" placeholder="password">
<button type="submit">Login</button>

</form>
                </div>
                
            </div>
            <!-- Your page content goes here -->
           <!-- resources/views/layouts/partials/header.blade.php -->

           </div>
    </div>
    <!-- Include Bootstrap JS and other scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>