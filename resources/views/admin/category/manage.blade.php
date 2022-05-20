@extends('admin.master')

@section('title')
    manage category
@endsection

@section('body')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1>Manage Category</h1>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                   <tr>
                                       <th>#</th>
                                       <th>Name</th>
                                       <th>Description</th>
                                       <th>Image</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                   </tr>
                                </thead>
                                @foreach($categories as $category)
                                <tbody>
                                   <tr>
                                       <td>{{ $loop->iteration }}</td>
                                       <td>{{ $category->name }}</td>
                                       <td>{!! substr_replace($category->description, '....', 150) !!}</td>
                                       <td>
                                           <img src="{{ asset($category->image) }}" style="height: 100px; width: 100px;" alt="">
                                       </td>
                                       <td>{{ $category->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                       <td>
                                           <a href="{{ route('change-status-category', ['id' => $category->id]) }}" class="btn btn-{{ $category->status == 1 ? 'info' : 'warning' }} btn-sm">status</a>
                                           <a href="{{ route('edit-category', ['id' => $category->id]) }}" class="btn btn-secondary btn-sm">edit</a>
                                           <a href="{{ route('delete-category', ['id' => $category->id]) }}" onclick="return confirm('Are you sure to delete this?');" class="btn btn-danger btn-sm">del</a>
                                       </td>
                                   </tr>
                                </tbody>
                                @endforeach
                            </table>
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection


