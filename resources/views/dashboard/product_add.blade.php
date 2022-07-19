@extends("layouts.master")
@section("product_add")

    <div class="home_content" style="overflow-y:scroll;">
<div class="humberger__menu__logo" style="margin-left: 45%;">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>

<div class="row">
  <form action="productinsert" method="POST" enctype="multipart/form-data">
            @csrf

  <div class="col-6 product-floatleft" style="max-width:99%;">    
  <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            
        </x-slot>

            <!-- Email Address -->
            <div>             
              <center><button type="submit" style="color:green">SUBMIT</button></center>
            </div> 
            <div>
                <span>Name</span>
                <input id="productname" class="block mt-1 w-full" type="text" name="name" required autofocus>
            </div>

            <div>
                <span>SELECT  MAJOR SKILL</span>
                <select id="category" onchange="getSubCategory(this.value)" class="block mt-1 w-full" aria-label=".form-select-lg example" name="category">
                  <option value="null" selected disabled>SKILL name</option>
                  <option value="PYTHON" >PYTHON</option>
                  <option value="JAVA" >JAVA</option>
                  <option value="C++" >C++</option>
                  <option value="LARAVEL" >LARAVEL</option>
                 </select>
            </div>

         
            

            <div>
                <span>Image</span>
                <input type="file" class="block mt-1 w-full" id="recipient-name" name="image[]" multiple>
            </div>    
             
    </x-auth-card>
</x-guest-layout> 


  


</form>
</div>

</div>
<script>
  function getSubCategory(id){
    $('#subcategorySelect').html('')
    $.ajax({
        type:"GET",
        url:"/getsubcategory_by_category_id",
        data:{'id':id},
        success: function(datas) {
         $.each(datas , function(key , data){
         // console.log(datas);
          $('#subcategorySelect').append("<option value='"+data['subcategory_id']+"'>"+data['get_sub_category']['name']+"</option>");

         });
           //
            //console.log(datas);
            //content.html(response);
            //alert(datas);
        }
    });
  }
</script>

    @endsection