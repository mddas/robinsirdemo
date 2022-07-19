
<!DOCTYPE html> 
<html lang="en" dir="ltr">
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
        .modal-backdrop{
          z-index: 9  ;
        }
        .modal-footer{
          margin-bottom:0px;
        }
        .form-check{
          margin:15px;
          float:left;
        }
        .sidebar{
            width:112px;
        }
        .home_content{
            left:100px;
        }
        #log_out{
            left:64%;
        }
        .sidebar #btn{
            left:64%;
        }
    </style>
    </head>
<body>
   <div class="sidebar">
     <div class="logo_content">
       <div class="logo">
         <div class="logo_name">RolePermisson</div>
       </div>
       <i class='bx bx-menu' id="btn"></i>
     </div>
     <ul class="nav_list">
       <li>
          <i class='bx bx-search'></i>
          <input type="text" placeholder="Search...">
          <span class="tooltip">Search</span>
       </li>
       <li>
        <a href="/dashboard">
         <i class='bx bx-grid-alt'></i>
         <span class="links_name">DASHBOARD</span>
        </a>
        <span class="tooltip">DSHBOARD</span>
      </li>
       <li>
         <a href="user">
          <i class='bx bx-user'></i>
          <span class="links_name">USERS</span>
         </a>
         <span class="tooltip">USERS</span>
       </li>
       <li>
        <a href="role">
         <i class='bx bx-chat'></i>
         <span class="links_name">ROLE</span>
        </a>
        <span class="tooltip">ROLE</span>
      </li>
      <li>
        <a href="permisson">
         <i class='bx bx-pie-chart-alt-2'></i>
         <span class="links_name">PERMISSON</span>
        </a>
        <span class="tooltip">PERMISSON</span>
      </li>
      <li>
        <a href="/dashboard">
         <i class='bx bx-cog'></i>
         <span class="links_name">SETTING</span>
        </a>
        <span class="tooltip">SETTING</span>
      </li>
     </ul>
     <div class="content">
       <div class="user">
         <div class="user_details">
           <img src="images/profile.jpg" alt="">
           <div class="name_job">
             <!-- <div class="name">Bhaskar Gupta</div>
             <div class="job">Web Designer</div> -->
           </div>
         </div>
        <!-- <a href="#" class='bx bx-log-out' id="log_out" style="text-decoration: none;"></a>
         <div class='bx bx-log-out' id="log_out">{{ Auth::user()->name }}</div>--->
     
     <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <button href="#" class='bx bx-log-out' id="log_out" style="text-decoration: none;"></button>
                            </x-dropdown-link>
                        </form>
       </div>
     </div>
   </div>
   