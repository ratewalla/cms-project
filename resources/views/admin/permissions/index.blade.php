<x-admin-master>


    @section('content')

    <h1>Permissions</h1>

@if (session()->has('permissionUpdatedMessage'))
<div class="alert alert-success">{{session('permissionUpdatedMessage')}}</div>
@endif
@if (session()->has('permissionDeletedMessage'))
<div class="alert alert-danger">{{session('permissionDeletedMessage')}}</div>
@endif

    <div class="row">
        <div class="col-sm-3">
            <form action="{{route('permissions.store')}}" method="post">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control  @error('name') is-invalid @enderror">
                </div>
                <div>
                    @error('name')
                        <span><strong>{{$message}}</strong></span>
                    @enderror
                </div>
                    <button type="submit" class="btn btn-primary btn-block" name="sumit" >Create</button>
            </form>
        </div>
    </div><br>
    <div class="row">
        <div class="col-sm-9">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Name</th>
                          <th>Slug</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                      </tfoot>
                        <tbody>
                            @foreach($permissions as $permission)
                            <tr>
                                <td>{{$permission->id}}</td>
                                <td>{{$permission->name}}</td>
                                <td>{{$permission->slug}}</td>
                                <td><a class="btn btn-light" href="{{route('permissions.edit', $permission->id)}}">Edit</a></td>
                                <td>
                                    <form action="{{route('permissions.destroy', $permission->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
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



</x-admin-master>