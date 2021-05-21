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
    @endsection
</x-admin-master>
