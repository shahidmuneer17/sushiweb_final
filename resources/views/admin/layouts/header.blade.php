<!doctype html>
<html lang="en">
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Include Bootstrap CSS and other styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
#sidebar {
    width: 250px;
    height: 100vh;
    background-color: black!important;
    padding: 20px;
    color: #E4D4BF!important;
    position: fixed; 
}
.list-group-item {
    background-color: transparent;
    border: 0;
    padding: 0;
    margin: 0;
}
.list-group-item a {
    text-decoration: none;
    color: #E4D4BF!important;
    width: 100%;
    height: 100%;
    padding: 10px;
    display: block;
}
.list-group-item a:hover {
background-color: #E4D4BF!important;;
    color: black!important;
    
}
#page-content-wrapper {
    margin-left: 200px;
    padding-left: 60px;
    background-color: #E4D4BF!important;
    min-height: 100vh;
}
</style>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar">
            <!-- Sidebar content goes here -->
            <img src="{{ asset('images/logoBOT.png') }}" style="width: 150px">
            <h5 class="text-center mt-3">Bienvenue!</h5>
            <h5 class="text-center mb-3">{{ auth()->user()->first_name }} </h5>
            <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="/admin/">Tableau de bord</a></li>
            @if(auth()->user()->role != 'rider')
            <li class="list-group-item"><a href="{{ route('admin.orders') }}">Commandes (Takeaway)</a></li>
           @endif
            <li class="list-group-item"><a href="{{ route('admin.orders.delivery') }}">Commandes (Delivery)</a></li>
            <!-- <li class="list-group-item"><a href="{{ route('admin.products.index') }}">Produits</a></li> -->
                @if(auth()->user()->role == 'admin')
                <li class="list-group-item"><a href="{{ route('admin.users') }}">Utilisateurs</a></li>
                @endif
                <!-- <li class="list-group-item"><a href="#">Settings</a></li> -->
                <li class="list-group-item">
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</li>
            </ul>
        </div>
        <!-- Page content -->
        <div id="page-content-wrapper" class="container-fluid">
            <!-- Your page content goes here -->
           <!-- resources/views/layouts/partials/header.blade.php -->

