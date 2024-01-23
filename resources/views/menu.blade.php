@extends('app')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="container">
    <h1>Menu</h1>

    <div class="row">
        <div class="col-md-3">
            <h3>Categories</h3>
            <ul>
                @foreach($categories as $category)
                    <li>
                        <a href="#" class="category-link" data-cat-id="{{ $category->cat_id }}">
                            {{ $category->cat_name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-3">
            <h3>Subcategories</h3>
            <ul class="subcategory-list">
                <!-- Subcategories will be displayed here using JavaScript -->
            </ul>
        </div>
        <div class="col-md-6">
            <h3>Products</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Composition</th>
                        <th>Allergens</th>
                        <th>SKU</th>
                        <th>Text</th>
                    </tr>
                </thead>
                <tbody class="product-list">
                    <!-- Products will be displayed here using JavaScript -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    jQuery.noConflict();

jQuery(document).ready(function($) {
    // When a category link is clicked, fetch and display subcategories and products
    $('.category-link').click(function () {
        const categoryId = $(this).data('cat-id');

        // Clear existing subcategories and products
        $('.subcategory-list').empty();
        $('.product-list').empty();

        // Fetch and display subcategories
        $.ajax({
            type: 'GET',
            url: '/get-subcategories/' + categoryId,
            success: function (subcategories) {
                subcategories.forEach(function (subcategory) {
                    $('.subcategory-list').append('<li>' + subcategory.subcat_name + '</li>');
                });
            }
        });

        // Fetch and display products
        $.ajax({
            type: 'GET',
            url: '/get-products/' + categoryId,
            success: function (products) {
                products.forEach(function (product) {
                    $('.product-list').append(
                        '<tr>' +
                        '<td>' + product.prod_name + '</td>' +
                        '<td>' + product.price + '</td>' +
                        '<td>' + product.composition + '</td>' +
                        '<td>' + product.allergens + '</td>' +
                        '<td>' + product.SKU + '</td>' +
                        '<td>' + product.text + '</td>' +
                        '</tr>'
                    );
                });
            }
        });
    });
});
</script>
@endsection
