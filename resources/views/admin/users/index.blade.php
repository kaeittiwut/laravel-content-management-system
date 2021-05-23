<x-admin-master>
    @section('content')
        <h1>Users</h1>

        @if (session('created-message'))
            <div class="alert alert-success">
                User <b>{{ session('created-message') }}</b> has been created!
            </div>
        @elseif(session('updated-message'))
            <div class="alert alert-warning">
                User <b>{{ session('updated-message') }}</b> has been updated!
            </div>
        @elseif(session('deleted-message'))
            <div class="alert alert-danger">
                User <b>{{ session('deleted-message') }}</b> has been deleted!
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Avatar</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Email</th>
                                {{-- <th>Email verified date</th>
                                <th>Registered date</th>
                                <th>Updated profile date</th> --}}
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tfoot class="table-light">
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Avatar</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Email</th>
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
                                    <td>{{ $user->id }}</td>
                                    <td><img src="{{ $user->avatar }}" class="img-profile rounded-circle" alt=""
                                            height="100px"></td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    {{-- <td>{{ $user->email_verified_at ? $user->email_verified_at->diffForHumans() : ' ' }}
                                    </td>
                                    <td>{{ $user->created_at ? $user->created_at->diffForHumans() : ' ' }}</td>
                                    <td>{{ $user->updated_at ? $user->updated_at->diffForHumans() : ' ' }}</td> --}}
                                    <td>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            {{-- <a href="{{ route('user.edit', $user->id) }}"
                                                class="btn btn-sm btn-warning btn-circle">
                                                <i class="fas fa-edit"></i>
                                            </a> --}}
                                            <button type="submit" class="btn btn-sm btn-danger btn-circle delete-button">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="pagination justify-content-center">

        </div>

    @endsection

    @section('scripts')
        <!-- Page level plugins -->
        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    @endsection
</x-admin-master>
