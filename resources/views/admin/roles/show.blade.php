@extends('admin.layouts.master')

@section('title', $role->label)

@section('content')

    <div class="btn-group">

        <a href="{{ route('admin.roles.edit', [$role->getKey()]) }}" class="btn btn-sm btn-warning">
            <i class="fa fa-edit"></i>
            Edit
        </a>

        {{-- Prevent user from deleting role that they are apart of. --}}
        @if (!request()->user()->hasRole($role->name))

            <a
                    data-post="POST"
                    data-title="Delete Role?"
                    data-message="Are you sure you want to delete this role?"
                    href="{{ route('admin.roles.destroy', [$role->getKey()]) }}"
                    class="btn btn-sm btn-danger"
            >
                <i class="fa fa-trash"></i>
                Delete
            </a>

        @endif

    </div>

    <!-- Spacing -->
    <p></p>

    <div class="panel panel-primary">

        <div class="panel-heading">
            <i class="fa fa-list"></i>
            Role Details
        </div>

        <div class="panel-body">

            <table class="table table-striped">

                <tbody>

                    <tr>
                        <th>Label</th>
                        <td>{{ $role->label }}</td>
                    </tr>

                    <tr>
                        <th>Name</th>
                        <td>{{ $role->name }}</td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>

    <div class="panel panel-primary">

        <div class="panel-heading">
            <i class="fa fa-users"></i>
            Users Assigned to this Role
        </div>

        <div class="panel-body">

            {!! $users !!}

        </div>

    </div>

    <div class="panel panel-primary">

        <div class="panel-heading">
            <i class="fa fa-check-circle-o"></i>
            Permissions in this Role
        </div>

        <div class="panel-body">

            {!! $permissions !!}

        </div>

    </div>

@endsection
