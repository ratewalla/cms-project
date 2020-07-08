<x-admin-master>

    @section('content')

    <h1>Edit Post</h1>
    <form action="{{route('posts.update',$post->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{-- @method required for laravel to patch --}}
        @method('PATCH')
        <div class="form-group">
            <label for="">Post Title</label>
        <input class="form-control" type="text" name="title" id="title" aria-describedby="" placeholder="" value="{{$post->title}}"> 
        </div>
    <div><img src="{{$post->post_image}}" height="100"></div>
    <label>Current Image</label>
        <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="post_image" name="post_image">
              <label class="custom-file-label" for="post_image">Choose file</label>
            </div>
          </div>
          <br>
        <div class="form-group">
            <label for="">Content</label>
        <textarea class="form-control" id="body" placeholder="" name="body" rows="10">{{$post->body}}</textarea>
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>

    


    @endsection


</x-admin-master>