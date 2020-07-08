<x-admin-master>

    @section('content')

    <h1>Create</h1>
    <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Post Title</label>
            <input class="form-control" type="text" value="" name="title" id="title" aria-describedby="" placeholder=""> 
        </div>
        {{-- <div class="form-group">
            <label for="">Image</label>
            <input class="form-control" type="file" value="" name="post_image" id="post_image" aria-describedby="" placeholder=""> 
        </div> --}}
        <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="post_image" name="post_image">
              <label class="custom-file-label" for="post_image">Choose file</label>
            </div>
          </div>
        <div class="form-group">
            <label for="">Content</label>
            <textarea class="form-control" id="body" placeholder="" name="body" rows="10">Post content</textarea>
        </div>
        <button class="btn btn-primary" type="submit">Create</button>
    </form>

    


    @endsection


</x-admin-master>