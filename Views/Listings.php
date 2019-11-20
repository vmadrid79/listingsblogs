<?php
    require_once "Layouts/header.php";
?>

<h1>Listings View loading...</h1>
<a href="/listingsblogs">Add A Listing</a>
<hr />
<?php
    $c = count($listings);
    if($c >= 1){
?>
    <h4>All Listings: </h4>
<?php  } ?>
<div class="wrapper" style="align-content:center;">
 <?php  
  if($c < 1){
    echo "<div class='box' ><h3>No Property Listings Available.</h3>Use link above to add a listing.</div>";
  }else{
    //Load Property Listings
    foreach($listings as $listing)
    {   
        echo '<div class="box" >';
        foreach($listing as $key => $value){
            echo ucfirst($key).": {$value} <br />";
        }
        echo '</div>';
    }
  }
?>

 </div>

 
<?
require_once "Layouts/Footer.php";
?>