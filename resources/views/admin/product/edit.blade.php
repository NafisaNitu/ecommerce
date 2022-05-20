@extends('admin.master')

@section('title')
    edit product
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h1>Edit Product</h1>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <ul>
                                @foreach($errors->all() as $key => $error)
                                    <li class="text-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form action="{{ route('update-product', ['id' =>$product->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-4">Product Code</label>
                                <div class="col-md-8">
                                    <input type="text" name="code" class="form-control" value="{{ $product->code }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-4">Product Name</label>
                                <div class="col-md-8">
                                    <input type="text" name="name" class="form-control" required value="{{ $product->name }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-4">Select Category</label>
                                <div class="col-md-8">
                                    <select name="category" id="" class="form-control">
                                        <option value="">Select a Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $product->cat_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-4">Select Sub Category</label>
                                <div class="col-md-8">
                                    <select name="subcategory" id="" class="form-control">
                                        <option value="">Select a Sub Category</option>
                                        @foreach($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}" {{ $subcategory->id == $product->subcat_id ? 'selected' : '' }}>{{ $subcategory->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-4">Select Brand</label>
                                <div class="col-md-8">
                                    <select name="brand" id="" class="form-control">
                                        <option value="">Select a Brand</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ $brand->id == $product->br_id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-4">Select Unit</label>
                                <div class="col-md-8">
                                    <select name="unit" id="" class="form-control">
                                        <option value="">Select a Unit</option>
                                        @foreach($units as $unit)
                                            <option value="{{ $unit->id }}" {{ $unit->id == $product->unit_id ? 'selected' : '' }}>{{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-4">Select Size</label>
                                <div class="col-md-8">
                                    <select name="size" id="" class="form-control">
                                        <option value="">Select a Size</option>
                                        @foreach($sizes as $size)
                                            <option value="{{ $size->id }}" {{ $size->id == $product->size_id ? 'selected' : '' }}>{{ $size->size }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-4">Select Color</label>
                                <div class="col-md-8">
                                    <select name="color" id="" class="form-control">
                                        <option value="">Select a Color</option>
                                        @foreach($colors as $color)
                                            <option value="{{ $color->id }}" {{ $color->id == $product->color_id ? 'selected' : '' }}>{{ $color->color }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-4">Description</label>
                                <div class="col-md-8">
                                    <textarea name="description" id="editor" cols="30" rows="5" class="form-control">{{ $product->description }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-4">Price</label>
                                <div class="col-md-8">
                                    <input type="text" name="price" class="form-control" value="{{ $product->price }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-4">Image</label>
                                <div class="col-md-8">
                                    <input type="file" name="image[]" multiple class="form-control-file">
                                    @foreach(explode('|', $product->image) as $images)
                                    <img src="{{ asset($images) }}" style="width: 50px; height: 50px;" alt="">
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-4">Status</label>
                                <div class="col-md-8">
                                    <label for=""> <input type="radio" name="status" {{ $product->status == 1 ? 'checked' : '' }} value="1"> Published</label>
                                    <label for=""> <input type="radio" name="status" {{ $product->status == 0 ? 'checked' : '' }} value="0"> Unpublished</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-4"></label>
                                <div class="col-md-8">
                                    <input type="submit"  class="btn btn-success btn-block" value="Update Product">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



