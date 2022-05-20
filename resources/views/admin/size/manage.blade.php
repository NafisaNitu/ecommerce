@extends('admin.master')

@section('title')
    manage size
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Manage Sizes</h1>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Sizes</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach($sizes as $size)
                                <tbody>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @foreach(json_decode($size->size) as $sizes)
                                            <ul class="span3 float-left">
                                                {{ $sizes }}
                                            </ul>
                                        @endforeach
                                    </td>
                                    <td>{{ $size->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                    <td>
                                        <a href="{{ route('change-status-size', ['id' => $size->id]) }}" class="btn btn-{{ $size->status == 1 ? 'info' : 'warning' }} btn-sm">status</a>
                                        <a href="{{ route('edit-size', ['id' => $size->id]) }}" class="btn btn-secondary btn-sm">edit</a>
                                        <a href="{{ route('delete-size', ['id' => $size->id]) }}" onclick="return confirm('Are you sure to delete this?');" class="btn btn-danger btn-sm">del</a>
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
@endsection



