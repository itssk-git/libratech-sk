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
       
        .header1
        {
            display: flex;
            justify-content: center;
            text-align: center;
            align-items: center;
            color: #088178;
            font-size: 40px;
            font-weight: 150px;
            margin: 2%;
            text-decoration: underline;
        }

        /* .container {
            width: 100%;
            margin:10px 8%;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            align-items: flex-start; /* Changed to align items to the top 
            min-height: 70vh;
            background-color: #f2ee3;
            color: #088178;
            animation: fadeIn 1s ease-in-out;
        }
        .library,
        .management-system {
            flex: 1;
            padding: 20px;
           width: 33.33vh;
            height: 60vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            background-color: #fff;
            margin: 10px;
            transition: transform 0.3s ease-in-out;
        }
        .library img,
        .management-system img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            animation: scaleIn 1s ease-in-out;
        }
        .library h1,
        .management-system h1 {
            font-size: 25px;
            margin-bottom: 13px;
        }
        .library p,
        .management-system p {
            font-size: 16px;
            text-align: center;
            flex: 1; /* Added to make paragraphs grow as needed 
        }
        .library:hover,
        .management-system:hover {
            transform: translateY(-10px);
        } */

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            align-items: flex-start; /* Changed to align items to the top */
            height: 70vh;   
             background-color: #f2ee3;
             margin:5% 8%;
            color: #088178;
            animation: fadeIn 1s ease-in-out;
        }
        .library,
        .management-system {
            flex: 1;
            padding: 20px;
            max-width: 400px;
            height: 70vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            background-color: #fff;
            margin: 10px;
            transition: transform 0.3s ease-in-out;
        }
        .library img,
        .management-system img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            animation: scaleIn 1s ease-in-out;
        }
        .library h1,
        .management-system h1 {
            font-size: 25px;
            margin-bottom: 10px;
        }
        .library p,
        .management-system p {
            font-size: 16px;
            text-align: center;
            flex: 1; /* Added to make paragraphs grow as needed */
        }
        .library:hover,
        .management-system:hover {
            transform: translateY(-10px);
        }
/*feature block*/


.card-group
{
   display: flex;

   margin:5% 8%;
   border-radius: 10px;
   padding 20px;
   box-shadow: 0 2px 6px 4px rgba(0, 0, 0, 0.1);
}
.card-img-top
{
    height: 50vh;
    width: 100%;
    border-radius: 10px;

}

.card
{

    border:none;
    margin: 5px;
    width: 30%;
    border-radius: 10px;

}

.card-text1
{
    height: 10vh;
}


        .founders {
            display: flex;
            padding: 20px;
     
            display: flex;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            background-color: #fff;
            margin:5% 8% ;
        }
        .founders h2 {
            font-size: 24px;
            margin-bottom: 10px;
            text-align: center;
        }
        .founders .founder {
            margin-bottom: 20px;
            display: flex;
            
            align-items: center;
            width: 50%;
            flex-direction: column;
            justify-content: space-around;
        }
        .founders .founder img {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            margin: 10px 10px 40px 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            animation: scaleIn 1s ease-in-out;
        }
        .founders .founder p {
            font-size: 16px;
            margin: 2px;
             text-align: center;
}
        

        .insidecontain
        {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        /* Animations */
       
    </style>


<div class="header1">About Us</div>
  
  <div class="container">
      <div class="library">
          <img src="./library.jpg" alt="Library">
          <h1>LibraTech Library</h1>
          <p>
              Our library is located in Gwarko inside swoyambo international college. Different books are available in library that can be used on after getting the membership of library. Big space available where you all can do your research comfortably 
          </p>
      </div>

      <div class="library">
          <img src="./logo.png" alt="Library">
          <h1>LibraTech System</h1>
          <p>
              Our website allows the students of Swoyambu international college to reserver the books that are available in the library. After the aproval of admin the request will be apporoved and the book will be issued then user can came and collect.
          </p>
      </div>

      <div class="management-system">
          <img src="./motive.png" alt="Management System">
          <h1>Our Motive</h1>
          <p>
              Our Main objective is to help the students have the easy access of the library books. with the help of our site user can easily identify the books available can hold the books this will save the time and energy of user. 
          </p>
      </div>
  </div>

  

  <div class="header1">Our Features</div>
<div class="card-group">

  <div class="card">
      <img src="./available.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Available Books</h5>
        <p class="card-text1">You can see the books that are available in our library in this website in main page. </p>
        <p class="card-text"><small class="text-body-secondary">Libra Tech</small></p>
      </div>
  </div>
  <div class="card">
    <img src="./reserve.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Reserve Books</h5>
      <p class="card-text1"> User can reserve books from our system and collect the reserved book later form library</p>
      <p class="card-text"><small class="text-body-secondary">LibraTech</small></p>
    </div>
  </div>
 
 
  <div class="card">
    <img src="./fine.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Fine system</h5>
      <p class="card-text1">If books are not returned in the given time then you will be fined with certain amount that will be notified in your profile page</p>
      <p class="card-text"><small class="text-body-secondary">LibraTech</small></p>
    </div>
  </div>
</div>

<div class="header1">Developers</div>

  <div class="founders">
    
      <div class="insidecontain">
      <div class="founder">
          <img src="./user.jpg" alt="Founder 1">
          <p>Sachin Karki</p>
          <p>BCA 4th Semester</p>
          <p>Student of Swyombhu Int College</p>
          <p>Lalitpur, Gwarko</p>
      </div>
      <div class="founder">
          <img src="./user.jpg" alt="Founder 2">
          <p>Sahil Pradhan</p>
          <p>BCA 4th Semester</p>
          <p>Student of Swyombhu Int College</p>
          <p>Lalitpur, Gwarko</p>
      </div>
  </div>
</div>







<?php
include '../includes/footer.php'
?>
</div>