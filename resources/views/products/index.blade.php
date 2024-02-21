<!-- resources/views/products/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Product List</h1>
            <a href="{{ route('products.create') }}" class="btn btn-success">Create Product</a>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        </div>
    </x-slot>

    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                @foreach($columnHeaders as $header)
                    @if($header != 'user_id')
                        <th>{{ $header }}</th>
                    @endif
                @endforeach
                <th>items</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    @foreach($columnHeaders as $column)
                        @if($column != 'user_id')
                            @if($column == 'created_at' || $column == 'updated_at')
                                <td>{{ $product->{$column}->format('Y/m/d h:i A') }} by {{ $product->user->name ?? 'N/A' }}</td>
                            
                                
                            @else
                                <td>{{ $column == 'status' ? ($product->{$column} ? 'Active' : 'Inactive') : $product->{$column} }}</td>
                            @endif
                        @endif
                    @endforeach
                    <td>{{ $product->items->count() }}</td>
                    
                    <td>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
</x-app-layout>
