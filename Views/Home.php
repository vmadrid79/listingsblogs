<?php
    require_once "Layouts/header.php";
?>
<h1>Home View loading...</h1>
<a href="/listingsblogs/listings">See all Listings</a>

<hr />
<div class="wrapper">
 <div class="box" style="align-content:center;">
  <form id='addPropertyListing' role="form" method="POST">

    <div style="margin-top:4px;padding-left:10px;"><h3>Add New Listing:</h3></div>
    <table style="padding:10px; width:350px; margin: 10px 10px;">
    <tr>
        <td>Address:</td>
        <td><input type='text' id='address' name='address' required /></td>
    </tr>
    <tr>
        <td>City:</td> 
        <td><select id='city_id' name='city_id' required>
        <option value="" selected disabled hidden>--Select City--</option>
    <?php
        //Load cities
        foreach($cities as $city)
        {
            echo "<option value='".$city['id']."'>".$city['city']."</option>";
        }
    ?>
    </select></td>
    </tr>
    <tr>
        <td>Property Type:</td>
        <td> <select id='propertyType_id' name='propertyType_id' onchange="checkCondo(this);" required>
        <option value="" selected disabled hidden>--Select Property Type--</option>
    <?php
        //Load propertyTypes
        foreach($propertyTypes as $type)
        {
            echo "<option value='".$type['id']."'>".$type['type']."</option>";
        }
    ?>
    </select></td>
    </tr>
    <tr>
        <td style="vertical-align:top;">Description:</td>
        <td> <textarea id='description' name='description' required ></textarea><br />
        </td>
    </tr>
    <tr>
        <td>Price:</td>
        <td> <input type='number' id='price' name='price' required /><br />
        </td>
    </tr>
    <tr>
        <td>Approx Sqft:</td>
        <td> <input type='number' id='sqft' name='sqft' value="350" required min="350"/><br />
        </td>
    </tr>
    <tr>
        <td>Bedrooms:</td>
        <td> <input type='number' id='bedrooms' name='bedrooms' value="0" required /><br />
        </td>
    </tr>
    <tr>
        <td>Washrooms:</td>
        <td> <input type='number' id='washrooms' name='washrooms' value="1" min="1" required /><br />
        </td>
    </tr>
    <tr>
        <td>Floors:</td>
        <td> <input type='number' id='floors' name='floors' value="1"  min="1" required /><br />
        </td>
    </tr>
    <tr>
        <td>Parking spots:</td>
        <td> <input type='number' id='parkings' name='parkings' value="0" required /><br />
        </td>
    </tr>
    <tr>
        <td>Lockers:</td>
        <td> <input type='number' id='lockers' name='lockers' value="0" disabled /><br />
        </td>
    </tr></table><br />
    <input type="submit" name="submit" value="Add Listing" /><br />
  </form>
 </div>

 <div class="box">
 <div id="form-response" style="margin-top:4px;padding-left:10px;">
    <!-- For web server response -->
    </div>    
 </div>

<script>
    function checkCondo(e){
        if(e.value!=6){
            //document.getElementById("lockers").style.display = "none";
            document.getElementById("lockers").disabled = true;
        }else{
            // document.getElementById("lockers").style.display = "";
            document.getElementById("lockers").disabled = false;
        }
    }
    var tt;
    $('#addPropertyListing').submit(function(event){
        //var input = $('#addPropertyListing').contents().find('input,select,textarea');        
        // console.log("test2: " + input);
        //Stop page from refreshing
        event.preventDefault();
        event.stopImmediatePropagation();

        //var request_method = $(this).attr("method"); //get form GET/POST method
	    //var input = $(this).serialize(); //Encode form elements for submission
	        
        let check = true;
        console.log("checking form...");
        
        if(check){
            //var serializedFD = $(input).serialize();
            //var serializedFD = $(this).serialize();
            //console.log("serializedFormData:: " + serializedFD);
            let formResponse = $('#form-response');
      
            let formData = {"propertyType_id": $("#propertyType_id").val(), "city_id": $("#city_id").val(), "address": $("#address").val(), "description": $("#description").val(), "price": $("#price").val(), "sqft": $("#sqft").val(), "bedrooms": $("#bedrooms").val(), "washrooms": $("#washrooms").val(), "floors": $("#floors").val(), "parkings": $("#parkings").val(), "lockers": $("#lockers").val()};
            console.log("formData: " + formData);
            $.ajax({
                type: "POST",
                url: "http://localhost/listingsblogs/create",
                contentType: "application/json",
                dataType: 'json',
                data: JSON.stringify(formData)
                //data: serializedFD,
            }).done(function(data) {
                tt = data;
                let status = "SUCCESS: ";
                if(data.status == 99){
                    status = "FAIL: ";
                    $("#form-response").css({"color": "red", "font-weight":"bold"});
                }
                console.log(status + data.message);
                $("#form-response").html('<h3>'+ data.message + '</h3><br />');
                if(data.status!= 99){
                    $("#form-response").css({"color": "green", "font-weight":"bold"});
                    $("#form-response").append("Address: " + formData.address + '<br />Description: ' + formData.description + "<br />Price: " + formData.price + "<br />Approx Sqft: " + formData.sqft + "<br />Bedrooms: " + formData.bedrooms + "<br />Washrooms: " + formData.washrooms + "<br />Floors: " + formData.floors + "<br />Parkings: " + formData.parkings + "<br />Lockers: " + formData.lockers);
                    $("#addPropertyListing")[0].reset();
                }
                
            }).fail(function(data){
                console.log("FAIL: " + data.message);
                $("#form-response").css({"color": "red", "font-weight":"bold"});
                $("#form-response").html('<h3>'+ data.message + '</h3><br />');
                $("#addPropertyListing")[0].reset();
            });
        }
        return check;
    });
</script>

<?
require_once "Layouts/Footer.php";
?>