<x-admin-master>
    @section('content')
        <h1 class="text-dark">Users</h1>

        @if (session('created-message'))
            <div class="alert bg-success text-white" role="alert">
                User <b>{{ session('created-message') }}</b> has been created!
            </div>
        @elseif(session('updated-message'))
            <div class="alert bg-warning text-dark">
                User <b>{{ session('updated-message') }}</b> has been updated!
            </div>
        @elseif(session('not-updated-message'))
            <div class="alert bg-warning text-dark">
                This <b>{{ session('not-updated-message') }}</b> role has nothing changed.
            </div>
        @elseif(session('deleted-message'))
            <div class="alert bg-danger text-white">
                User <b>{{ session('deleted-message') }}</b> has been deleted!
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">All users table</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="userDataTable" width="100%" cellspacing="0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Avatar</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                {{-- <th>Email verified date</th>
                                <th>Registered date</th>
                                <th>Updated profile date</th> --}}
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tfoot class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Avatar</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                {{-- <th>Email verified date</th>
                                <th>Registered date</th>
                                <th>Updated profile date</th> --}}
                                <th>Option</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td></td>
                                    <td><img src="{{ $user->avatar }}" class="img-profile rounded-circle" alt=""
                                            height="100px"></td>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach ($user->roles as $user_roles)
                                            <span class="badge badge-pill badge-info">{{ $user_roles->name }}</span>
                                        @endforeach
                                    </td>

                                    {{-- <td>{{ $user->email_verified_at ? $user->email_verified_at->diffForHumans() : ' ' }}
                                    </td>
                                    <td>{{ $user->created_at ? $user->created_at->diffForHumans() : ' ' }}</td>
                                    <td>{{ $user->updated_at ? $user->updated_at->diffForHumans() : ' ' }}</td> --}}
                                    <td>
                                        {{-- <form action="{{ route('user.destroy', $user->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('user.edit', $user->id) }}"
                                                class="btn btn-sm btn-warning btn-circle">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="submit" class="btn btn-sm btn-danger btn-circle delete-button">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form> --}}
                                        <a data-toggle="modal" data-target="#DeleteUserModal-{{ $user->id }}"
                                            class="btn btn-sm btn-danger btn-circle delete-button">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Delete Modal-->
                                <div class="modal fade" id="DeleteUserModal-{{ $user->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ready to Delete
                                                    <b>"{{ $user->name }}"</b> ?
                                                </h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Select "Delete" below if you are ready to delete this
                                                user.</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button"
                                                    data-dismiss="modal">Cancel</button>
                                                <form action="{{ route('user.destroy', $user->id) }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- <div class="pagination justify-content-center">

        </div> --}}

    @endsection

    @section('scripts')
        <!-- Page level plugins -->
        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    @endsection
</x-admin-master>
