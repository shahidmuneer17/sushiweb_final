@extends('admin.layouts.admin')

@section('content')
    <div class="container">
        <h2>Edit Product</h2>
        <form method="POST" action="{{ route('admin.products.update', $product->prod_id) }}">
            @csrf
            @method('PUT')

            {{-- Product Information --}}
            <label for="prod_name">Product Name:</label>
            <input type="text" name="prod_name" value="{{ old('prod_name', $product->prod_name) }}" required>

            <label for="composition">Composition:</label>
            <input type="text" name="composition" value="{{ old('composition', $product->composition) }}">

            <label for="allergenes">Allergenes:</label>
            <input type="text" name="allergenes" value="{{ old('allergenes', $product->allergenes) }}">

            <label for="SKU">SKU:</label>
            <input type="text" name="SKU" value="{{ old('SKU', $product->SKU) }}" required>

            <label for="price">Price:</label>
            <input type="number" name="price" value="{{ old('price', $product->price) }}" required>

            <label for="text">Description:</label>
            <textarea name="text">{{ old('text', $product->text) }}</textarea>

            <label for="imgsrc">Image Source:</label>
            <input type="text" name="imgsrc" value="{{ old('imgsrc', $product->imgsrc) }}">

            {{-- Options --}}
            <label for="options">Options:</label>
            @foreach($product->options as $index => $option)
                <div class="option">
                    <input type="text" name="options[{{ $index }}][id]" value="{{ $option->option_id }}">
                    <input type="text" name="options[{{ $index }}][option_name]" value="{{ old("options.$index.option_name", $option->option_name) }}">
                    <input type="text" name="options[{{ $index }}][option_price]" value="{{ old("options.$index.option_price", $option->option_price) }}">
                    <button type="button" onclick="deleteOption({{ $option->option_id }})">Delete Option</button>
                </div>
            @endforeach

            {{-- Subcategory --}}
            <label for="subcat_id">Subcategory:</label>
            <select name="subcat_id">
                @foreach ($subcategories as $subcategory)
                    <option value="{{ $subcategory->subcat_id }}" {{ $subcategory->subcat_id == $product->subcategory->subcat_id ? 'selected' : '' }}>
                        {{ $subcategory->subcat_name }}
                    </option>
                @endforeach
            </select>

            {{-- Add other form fields as needed --}}

            <button type="submit">Update Product</button>
        </form>
    </div>
    <script>
function deleteOption(optionId) {
    fetch(`/admin/products/options/${optionId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        location.reload();
    });
}
</script>
@endsection
