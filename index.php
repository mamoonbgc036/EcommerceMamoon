<?php
session_start();
include_once("inc/header.php");
include_once('autoload.php');
$dbInstance = DB::getInstance();
$categories = $dbInstance->read('categories','')->results();
?>

<div id="homeContent">
    <div class="card" id="about">
          <h2>Our Mission</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>      
     <div class="card" id="categorydiv">
         <h2 class="text-center">Our Products Categories</h2>
            <div class="categorySection">
             <ul>
             <?php
               if($categories){
                   foreach($categories as $categorie){
            ?>
           <li><a href="categoryShow.php?category=<?=$categorie['catId']?>&catName=<?=$categorie['catName']?>"><?=$categorie['catName']?></a>
          <img src="categoryImage/<?=$categorie['image']?>" alt="">
           </li>
         <?php
             }
           }
        ?>
          </ul>
       </div>
      </div> 
      <div class="card" id="noticediv">
          <h2>Events</h2>
          <ul>
              <li><a href="">Grab Apple x with 40% discount</a></li>
              <li><a href="">Grab Apple x with 40% discount</a></li>
              <li><a href="">Grab Apple x with 40% discount</a></li>
              <li><a href="">Grab Apple x with 40% discount</a></li>
              <li><a href="">Grab Apple x with 40% discount</a></li>
              <li><a href="">Grab Apple x with 40% discount</a></li>
              <li><a href="">Grab Apple x with 40% discount</a></li>
              <li><a href="">Grab Apple x with 40% discount</a></li>
              <li><a href="">Grab Apple x with 40% discount</a></li>
              <li><a href="">Grab Apple x with 40% discount</a></li>
          </ul>
      </div>
</div>                      
<?php
include_once("inc/footer.php");
?>
