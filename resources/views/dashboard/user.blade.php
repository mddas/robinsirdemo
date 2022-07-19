@extends('layouts.master')
@section('home_content')
   <div class="home_content">
       <div class="left" id="text"><font color="green"><h2>USER DASHBOARD </h2></font></div>
       <div class="left" id="add">
       @can('create')  
       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="New User Register"><img src="images/Add.png" height="80px" width="80px"></button>
       @endcan  
      </div>
       <div class="show">     
      </div>
  <table class="table table-striped"><!--table table-dark table-striped--->
  <thead>
    <tr>
      <th scope="col">#</th> 
      <th scope="col">Users Name</th>
      <th scope="col">Role</th>
      <th scope="col">Permisson</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $d)
    <tr id="{{$d['id']}}">
      <th scope="row">{{$d['id']}}</th>
      <td>{{$d['name']}}</td>
      <td>
        @foreach($d->getRoleNames() as $rol)
        <button type="button" class="btn btn-info btn-sm">{{$rol}}</button>
      @endforeach
      </td>
      <td>
      @foreach($d->getAllPermissions() as $per)
        <button type="button" class="btn btn-info btn-sm">{{$per['name']}}</button>
      @endforeach
      </td>
      <td>
        @can('edit')
        <a href="/useredit?id={{$d['id']}}"><button type="button" class="btn btn-danger" >Edit</button>
        @endcan
        @can('delete')
        <!----/userdelete?id={{$d['id']}}---->
        <a href="#"><button type="button" class="btn btn-danger" onclick='deLete({{ $d["id"]}},"/userdelete")'>Delete</button></a>
        @endcan
      </td>
    </tr>
  @endforeach
      
  </tbody>
</table>
<!---------modal------------>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register New user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="insertuser" method="get">
          @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name</label>
            <input type="text" class="form-control" id="recipient-name" name="Name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Role</label>       
            <select class="form-select" aria-label="Default select example" name="role">
                 @foreach($roledata as $r)
                   <option value="{{$r['id']}}">{{$r['name']}}</option>
                 @endforeach
             </select>
           </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Email</label>
            <input type="email" class="form-control" id="message-text" name="email">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Password</label>
            <input type="password" class="form-control" id="message-text" name="password">
          </div>
          <input type="hidden" name="update" value="0">
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
        </form>
      </div>
      
    </div>
  </div>
      </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text(recipient)
  //modal.find('.modal-body input').val(recipient)
})
</script>
<!---------modal close----->
@endsection

