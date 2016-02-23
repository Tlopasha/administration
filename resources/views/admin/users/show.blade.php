@extends('admin.layouts.master')

@section('title', $user->name)

@section('content')

    <div class="btn-group">

        <a href="{{ route('admin.users.edit', [$user->getKey()]) }}" class="btn btn-sm btn-warning">
            <i class="fa fa-edit"></i>
            Edit
        </a>

        <a href="#" class="btn btn-sm btn-warning">
            <i class="fa fa-lock"></i>
            Change Password
        </a>

        {{-- Prevent user from deleting self. --}}
        @if (request()->user()->getKey() != $user->getKey())

            <a
                    data-post="POST"
                    data-title="Delete User?"
                    data-message="Are you sure you want to delete this user?"
                    href="{{ route('admin.users.destroy', [$user->getKey()]) }}"
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
            Profile Details
        </div>

        <div class="panel-body">

            <table class="table">

                <tbody>

                <tr>
                    <th>Name</th>
                    <td>{{ $user->name }}</td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>

                <tr>
                    <th>Created</th>
                    <td>{{ $user->created_at_human }}</td>
                </tr>

                <tr>
                    <th>Last Updated</th>
                    <td>{{ $user->updated_at_human }}</td>
                </tr>

                <tr>
                    <th>Roles</th>
                    <td>
                        @foreach($user->roles as $role)
                            {!! $role->display_label !!} <br>
                        @endforeach
                    </td>
                </tr>

                </tbody>

            </table>

        </div>

    </div>

@endsection
