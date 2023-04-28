@extends('layout')
@section('content')

<div class="container-fluid mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if (Session::get('createPage'))
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button> <strong>Success!</strong> {{ Session::get('createPage')}}
                </div>
                @endif
                @if (Session::get('updatePage'))
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button> <strong>Success!</strong> {{ Session::get('updatePage')}}
                </div>
                @endif
                @if (Session::get('deletePage'))
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button> <strong>Success!</strong> {{ Session::get('deletePage')}}
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button> <strong>Error:</strong>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Block</h4>
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-danger ml-1" href="{{ route('block.master') }}">Back</a>
                        </div>
                        <hr>
                        <form action="{{ route('blockmaster.post') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-3">
                                <div class="col-md-4"><b>Block Name <span class="text-danger">*</span></b></div>
                                <div class="col-md-8"><input type="text" name="block_name" class="form-control"
                                        placeholder="Enter Block Name"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4"><b>Category <span class="text-danger">*</span></b></div>
                                <div class="col-lg-8">
                                    <select class="form-select" aria-label="Default select example" name="category_id">
                                        <option value="" selected disabled>Select Category Block</option>
                                        @foreach($blockCategoryCreate as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>                                                       
                            <div class="row mt-3">
                                <div class="col-md-4"><b>Description <span class="text-danger"></span></b></div>
                                <div class="col-md-8"><textarea name="description" class="form-control" id="val-note" rows="5" placeholder="Not Required"></textarea></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4"><b>Main Image <span class="text-danger">*</span></b></div>
                                <div class="input-group col-lg-8">   
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="main_image" onchange="previewImage(event)">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                            </div>    
                            <div class="row mt-3" style="display: none" id="preview-container">
                                <div class="col-md-4" for="preview"><b>Preview Image <span class="text-danger"></span></b></div>
                                <div class="col-lg-8 offset-md-4"> 
                                    <img class="text-center" id="preview" src="#" alt="image preview" style="max-width: 400px; max-height: 300px;"> 
                                </div>
                            </div>                                         
                            <script>
                                function previewImage(event) {
                                    var input = event.target;
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();
                                        reader.onload = function (e) {
                                            var preview = document.getElementById("preview");
                                            preview.src = e.target.result;
                                            document.getElementById("preview-container").style.display = "block";
                                        }
                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                            </script>         
                            <div class="mt-3 mb-3">
                                <button type="submit" class="btn btn-primary">Save Block</button>
                            </div>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection