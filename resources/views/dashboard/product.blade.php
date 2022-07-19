@extends('layouts.master')

@section('home_content')
   <div class="home_content" style="overflow: scroll;">
       <div class="left" id="text"><font color="green"><h2>View Applied Job</h2></font></div>
       @if(Illuminate\Support\Facades\Session::has('insertMessage'))
        <p class="left alert {{ Session::get('alert-class', 'alert-info') }}" style="margin-left: 300px">{{ Illuminate\Support\Facades\Session::get('insertMessage') }}</p>
      @endif
      @if ($errors->any())
    <div class="left alert alert-danger" style="margin-left: 300px">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
       <div class="left" id="add"><a href="/productadd"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="none" data-update="0"><img src="images/Add.png" height="80px" width="80px"></button></a></div>
    <div class="show">     
      </div>
  <table class="table table-striped"><!--table table-dark table-striped--->
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Client Name</th>
    
      <th scope="col">SKILL</th>
      
      <th scope="col">Resume</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($alldata as $data)
    <tr id="{{$data['id']}}">
      <th scope="row">{{$data['id']}}</th>
      <td>{{$data['name']}}</td>  
     
      <td>
        <button type="button" class="btn btn-info btn-sm">{{$data['category']}}</button>
      </td>
    
      <td>
        <a href="/product/@if(json_decode($data['image'])!=null){{json_decode($data['image'])[0]}}@endif"><button>View</button></a>
        <!--<img src="/product/@if(json_decode($data['image'])!=null){{json_decode($data['image'])[0]}}@endif" alt="VIEW" height="70px" width="50px">--->
      </td>
      <td>
        <a href="#"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-name="{{$data['name']}}" data-price="{{$data['price']}}" data-description="{{$data['description']}}" data-category="{{$data['category_id']}}" data-subcategory="{{$data['subcategory_id']}}" data-update="1" data-id="{{$data['id']}}">Edit</button></a>
        <!----roledelete/?id=$d['id']--->
        <a href="#"><button type="button" class="btn btn-danger" onclick='deLete("{{$data["id"]}}","/productdelete")'>Delete</button></a>
      </td>
    </tr>
    @endforeach
      
  </tbody>
</table>
<!---------modal------------>


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
  var recipient = button.data('whatever') // Extract info from data-* attributes
  var update = button.data('update');
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  //modal.find('.modal-title').text('New User Register md' + recipient)
  //modal.find('.modal-body input').val(recipient)

  if(update=="0"){
  
  }
  else if(update=="1") {
    var productName=button.data("name");
    var productCategory=button.data("category");
    var productSubCategory=button.data("subcategory");
    var price=button.data("price");
    var description=button.data("description");
    var id=button.data("id");
    console.log(productSubCategory+"<-sub"+productCategory);

    //

    modal.find('.modal-title').text("Updating Product")
    modal.find('#category').val(productCategory)
    modal.find('#subcategory').val(productSubCategory)
    modal.find('#price').val(price)
    modal.find('#description').val(description)
    modal.find("#name").val(productName);
    modal.find("#id").val(id);


    //modal.find('#update').val(button.data('update'))
/*
    category=button.data('category_id');
    image=button.data('img');
    document.getElementById("mySelect").value=category.trim();//category;
    document.getElementById('modal_image').src="/categoryimage/"+image;
    */
  }
})
</script>

@endsection
