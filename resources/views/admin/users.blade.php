@extends('admin.layouts.admin')

@section('content')
@php
$user = auth()->user();
$users = $users->whereIn('role', ['admin', 'manager', 'cashier', 'kitchen', 'rider']);
@endphp
@if ($user->hasRole('admin'))
<section class="container">
    <div class="row">
        <div class="col-6">
            <h1>List of Users</h1>
        </div>
        <div class="col-6">
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary float-right">Add User</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <input type="text" id="search" placeholder="Search by user">
            <table class="table">
                <thead>
                    <tr>
                        <th>User Email</th>
                        <th>First Name</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->role }}</td>
                        <td><a href="javascript:void(0)">View</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div id="pagination" class="pagination"></div>
        </div>
    </div>
</section>
<script>
    document.getElementById('search').addEventListener('input', function(e) {
        var search = e.target.value.toLowerCase();
        var rows = Array.from(document.querySelectorAll('table tbody tr'));
        rows.forEach(row => {
            var subcatName = row.cells[1].textContent.toLowerCase();
            row.style.display = subcatName.includes(search) ? '' : 'none';
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.simplePagination.js/1.6/jquery.simplePagination.js"></script>
<script>
    $(document).ready(function() {
        var items = $("table tbody tr");
        var numItems = items.length;
        var perPage = 10;
        items.slice(perPage).hide();
        $('#pagination').pagination({
            items: numItems,
            itemsOnPage: perPage,
            cssStyle: "light-theme",
            onPageClick: function(pageNumber) {
                var showFrom = perPage * (pageNumber - 1);
                var showTo = showFrom + perPage;

                items.hide().slice(showFrom, showTo).show();
            }
        });
    });
</script>
@else
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Access Denied</h1>
        </div>
    </div>
</div>
@endif
@endsection