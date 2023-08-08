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
