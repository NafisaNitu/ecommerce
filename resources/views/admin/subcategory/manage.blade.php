@extends('admin.master')

@section('title')
    manage sub category
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1>Manage Sub Category</h1>
                        </div>
                        <div class="card-body">
                            <h1 class="text-success">{{ Session::get('message') }}</h1>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Content</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                @foreach($subcategories as $subcategory)
                                    <tbody>
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $subcategory->title }}</td>
                                        <td>{{ $subcategory->category->name }}</td>
                                        <td>{!! substr_replace($subcategory->description, '....', 150) !!}</td>
                                        <td>{{ $subcategory->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                        <td>
                                            <a href="{{ route('change-status-sub-category', ['id' => $subcategory->id]) }}" class="btn btn-{{ $subcategory->status == 1 ? 'info' : 'warning' }} btn-sm">status</a>
                                            <a href="{{ route('edit-sub-category', ['id' => $subcategory->id]) }}" class="btn btn-secondary btn-sm">edit</a>
                                            <a href="{{ route('delete-sub-category', ['id' => $subcategory->id]) }}" onclick="return confirm('Are you sure to delete this?');" class="btn btn-danger btn-sm">del</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



