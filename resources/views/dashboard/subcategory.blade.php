@extends('layouts.master')

@section('home_content')
<div class="home_content">
 <div class="left" id="text"><font color="green"><h2>SUBCATEGORY</h2></font></div>
 <div class="left" id="add"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-update="0"><img src="images/Add.png" height="80px" width="80px"></button></div>
 <div class="show">     
 </div>


<table class="table table-striped"><!--table table-dark table-striped--->
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Sub-Category Name</th>
      <th  scope="col">Image</th>
      <th scope="col">Category Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($subcategory as $subcat)
    <tr id="{{$subcat['id']}}">
      <th scope="row">{{$subcat['id']}}</th>
      <td>{{$subcat['name']}}</td>  
      <td><img src="/subcategoryimage/{{$subcat['image']}}" height="70px" width="50px"></td>
      <td>     
        <button type="button" class="btn btn-info btn-sm">
          @if($subcat->cateGory!=null)        {{App\Models\Subcategory::getCateGoryName($subcat->cateGory->category_id)}}
          @else
            Empty
          @endif
        </button>
      </td>
      <td>
        <a href="#"><button type="button" class="btn btn-danger" data-target="#exampleModal" data-toggle="modal" data-title="Updating" data-id="{{$subcat['id']}}" data-subcategory="{{$subcat['name']}}" data-category="@if($subcat->cateGory!=null)        {{App\Models\Subcategory::getCateGoryName($subcat->cateGory->category_id)}}
          @else
            Empty
          @endif" data-update="1" data-category_id="@if($subcat->cateGory!=null)
          {{$subcat->cateGory->category_id}}
          @endif" data-img="{{$subcat['image']}}">Edit</button></a>
  
        <a href="/deletesubcategory/?id={{ $subcat['id']}}"><button type="button" class="btn btn-danger" onclick='deLetemd({{ $subcat["id"]}},"/deletesubcategory")'>Delete</button></a>
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
        <h5 class="modal-title" id="exampleModalLabel">Register New SubCategory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="insertsubcategory" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Sub Category Name</label>
            <input id="subcategory" type="text" class="form-control" id="recipient-name" name="name">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Select category</label>
            <select id="mySelect" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="category">
              <option value="null" selected disabled>category name</option>
              @foreach($category as $cat)
              <option value="{{$cat['id']}}">{{$cat['name']}}</option>
              @endforeach
      
            </select>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">upload image</label>
            <input type="file" class="form-control" id="recipient-name" name="image">
          </div>
          <!-----radio----->


          <input id="update" type="hidden" name="update" value="0">
          <input id="subcategory_id" type="hidden" name="subcategory_id">

          <div class="modal-footer">
            <img id="modal_image" src="a.jpg" height="70px" width="50px">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      <!---Modal close----->
      
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
  $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var update = button.data('update') // Extract info from data-* attributes
 
  if(update=='0'){
    // If necessary, you could initiate an AJAX request here (and then do   the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text("Register New SubCategory")
    //modal.find('.modal-body input').val(recipient)
  }
  else if(update=='1'){
    category=button.data('category');
    var modal = $(this)
    modal.find('.modal-title').text("Updating SubCategory")
    modal.find('#subcategory').val(button.data('subcategory').trim())
    modal.find('#subcategory_id').val(button.data('id'))
    modal.find('#update').val(button.data('update'))

    category=button.data('category_id');
    image=button.data('img');
    document.getElementById("mySelect").value=category.trim();//category;
    document.getElementById('modal_image').src="/categoryimage/"+image;

  }
 
})
</script>

@endsection
