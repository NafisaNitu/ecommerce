@extends('admin.master')

@section('title')
    manage product
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Manage Product</h1>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" border="2">
                            <thead>
                            <tr>
                                <th style="width: 5%">#</th>
                                <th style="width: 5%">Code</th>
                                <th style="width: 10%">Product</th>
                                <th style="width: 20%">Description</th>
                                <th style="width: 5%">Price</th>
                                <th style="width: 30%">Image</th>
                                <th style="width: 5%">Category</th>
                                <th style="width: 5%">Subcat Name</th>
                                <th style="width: 5%">Brand</th>
                                <th style="width: 5%">Status</th>
                                <th style="width: 20%">Action</th>
                            </tr>
                            </thead>
                            @foreach($products as $product)
{{--                                @php--}}
{{--                                    $product['image'] = explode('|', $product->image);--}}
{{--                                @endphp--}}
                                <tbody>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->code }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{!! substr_replace($product->description, '....', 150) !!}</td>
                                    <td>&#2547;{{ $product->price }}</td>
                                    <td>
                                        @foreach(explode('|', $product->image) as $images)
{{--                                        @foreach($product->image as $images)--}}
                                            <img src="{{ asset($images) }}" style="height: 60px; width: 60px;" alt="">
                                        @endforeach
                                    </td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->subcategory->title }}</td>
                                    <td>{{ $product->brand->name }}</td>
                                    <td>{{ $product->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                    <td>
                                        <a href="{{ route('change-status-product', ['id' => $product->id]) }}" class="btn btn-{{ $product->status == 1 ? 'info' : 'warning' }} btn-sm">status</a>
                                        <a href="{{ route('edit-product', ['id' => $product->id]) }}" class="btn btn-secondary btn-sm">edit</a>
                                        <a href="{{ route('delete-product', ['id' => $product->id]) }}" onclick="return confirm('Are you sure to delete this?');" class="btn btn-danger btn-sm">del</a>
                                    </td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
{{--                        {{ $categories->links() }}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


