<?php

echo '
<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <title>BlogListing API webapp</title>
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<style>
  .wrapper {
    display: grid;
    grid-template-columns: 350px 350px;
    grid-gap: 30px;
    background-color: #fff;
    color: #444;
  }

  /* tr:nth-child(even) {background: #CCC}*/
  
  .box:nth-child(odd) {background: ##E8E8E8}
  
  a{
    color:#3C3C3C;
    font-size: 20px;
  }
  a:hover{
    color: #707070;
  }
</style>
</head>
<body>
';

?>