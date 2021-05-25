<x-admin-master>
    @section('content')
        <h1>User Profile : {{ $user->name }}</h1>

        <div class="row">
            <div class="col-sm-6">
                <div>
                    <img src="{{ $user->avatar }}" alt="" class="img-thumbnail mx-auto d-block" width="250">
                </div>
                <form action="{{ route('user.profile.update', $user) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="" class="form-label">Image</label>
                        <input class="form-control" type="file" name="avatar" id="avatar">
                    </div>
                    <div class="form-group">
                        <label for="name">Username</label>
                        <input class="form-control @error('username') is-invalid @enderror" type="text" name="username"
                            id="username" value="{{ $user->username }}">

                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name"
                            value="{{ $user->name }}">

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email"
                            value="{{ $user->email }}">

                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Password</label>
                        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password"
                            id="password">

                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Confirm Password</label>
                        <input class="form-control @error('password-confirm') is-invalid @enderror" type="password"
                            name="password-confirm" id="password-confirm">

                        @error('password-confirm')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Update profile</button>
                </form>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-sm-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Roles of {{ $user->name }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="roleDataTable" width="100%" cellspacing="0">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Check</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Attach</th>
                                        <th>Detach</th>
                                    </tr>
                                </thead>
                                <tfoot class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Check</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Attach</th>
                                        <th>Detach</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr class="@foreach ($user->roles as $user_role) 
                                            @if ($user_role->slug == $role->slug)
                                                table-success @endif
                                                @endforeach">
                                                <td></td>
                                                <td><input type="checkbox" name="" id="" @foreach ($user->roles as $user_role) 
                                                        @if ($user_role->slug==$role->slug) checked @endif
                                            @endforeach>
                                            </td>
                                            <td>
                                                {{ $role->name }}
                                            </td>
                                            <td>
                                                {{ $role->slug }}
                                            </td>
                                            <td>
                                                <form action="{{ route('user.role.attach', $user) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="role" value="{{ $role->id }}">
                                                    <button class="btn btn-primary" @if ($user->roles->contains($role)) disabled @endif type="submit">Attach</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{ route('user.role.detach', $user) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="role" value="{{ $role->id }}">
                                                    <button class="btn btn-danger" @if (!$user->roles->contains($role)) disabled @endif type="submit">Detach</button>
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
    @endsection
</x-admin-master>
