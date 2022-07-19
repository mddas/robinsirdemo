<html>
<head>
    <meta charset="UTF-8">
    <title> Role Permisson </title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
     .text{
       font-size:19px;
     }
    </style>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-2">
     
    </div>
    <div class="col-7">
 
        <form action="/insertrole" method="get" class="text">
          @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">RoleName</label>
            <input type="text" class="form-control" id="recipient-name" name="Name" value="{{$allrole['name']}}" disabled>
          </div>
          <!-----radio----->
          @foreach($permissions as $pd)
          <div class="form-check">
               <input class="form-check-input" type="checkbox" name="permissonlist[]" value="{{$pd['id']}}" id="flexCheckDefault" 
               @foreach($role_per_Permission as $a => $b) 
                  @if($b->id == $pd->id)
                    checked
                  @endif
                @endforeach >
              <label class="form-check-label" for="flexCheckDefault">
                    {{$pd['name']}}
             </label>
           </div>
         @endforeach
       
         <input type="hidden" name="roleid" value="{{$allrole['id']}}">
         <input type="hidden" name="update" value="1">

          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
        </form>
     
      <!---Modal close----->
    </div>
    <div class="col-3">
      
    </div>
  </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>

    </body>
    </heaad>