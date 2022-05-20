@extends('admin.master')

@section('title')
    edit Size
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h1>Edit Sizes</h1>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <ul>
                                @foreach($errors->all() as $key => $error)
                                    <li class="text-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form action="{{ route('update-size', ['id' => $size->id]) }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-4">Sizes</label>
                                <div class="col-md-8">
                                    <input type="text" name="size" class="form-control" id="input" data-role="tagsinput" value="{{ implode(',',Json_decode($size->size)) }}">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-4">Status</label>
                                <div class="col-md-8">
                                    <label for=""> <input type="radio" name="status" {{ $size->status == 1 ? 'checked' : '' }} value="1"> Published</label>
                                    <label for=""> <input type="radio" name="status" {{ $size->status == 0 ? 'checked' : '' }} value="0"> Unpublished</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-4"></label>
                                <div class="col-md-8">
                                    <input type="submit"  class="btn btn-success btn-block" value="Update Size">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



