<x-admin-master>

    @section('content')
     
<h1>Editing Role: {{$role->name}}</h1>

<div class="row">
    <div class="col-sm-3">
    <form action="{{route('roles.update',$role->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{$role->name}}">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>
<div class="row">
    <div class="col-lg-12">       
        @if(!$permissions->isEmpty())
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Role Permissions</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Has Permission</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Attach</th>
                        <th>Detach</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>Has Permission</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Attach</th>
                        <th>Detach</th>
                    </tr>
                  </tfoot>
                    <tbody>
                        @foreach($permissions as $permission)
                        <tr>
                            <td>
                                <input type="checkbox" disabled
                                @foreach($role->permissions as $role_permission)
                                    @if($role_permission->slug == $permission->slug)
                                        checked disabled
                                        @else unchecked
                                    @endif
                                @endforeach
                                ></td>
                            <td>{{$permission->name}}</td>
                            <td>{{$permission->slug}}</td>
                            <td>
                                <form action="{{route('role.permission.attach',$role)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="permission" value="{{$permission->id}}">
                                    <button class="btn btn-primary" 
                                    @if($role->permissions->contains($permission))
                                        disabled
                                    @endif
                                >Attach</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{route('role.permission.detach',$role)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="permission" value="{{$permission->id}}">
                                    <button class="btn btn-danger" 
                                    @if(!$role->permissions->contains($permission))
                                        disabled
                                    @endif
                                >Detach</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
              </div>
            </div>
            
          </div>



    
        
        @endif
        </div>
</div>



    @endsection



</x-admin-master>