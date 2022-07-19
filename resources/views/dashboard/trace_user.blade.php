@extends('layouts.master')

@section('trace_user')
   <div class="home_content" style="overflow-y: scroll;">
       <!----<div class="left" id="text"><font color="green"><h2></h2></font></div>--->
       <!-------search---------->


 <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
              <div class="col-2">
                
              </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            @csrf
                            <form autocomplete="off">
                                <div class="hero__search__categories">
                                    User Trace
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input id="userTrace" type="text" placeholder="What do yo u need?" name="name">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <!----this is autocomplete search---->
                         <ul id="autocomplete" class="list-group" style="position:absolute;margin-left: 195px;margin-top: 50px; width: 300px; z-index: 9999;">
                             
                        </ul>
                        <!------>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

       <!-------search---------->
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
    @can("block")
       <div class="left" id="add"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="none" data-update="0"><img src="images/Add.png" height="80px" width="80px"></button></div>
    @endcan
    <div class="show">     
      </div>
  <table class="table table-striped"><!--table table-dark table-striped--->
  <thead>
    <tr>
      <th scope="col">Order Id</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Shipping Address</th>
      <th scope="col">Mobile Number</th>
      <th scope="col">Product Name</th>
      <th scope="col">Total Price</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="userTraceTable">
    @foreach($alldata as $data)
    @php
      $totalPrice = 0;
      foreach(json_decode($data['products'],true) as $product)
          $totalPrice=$product['get_product']['price']+$totalPrice
    @endphp
    <tr id="{{$data['id']}}">
      <td scope="row">{{($data['order_id'])}}</td>
      <td scope="col">{{json_decode($data['products'],true)[0]['get_shipping_address']['name']}}</td>
      <td scope="col">{{json_decode($data['products'],true)[0]['get_shipping_address']['city_town_village']}}</td>
      <td scope="col">{{json_decode($data['products'],true)[0]['get_shipping_address']['number']}}</td>

      <td>@foreach(json_decode($data['products'],true) as $product)<button class="btn btn-success btn-sm" style="margin-left:5px">{{$product['get_product']['name']}}</button>@endforeach</td>  
      <td>{{$totalPrice}}</td>
      
      <td><a href="#">
        <form action="#" method="get">
          <select id="status" onchange="update_order_status({{$data['id']}},'order_status_update',this.value)">
            <option value="COD" @if($data['payment_type']=='COD') || $data['payment_type']==null) selected @endif>Unpaid*</option>
            <option value="E-SEWA" @if($data['payment_type']=='E-SEWA') selected @endif>
              Paid*
            </option>

      </select>
      </form>
      <td>            

          <!-----dropdown action------>

          <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-ellipsis-v"></i>
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="/track?order_id={{$data['order_id']}}">view</a>
              <a class="dropdown-item" href="#" onclick="deLete({{$data['id']}},'/order_delete')">Delete</a>
              @if($data['cancel']==0)
              <a class="dropdown-item" href="#" onclick="update_order_cancel({{$data['id']}},'order_cancel',1)">Cancel</a>
              @elseif($data['cancel']==1)
               <a class="dropdown-item" href="#" onclick="update_order_cancel({{$data['id']}},'order_cancel',0)">uncancel</a>
               @endif
            </div>
          </div>
      </td>
      
        @if($data['cancel']==1)
        <td>
          <button class="btn btn-success btn-sm" style="margin-left:5px">Cancelled</button>
        </td>
        @endif
      
    </tr>
    @endforeach
      
  </tbody>
</table>
<!---------modal------------>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register New Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/productadd" method="get">
          @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Product Title</label>
            <input id="name" type="text" class="form-control" name="name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Product Description</label>
            <input id="description" type="text" class="form-control" id="recipient-name" name="description">
          </div>
         <div class="form-group">
            <label for="recipient-name" class="col-form-label">Price</label>
            <input id="price" type="number" class="form-control" name="price">
          </div>
         

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Select category</label>
            <select id="category" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="category">
              <option value="null" selected disabled>category name</option>

              @foreach(App\Models\Category::all() as $cat)
              <option value="{{$cat['id']}}">{{$cat['name']}}</option>
              @endforeach      
            </select>
          </div>


          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Select Sub category</label>
            <select id="subcategory" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="subcategory">
              <option value="null" selected disabled>sub category name</option>
              @foreach(App\Models\Subcategory::all() as $subcat)
              <option value="{{$subcat['id']}}">{{$subcat['name']}}</option>    
              @endforeach  
            </select>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">images</label>
            <input type="file" class="form-control" id="recipient-name" name="image">
          </div>

          <!-----radio----->
          <div class="form-check">
               <input class="form-check-input" type="checkbox" name="show" value="1" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                 Show/hides   
             </label>
           </div>
         
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
    alert("building")
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
