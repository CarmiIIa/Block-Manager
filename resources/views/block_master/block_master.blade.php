@extends('layout')
@section('content')
<div class="container-fluid mt-3">
    @if (Session::get('createBlockMaster'))
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span>
        </button> <strong>Success!</strong> {{ Session::get('createBlockMaster')}}
    </div>
    @endif
    @if (Session::get('updateBlockMaster'))
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span>
        </button> <strong>Success!</strong> {{ Session::get('updateBlockMaster')}}
    </div>
    @endif
    @if (Session::get('deleteBlockMaster'))
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span>
        </button> <strong>Success!</strong> {{ Session::get('deleteBlockMaster')}}
    </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Block List</h4>
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-primary" href="{{ route('blockmaster.create') }}">Create New Block</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <?php
                                        $i = 1;
                                    ?>
                                    <tr>
                                        <th style="max-width: 60px;">NO</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th class="text-center">Main Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blockCategory as $block)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $block->id }}</td>
                                        <td>{{ $block->block_name }}</td>
                                        <td>{{ $block->categories->category_name }}</td>
                                        <td>{{ $block->description }}</td>
                                        <td class="text-center"><img src="{{ asset('storage/images/main_image/' . basename($block->main_image)) }}" style="width: 200px; height: 200px;" alt="image"></td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="btn btn-primary mr-1" href="{{ route('blockmaster.edit', $block->id) }}">Edit</a>
                                                <form action="{{ route('blockmaster.delete', $block['id']) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')" type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>NO</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Main Image</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection