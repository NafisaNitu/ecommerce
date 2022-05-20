@extends('admin.master')

@section('title')
    manage brand
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Manage Brand</h1>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach($brands as $brand)
                                <tbody>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>{!! substr_replace($brand->description, '....', 150) !!}</td>
                                    <td>{{ $brand->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                    <td>
                                        <a href="{{ route('change-status-brand', ['id' => $brand->id]) }}" class="btn btn-{{ $brand->status == 1 ? 'info' : 'warning' }} btn-sm">status</a>
                                        <a href="{{ route('edit-brand', ['id' => $brand->id]) }}" class="btn btn-secondary btn-sm">edit</a>
                                        <a href="{{ route('delete-brand', ['id' => $brand->id]) }}" onclick="return confirm('Are you sure to delete this?');" class="btn btn-danger btn-sm">del</a>
                                    </td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                        {{ $brands->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


