@extends('teacher.admin_master')
@section('content')


<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-3">All Teacher</h4>
                        <div class="table-responsive">
                            <div class="table-data">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Title</th>
                                            <th>Institute</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($teachers as $key=>$teacher)
                                        <tr>
                                            <th>{{ $key+1 }}</th>
                                            <th>{{ $teacher->name }}</th>
                                            <th>{{ $teacher->title }}</th>
                                            <th>{{ $teacher->institute }}</th>
                                            <td>
                                                <button
                                                class="btn btn-sm btn-primary mr-2 edit_teacher"
                                                data-id="{{ $teacher->id }}"
                                                data-name="{{ $teacher->name }}"
                                                data-title="{{ $teacher->title }}"
                                                data-institute="{{ $teacher->institute }}"
                                                >Edit</button>
                                                <button class="btn btn-sm btn-danger mr-2 delete_teacher"
                                                data-id="{{ $teacher->id }}"
                                                >Delete</button>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {!! $teachers->links() !!}
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="col-md-4"  id="addt">
                <div class="card">
                    <form action="" method="POST" id="addTeacherForm">
                        @csrf
                        <div class="card-body">
                            <h4 class="card-title mb-3">
                                <span>Add New Teacher</span>
                            </h4>

                            <div class="errMsgContainer mb-3">
                            </div>

                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                            </div>
                            <div class="mb-3">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Job Position">
                            </div>
                            <div class="mb-3">
                                <label for="institute">Institute</label>
                                <input type="text" name="institute" class="form-control" id="institute" placeholder="Institute Name">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-sm btn-primary mr-2  add_teacher">Add</button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
            <div class="col-md-4" id="updatet">
                <div class="card">
                    <form action="" method="POST" id="updateTeacherForm">
                        @csrf
                        <input type="hidden" id="up_id" >

                        <div class="card-body">
                            <h4 class="card-title mb-3">
                                <span>Update Teacher</span>
                            </h4>
                            <div class="errMsgContainer mb-3">
                            </div>

                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="up_name" class="form-control" id="up_name" placeholder="Enter name">
                            </div>
                            <div class="mb-3">
                                <label for="title">Title</label>
                                <input type="text" name="up_title" class="form-control" id="up_title" placeholder="Job Position">
                            </div>
                            <div class="mb-3">
                                <label for="institute">Institute</label>
                                <input type="text" name="up_institute" class="form-control" id="up_institute" placeholder="Institute Name">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-sm btn-primary mr-2 update_teacher">Update</button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection
