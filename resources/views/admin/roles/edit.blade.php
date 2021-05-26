<x-admin-master>
    @section('content')
        <h1 class="text-dark">Edit {{ $role->name }} Role</h1>

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
                        <h6 class="m-0 font-weight-bold text-primary">Edit role</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('roles.update', $role->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ $role->name }}">

                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" id="slug"
                                    class="form-control @error('slug') is-invalid @enderror" value="{{ $role->slug }}">

                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn btn-warning btn-block" type="submit">Edit role</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-9">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">{{ $role->name }} permissions table</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="permissionOfRoleDataTable" width="100%"
                                cellspacing="0">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Attach</th>
                                        <th>Detach</th>
                                    </tr>
                                </thead>
                                <tfoot class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Attach</th>
                                        <th>Detach</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($permissions as $permission)
                                        <tr class="@foreach ($role->permissions as
                                            $role_permission) @if ($role_permission->slug == $permission->slug)
                                                table-success @endif
                                                @endforeach">
                                                <td></td>
                                                <td>{{ $permission->name }}</td>
                                                <td>{{ $permission->slug }}</td>
                                                <td>
                                                    <form action="{{ route('role.attach', $role) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="permission"
                                                            value="{{ $permission->id }}">
                                                        <button class="btn btn-primary" @if ($role->permissions->contains($permission)) disabled @endif
                                                            type="submit">Attach</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="{{ route('role.detach', $role) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="permission"
                                                            value="{{ $permission->id }}">
                                                        <button class="btn btn-danger" @if (!$role->permissions->contains($permission)) disabled @endif
                                                            type="submit">Detach</button>
                                                    </form>
                                                </td>
                                        </tr>
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
