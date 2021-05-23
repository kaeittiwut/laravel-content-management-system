<x-admin-master>
    @section('content')
        <h1>All Posts</h1>

        @if (session('created-message'))
            <div class="alert alert-success" role="alert">
                Post <b>{{ session('created-message') }}</b> was created!
            </div>
        @elseif(session('updated-message'))
            <div class="alert alert-warning">
                Post <b>{{ session('updated-message') }}</b> was updated!
            </div>
        @elseif(session('deleted-message'))
            <div class="alert alert-danger">
                Post <b>{{ session('deleted-message') }}</b> was deleted!
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Owner</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Owner</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Option</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }} </td>
                                    <td>{{ $post->user->name }}</td>
                                    <td><a href="{{ route('post.edit', $post->id) }}">{{ $post->title }} </a></td>
                                    <td><img src="{{ $post->post_image }}" alt="" height="60px"></td>
                                    <td>{{ $post->created_at->diffForHumans() }} </td>
                                    <td>{{ $post->updated_at->diffForHumans() }} </td>
                                    <td>
                                        <form action="{{ route('post.destroy', $post->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('post.edit', $post->id) }}"
                                                class="btn btn-sm btn-warning btn-circle">
                                                <i class="fas fa-edit"></i>
                                            </a>
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

        {{-- <div class="pagination justify-content-center">
            {{ $posts->links() }}
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
