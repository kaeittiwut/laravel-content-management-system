<x-admin-master>

    @section('content')
        <h1 class="text-dark">Edit</h1>

        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Edit my post</h6>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control" type="text" name="title" id="title" value="{{ $post->title }}">
                    </div>

                    <div class="form-group">
                        <div><img src="{{ $post->post_image }}" class="img-thumbnail mx-auto d-block"></div>
                        <label for="post_image" class="form-label">Image</label>
                        <input class="form-control" type="file" name="post_image" id="post_image">
                    </div>

                    <div class="form-group">
                        <label for="body">Description</label>
                        <textarea class="form-control" name="body" id="body" cols="30" rows="10"
                            placeholder="Enter your description">{{ $post->body }}</textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    @endsection

</x-admin-master>
