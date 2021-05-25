<x-admin-master>
    @section('content')

        <div class="row justify-content-md-center">
            <div class="col">
                <h1>All Posts</h1>
            </div>
            <div class="col">
                <div class="d-flex flex-row-reverse">
                    <a href="{{ route('post.create') }}" class="btn btn-success rounded-circle mr-3"><i
                            class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>

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
                                    <td><a href="{{ route('post', $post->id) }}">{{ $post->title }} </a></td>
                                    <td><img src="{{ $post->post_image }}" alt="" height="60px"></td>
                                    <td>{{ $post->created_at->diffForHumans() }} </td>
                                    <td>{{ $post->updated_at->diffForHumans() }} </td>
                                    <td>
                                        <a href="{{ route('post.edit', $post->id) }}"
                                            class="btn btn-sm btn-warning btn-circle">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a data-toggle="modal" data-target="#DeletePostModal"
                                            class="btn btn-sm btn-danger btn-circle delete-button">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <!-- Delete Modal-->
                                <div class="modal fade" id="DeletePostModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ready to Delete
                                                    <b>"{{ $post->title }}"</b> ?
                                                </h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Select "Delete" below if you are ready to delete this
                                                post.</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button"
                                                    data-dismiss="modal">Cancel</button>
                                                <form action="{{ route('post.destroy', $post->id) }}" method="post"
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
