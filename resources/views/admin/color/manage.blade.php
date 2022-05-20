@extends('admin.master')

@section('title')
    manage color
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Manage Colors</h1>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Colors</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach($colors as $color)
                                <tbody>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @foreach(json_decode($color->color) as $colors)
                                            <ul class="span3 float-left">
                                                {{ $colors }}
                                            </ul>
                                        @endforeach
                                    </td>
                                    <td>{{ $color->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                    <td>
                                        <a href="{{ route('change-status-color', ['id' => $color->id]) }}" class="btn btn-{{ $color->status == 1 ? 'info' : 'warning' }} btn-sm">status</a>
                                        <a href="{{ route('edit-color', ['id' => $color->id]) }}" class="btn btn-secondary btn-sm">edit</a>
                                        <a href="{{ route('delete-color', ['id' => $color->id]) }}" onclick="return confirm('Are you sure to delete this?');" class="btn btn-danger btn-sm">del</a>
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



