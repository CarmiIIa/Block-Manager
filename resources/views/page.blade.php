@extends('layout')
@section('content')
<div class="container-fluid mt-3">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <a class="btn btn-primary ml-auto mr-3 mt-3" href="/dashboard">Back</a>
                    <div class="card-body">
                        <h4 class="card-title">Page List</h4>
                        <hr>
                        @foreach ($projectDB as $project)
                        <p><b class="pr-4">Project Name</b>: {{ $project->project_name }}</p>
                        <p><b class="pr-2">Project Manager</b>: {{ $project->project_manager }}</p>
                        @endforeach
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Page Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pageDB as $page)
                                    <tr>
                                        <td>{{ $page->page_name }}</td>
                                        <td>{{ $page->status }}</td>
                                        <td>
                                            <a href="">See Pages</a> | 
                                            <form action="">
                                                <a href="">Delete</a>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Project Name</th>
                                        <th>Project Manager</th>
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
    <!-- #/ container -->
</div>

</div>
@endsection