<x-admin-master>
    @section('content')

        <h1 class="text-dark">Roles</h1>

        @if (session('created-message'))
            <div class="alert bg-success text-white" role="alert">
                Role <b>{{ session('created-message') }}</b> has been created!
            </div>
        @elseif(session('updated-message'))
            <div class="alert bg-warning text-dark">
                Role <b>{{ session('updated-message') }}</b> has been updated!
            </div>
        @elseif(session('not-updated-message'))
            <div class="alert bg-warning text-dark">
                This <b>{{ session('not-updated-message') }}</b> role has nothing changed.
            </div>
        @elseif(session('deleted-message'))
            <div class="alert bg-danger text-white">
                Role <b>{{ session('deleted-message') }}</b> has been deleted!
            </div>
        @endif


        <div class="row">
            <div class="col-sm-3">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Create role</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('roles.store') }}" method="post">
                            @csrf
                            @method('POST')

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror">

                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" id="slug"
                                    class="form-control @error('slug') is-invalid @enderror">

                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn btn-success btn-block" type="submit">Create role</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-9">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">All roles table</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="roleDataTable" width="100%" cellspacing="0">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Permissions</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tfoot class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Permissions</th>
                                        <th>Option</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td></td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                @foreach ($role->permissions as $role_permission)
                                                    <span
                                                        class="badge badge-pill badge-info">{{ $role_permission->name }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{ route('roles.edit', $role->id) }}"
                                                    class="btn btn-sm btn-warning btn-circle">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a data-toggle="modal" data-target="#DeleteRoleModal-{{ $role->id }}"
                                                    class="btn btn-sm btn-danger btn-circle delete-button">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <!-- Delete Modal-->
                                        <div class="modal fade" id="DeleteRoleModal-{{ $role->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ready to
                                                            Delete
                                                            <b>"{{ $role->name }}"</b> ?
                                                        </h5>
                                                        <button class="close" type="button" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Select "Delete" below if you are ready
                                                        to delete
                                                        this role.</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button"
                                                            data-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('roles.destroy', $role->id) }}"
                                                            method="post">
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
            </div>
        </div>

    @endsection

    @section('scripts')
        <!-- Page level plugins -->
        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

        <!-- Alert timeout -->
        <script type="text/javascript">
            $(".alert").fadeTo(3000, 500).slideUp(500, function() {
                $(".alert").slideUp(500);
            });

        </script>
    @endsection
</x-admin-master>
