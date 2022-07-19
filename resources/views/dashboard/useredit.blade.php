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
        .left{
          float:left;
        }
        #add{
          float:right;
        }
        #text{
          margin-top:20px;
        }
    </style>
</head>
<body>
<div class="modal-body">
<div class="container">
  <div class="row">
    <div class="col-3">
      <!---One of three columns--->
    </div>
    <div class="col-7">
    <form action="insertuser" method="get">
          @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name</label>
            <input type="text" class="form-control" id="recipient-name" name="Name" value="{{$userdata['name']}}">
          </div>
          @can('role')
          <div class="form-group">
            <label for="message-text" class="col-form-label">Role</label>       
            <select class="form-select" aria-label="Default select example" name="role">
                @foreach($roles as $r)                    
                    @if($r['name']==$role[0])                       
                        <option value="{{$r['id']}}" selected>{{$r['name']}}</option>
                    @else
                        <option value="{{$r['id']}}">{{$r['name']}}</option>
                    @endif
                @endforeach
             </select>
           </div>
           @endcan
          <div class="form-group">
            <label for="message-text" class="col-form-label">Email</label>
            <input type="email" class="form-control" id="message-text" name="email" value="{{$userdata['email']}}">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Password</label>
            <input type="password" class="form-control" id="message-text" name="password">
          </div>
          <input type="hidden" name="update" value="1">
          <input type="hidden" name="id" value="{{$userdata['id']}}">
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
        </form>
      </div>
    </div>
    <div class="col-1">
      <!---One of three columns--->
    </div>
  </div>
</div>
       
      
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
</body>
</html>
