<x-admin-master>
    @section('content')

        <div class="row">
            <div class="col">
                <h1 class="text-dark">My Posts</h1>
            </div>
            <div class="col">
                <div class="d-flex flex-row-reverse">
                    <a href="{{ route('post.create') }}" class="btn btn-success btn-lg rounded-circle mr-3 shadow"><i
                            class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>

        @if (session('created-message'))
            <div class="alert bg-success text-white" role="alert">
                Post <b>{{ session('created-message') }}</b> has been created!
            </div>
        @elseif(session('updated-message'))
            <div class="alert bg-warning text-dark">
                Post <b>{{ session('updated-message') }}</b> has been updated!
            </div>
        @elseif(session('not-updated-message'))
            <div class="alert bg-warning text-dark">
                This <b>{{ session('not-updated-message') }}</b> post has nothing changed.
            </div>
        @elseif(session('deleted-message'))
            <div class="alert bg-danger text-white">
                Post <b>{{ session('deleted-message') }}</b> has been deleted!
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">My posts table</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="postDataTable" width="100%" cellspacing="0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                {{-- <th>Owner</th> --}}
                                <th>Title</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tfoot class="table-light">
                            <tr>
                                <th>#</th>
                                {{-- <th>Owner</th> --}}
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
                                    <td>{{ $post->id }}</td>
                                    {{-- <td>{{ $post->user->name }}</td> --}}
                                    <td><a href="{{ route('post', $post->id) }}">{{ $post->title }} </a></td>
                                    <td><img src="{{ $post->post_image }}" alt="" height="60px"></td>
                                    <td>{{ $post->created_at->diffForHumans() }} </td>
                                    <td>{{ $post->updated_at->diffForHumans() }} </td>
                                    <td>
                                        <a href="{{ route('post.edit', $post->id) }}"
                                            class="btn btn-sm btn-warning btn-circle">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a data-toggle="modal" data-target="#DeletePostModal-{{ $post->id }}"
                                            class="btn btn-sm btn-danger btn-circle delete-button">
                                            <i class="fas fa-trash"></i>
                                        </a>


                                        <!-- Delete Modal-->
                                        <div class="modal fade" id="DeletePostModal-{{ $post->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ready to Delete
                                                            <b>"{{ $post->title }}"</b> ?
                                                        </h5>
                                                        <button class="close" type="button" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Select "Delete" below if you are ready to delete
                                                        this
                                                        post.</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button"
                                                            data-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('post.destroy', $post->id) }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

        <!-- Alert timeout -->
        <script type="text/javascript">
            $(".alert").fadeTo(3000, 500).slideUp(500, function() {
                $(".alert").slideUp(500);
            });

        </script>
    @endsection
</x-admin-master>
