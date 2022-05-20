@extends('admin.master')

@section('title')
    edit sub category
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h1>Edit Sub Category</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update-sub-category',['id'=> $subcategory->id]) }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-4">Sub Category Title</label>
                                <div class="col-md-8">
                                    <input type="text" name="title" class="form-control" value="{{ $subcategory->title }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-4">Category Name</label>
                                <div class="col-md-8">
                                    <select name="cat_id" id="" class="form-control">
                                        <option value=""><------Select a Category--------></option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $subcategory->cat_id ? 'selected' : '' }}>{{ $category->name }}</option>
{{--                                            <option value="{{ $category->id }}" {{ $category->id == $news->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>--}}
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-4">Description</label>
                                <div class="col-md-8">
                                    <textarea name="description" id="editor" cols="30" rows="5" class="form-control">{{ $subcategory->description }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-4">Status</label>
                                <div class="col-md-8">
                                    <label for=""> <input type="radio" name="status" {{ $subcategory->status == 1 ? 'checked' : '' }} value="1"> Published</label>
                                    <label for=""> <input type="radio" name="status" {{ $subcategory->status == 0 ? 'checked' : '' }} value="0"> Unpublished</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-4"></label>
                                <div class="col-md-8">
                                    <input type="submit"  class="btn btn-success btn-block" value="Edit Sub Category">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



