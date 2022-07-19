<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <style>
        .product{padding-top: 1px;}
    </style>
</head>

<body>
    <!-- Page Preloder---> 
    <div id="preloder">
        <div class="loader"></div>
    </div>


  

<!---hero section---->
@yield('hero')

<!----end hero section---->

<!----categories contents--->
@yield('categories')
<!----end categories section--->

<!----Discount------------->
@yield('discount')
<!---end discount---------->


<!----featured start------->
@yield('featured')
<!----feaatured stop--------->

<!-----latest product----->
@yield('latestproduct')
<!------latest product end----->

<!------blog section---->
@yield('blog')
<!------end blog--------->

<!----shoap-detail---->
@yield('shoap-details')
<!------->

<!----shoaping-cart---->
@yield('shoping-cart')
<!--------------------->

<!---checkout---------->
@yield('checkout')
<!---------------------->

<!----user login-------->
@yield('userlogin')
<!----end login--------->

<!----user register----->
@yield('userregister')
<!---------------------->

<!----order------------->
@yield('order')
<!--------------------->



    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function deLete(id,routeUrl){
Swal.fire({
  title: 'Do you want to deLete?',
  showCancelButton: true,
  confirmButtonText: 'Yes',
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
        $.ajax({
               type:'GET',
               url:routeUrl,
               //data:{'_tosken' : <php echo csrf_token() ?>, 'id':id},
               data:{'id':id},
               success:function(data) {
                  //$("#msg").html(data.msg);
                  $('#'+id).remove();
                  Swal.fire('deleted Sucess!!', '', 'success')
               }
            });    
  } 
})
}
function addToCart(id,routeUrl,update){
    if($("#quantity").val()>=0){
        var quantity=$("#quantity").val();
    }
    else{
        var quantity=1;
    }
    Swal.fire({
  title: 'Do you want to Add to Cart?',
  showCancelButton: true,
  confirmButtonText: 'Yes',
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
        $.ajax({
               type:'GET',
               url:routeUrl,
               //data:{'_token' : <php echo csrf_token() ?>, 'id':id},
               data:{'product_id':id,'quantity':quantity,'update':update},
               success:function(data) {   
                  var count=parseInt($("#numberOfCart").text());             
                  $("#numberOfCart").html(count+1);
                  //$('#'+id).remove();
                  Swal.fire('Added Sucess!!', '', 'success')
               }
            });    
  } 
})
}
</script>
<!----sort by price---->
<script>
function sortByprice(value) {
    if(value == "0"){
        var ascending = true;
    }
    if(value == "1"){
        var ascending = false;
    }
    var sorted = $('.sortprice_products').sort(function(a,b){
        return (ascending ==
               (convertToNumber($(a).find('.price').html()) < 
                convertToNumber($(b).find('.price').html()))) ? 1 : -1;
    });
    ascending = ascending ? false : true;

    $('#sortprice').html(sorted);
}

function convertToNumber(value){
    //alert(value)
    return parseFloat(value.replace('$',''));
}

/*
$(document).ready(function () {
    $('#productajax').html('');
  $.ajax({
        type:"GET",
        url:"/usingajax",
        dataType:"json",
        success: function(response){
            //console.log(response.products)
            $.each(response.products,function(key,product){
                console.log(product['get_subcategory']['name'])
                $('#productajax').append('<!---prorducts------>\
                <div class="col-lg-3 col-md-4 col-sm-6 mix '+product['get_subcategory']['name']+'">\
                    <div class="featured__item">\
                        <div class="featured__item__pic set-bg" data-setbg="/product/'+product["image"]+'">\
                        <img src="/product/'+product["image"]+'">\
                            <ul class="featured__item__pic__hover">\
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>\
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>\
                                <!--insertcart?product_id=product["id"]--->\
                                <li><a href="#"><i class="fa fa-shopping-cart" onclick="addToCart(product->id,"/insertcart","add")"></i></a></li>\
                            </ul>\
                        </div>\
                        <div class="featured__item__text">\
                            <h6><a href="/shoapdetail?id='+product["id"]+'">'+product["name"]+'</a></h6>\
                            <h5>Rs.'+product["price"]+'</h5>\
                        </div>\
                    </div>\
                </div>\
                <!----end products----->');
            });
        }

  });
});
*/
$( "#autocompleteInput" ).keyup(function(event) {
    $('#autocomplete').html("");
    $.ajax({
        type:"GET",
        url:"/searchproduct",
        data:{'name':this.value,'ajax':"true"},
        success: function(datas) {
            $('#autocomplete').append(datas)
            //console.log(datas);
            //content.html(response);
        }
    });
});

function searchSet(setWord){
    $("#autocompleteInput").val(setWord);
}

function PaymentFormActionChange(value){
    //alert("change");
    if(value=="COD"){
     $('#paymentform').attr('action', '/billingaddress');
     $('#paymentform').attr('method', 'get');
    }
    else if(value=="E-SEWA"){
        $('#paymentform').attr('action', 'https://uat.esewa.com.np/epay/main');
        $('#paymentform').attr('method', 'post');
    }
}

</script>
<!---end sort by price--->
</body>
</html>
