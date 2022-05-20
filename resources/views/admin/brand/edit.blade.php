@extends('admin.master')

@section('title')
    Edit brand
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h1>Edit Brand</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update-brand', ['id' => $brand->id]) }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-4">Brand Name</label>
                                <div class="col-md-8">
                                    <input type="text" name="name" class="form-control" value="{{ $brand->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-4">Description</label>
                                <div class="col-md-8">
                                    <textarea name="description" id="" cols="30" rows="5" class="form-control">{{ $brand->description }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-4">Status</label>
                                <div class="col-md-8">
                                    <label for=""> <input type="radio" name="status" {{ $brand->status == 1 ? 'checked' : '' }}  value="1"> Published</label>
                                    <label for=""> <input type="radio" name="status" {{ $brand->status == 0 ? 'checked' : '' }} value="0"> Unpublished</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-4"></label>
                                <div class="col-md-8">
                                    <input type="submit"  class="btn btn-success btn-block" value="Update Brand">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


