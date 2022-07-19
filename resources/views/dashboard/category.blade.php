@extends('layouts.master')

@section('home_content')
   <div class="home_content" style="overflow: scroll;">
       <div class="left" id="text"><font color="green"><h2>CATEGORY</h2></font></div>
       <div class="left" id="add"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat" data-update="0"><img src="images/Add.png" height="80px" width="80px"></button></div>
    <div class="show">     
      </div>

  <!---category list---->
<table class="table table-striped"><!--table table-dark table-striped--->
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category Name</th>
      <th scope="col">Image</th>
      <th scope="col">Sub-Category</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $cat)
    <tr id="{{$cat['id']}}">
      <th scope="row">{{$cat['id']}}</th>
      <td>{{$cat['name']}}</td>  
      <td><img src="/categoryimage/{{$cat['image']}}" height="70px" width="50px"></td>
      <td>  
         @foreach($cat->subCategory as $sub)   
        <button type="button" class="btn btn-info btn-sm">{{App\Models\Category::getSubCateGoryName($sub->subcategory_id)}}</button>
        @endforeach
      </td>
      <td>
        <a href="#"><button type="button" class="btn btn-danger" data-target="#exampleModal" data-toggle="modal" data-title="Updating" data-id="{{$cat['id']}}" data-img="{{$cat['image']}}" data-update="1" data-name="{{$cat['name']}}">Edit</button></a>
  
        <a href="#"><button type="button" class="btn btn-danger" onclick='deLete({{ $cat["id"]}},"/deletecategory")'>Delete</button></a>
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
        <h5 class="modal-title" id="exampleModalLabel">Register New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" action="insertcategory" method="POST">
          @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Category Name</label>
            <input id="name" type="text" class="form-control" id="recipient-name" name="name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Select Image</label>
            <input type="file" class="form-control" id="recipient-name" name="image">
          </div>       
        
         
         <input id="update" type="hidden" name="update" value="0">
         <input id="id" type="hidden" name="id" value="0">


          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
        </form>
      </div>
      <!---Modal close----->
      
    </div>
  </div>
      </div>
      <div id="msg">this is error</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  var update=button.data('update')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  if(update=="0"){
  }
  else if(update=="1"){
    category=button.data('name').trim()
    id=button.data('id');
    modal.find('.modal-title').text('Updating category')
    modal.find('#name').val(category)
    modal.find('#update').val("1");
    modal.find('#id').val(id);


  }
  
  

})
</script>

@endsection
