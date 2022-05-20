@extends('admin.master')

@section('title')
    manage unit
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Manage Unit</h1>
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
                            @foreach($units as $unit)
                                <tbody>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $unit->name }}</td>
                                    <td>{!! substr_replace($unit->description, '....', 150) !!}</td>
                                    <td>{{ $unit->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                    <td>
                                        <a href="{{ route('change-status-unit', ['id' => $unit->id]) }}" class="btn btn-{{ $unit->status == 1 ? 'info' : 'warning' }} btn-sm">status</a>
                                        <a href="{{ route('edit-unit', ['id' => $unit->id]) }}" class="btn btn-secondary btn-sm">edit</a>
                                        <a href="{{ route('delete-unit', ['id' => $unit->id]) }}" onclick="return confirm('Are you sure to delete this?');" class="btn btn-danger btn-sm">del</a>
                                    </td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                        {{ $units->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


