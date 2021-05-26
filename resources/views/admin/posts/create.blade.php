<x-admin-master>

    @section('content')
        <h1 class="text-dark">Create</h1>

        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Create my post</h6>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control" type="text" name="title" id="title" placeholder="Enter your title">
                    </div>

                    <div class="form-group">
                        <label for="post_image" class="form-label">Image</label>
                        <input class="form-control" type="file" name="post_image" id="post_image">
                    </div>

                    <div class="form-group">
                        <label for="body">Description</label>
                        <textarea class="form-control" name="body" id="body" cols="30" rows="10"
                            placeholder="Enter your description"></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>

    @endsection

</x-admin-master>
