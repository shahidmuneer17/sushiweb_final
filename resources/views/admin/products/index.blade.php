@extends('admin.layouts.admin')

@section('content')
<section class="container">
<div class="row">
    <div class="col-12">
        
    <h1>List of Products</h1>
    </div>
   </div>
<div class="row">
    <div class="col-12">
    <input type="text" id="search" placeholder="Search by subcategory name">
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product Categories</th>
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->prod_name }}</td>
                    <td>{{ optional($product->subcategory)->subcat_name ?? '' }}</td>
                    <td><a href="{{ route('admin.edit-product', $product->prod_id) }}">Edit</a></td>
                    

                    <!-- Add more columns as needed -->
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.min.js" integrity="sha512-9Dh726RTZVE1k5R1RNEzk1ex4AoRjxNMFKtZdcWaG2KUgjEmFYN3n17YLUrbHm47CRQB1mvVBHDFXrcnx/deDA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/simplePagination.css" integrity="sha512-FfTVWdzfGKzHN/vNqOpbwqpNCKkzUK2yBYyl1lrEpzOgbUC/aTKUUrWAOx8/JMcIOIVMvKhIMC6rJQF1ltUJeQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
@endsection