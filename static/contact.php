<div>
<?php
include '../includes/header.php'
?>


<style>
   body {
            font-family: 'Varela Round', sans-serif;
            margin: 0;
            padding: 0;
        }
    .icon i
    {
        color: green;
        
    }
    .icon i:hover
    {
      color: darkgreen;
      
    }
.icon
{
  text-align: center;

}
    .container
    {
      display: flex;
      justify-content: center;
    }
    .card
    {
      width: 40vw;
      box-shadow: 0 2px 6px 4px rgba(0, 0, 0, 0.1);
      margin: 5%;
      border: none;
    }

    h1
    {
      color: #088178;
      text-align: center;
      margin: 20px 0px;
    }

    .list-group-flush
    {
      text-align: center;
      margin: 20px 0px;
    }
  
    .map
    {
      margin-left: 30px;
    }
</style>




<div class="container">
    <div class="card" >
        <img src="./college.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h1 class="card-title" style="color: #088178;">Contact us</h1>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Number : 9815234765/9876453265</li>
          <li class="list-group-item">Email: Admin123@gmail.com/Admin456@gmail.com</li>
          <li class="list-group-item">Library Address: Lalitpur,Gwarkho</li>
          <li class="list-group-item">Hours : 10:00 - 18:00, Mon - Sat</li>
          <div class="card-body">
            <div class="follow">
                <div class="icon">
                  <a href="https://www.facebook.com/"> <i class="fa-brands fa-square-facebook"></i></a>
                   <a href="https://www.instagram.com/"> <i class="fa-brands fa-square-instagram"></i></a>
                   <a href="https://www.twitter.com/"> <i class="fa-brands fa-square-twitter"></i></a>
                </div>
            </div>
        </div>
        </ul>
       
        <h1>Map</h1>
        <img src="./mao.png" class="card-img-top map" alt="...">
        </div>
        
      </div>
    





<?php
include '../includes/footer.php'
?>
</div>