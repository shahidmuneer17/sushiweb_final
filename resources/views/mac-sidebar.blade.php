@extends('maccount-head')

@section('mac-body')

<style>
    ul {
        list-style: none;
        padding: 0;
        margin: 0;
        
    }

    li {
        margin: 0;
        padding: 5px;
    }

    .btnorder {
        width: 100%;
        display: flex;
        text-decoration: none;
        padding: 5px 10px;
        border: 1px solid var(--sec-color);
        color: var(--sec-color);
        font-size: 14px;
    }

    .logoutbtn {
        width: 100%;
        background-color: transparent;
        color: var(--sec-color);
        padding: 5px 10px;
        border: 1px solid var(--sec-color);
        font-size: 14px;
        text-align: left;
    }
</style>

<div class="row">
    <div class="col-md-3">
        <ul>
           
        <li>
                <a class="btnorder" href="{{ route('my-orders') }}">Historique de commandes</a>
            </li>
            <li>
                <a class="btnorder" href="{{ route('profile') }}">Mes informations personnelles</a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logoutbtn">Déconnexion</button>
                </form>
            </li>
        </ul>
    </div>
    <div class="col-md-9">
        @yield('mac-content')
    </div>
</div>

@endsection