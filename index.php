<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<script src="./js/jquery-1.9.1.min.js"></script>   
<script src="./js/jquery.cookie.js"></script>
 
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
</style>
<script type="text/javascript"> 
 var currentTab = 0; 
 //page load event for loading previous state of forms 
$(window).load(function() {
         // Run code
// Current tab is set to be the first tab (0)
 
   var userid = $.cookie("userid");
    if ((userid!= null )&&(userid != "")&&(userid!="0")) {
        alert("Welcome again " );
         $.ajax({
                type:'post',
                url:'get_info.php',
                data: 'id='+ userid, 
                dataType: 'json',                
                success: function(data){
                   // setting loaded data in form 
                    $('input[name=fname]').val(data[0]);
                    $('input[name=lname]').val(data[1]);
                    $('input[name=tel]').val(data[2]);
                    $('input[name=street]').val(data[3]);
                    $('input[name=hnumber]').val(data[4]);
                    $('input[name=zcode]').val(data[5]);
                    $('input[name=city]').val(data[6]);
                    $('input[name=acountowner]').val(data[7]);
                    $('input[name=iban]').val(data[8]);
                    $('input[name=uid]').val(userid);
                   currentTab=data[10];
                   showTab(currentTab); 
        }
    });
    }
    else
    {
    currentTab=0;
    showTab(currentTab); 
    
    }

    // Display the crurrent tab

});
 

 
 
</script>
<body>

<form id="regForm" action="/action_page.php">
  <h1>Registeration:</h1>
  <!-- One "tab" for each step in the form: -->
  <div class="tab">Insert personal information:
    <input type="hidden" id="uid" name="uid" value="0">
    <p>First name<input placeholder="First name..." oninput="this.className = ''" name="fname"></p>
    <p>Last name<input placeholder="Last name..." oninput="this.className = ''" name="lname"></p>
    <p>Telephone<input placeholder="Telephone..." oninput="this.className = ''" name="tel"></p>
  </div>
  <div class="tab">Insert address information:
    <p>Street<input placeholder="Street..." oninput="this.className = ''" name="street"></p>
    <p>House Number<input placeholder="House Number..." oninput="this.className = ''" name="hnumber"></p> 
     <p>Zip Code<input placeholder="Zip Code..." oninput="this.className = ''" name="zcode"></p> 
     <p>City<input placeholder="City..." oninput="this.className = ''" name="city"></p> 
  </div>
  <div class="tab">Insert payment information:
    <p>Account Owner<input placeholder="Account Owner ..." oninput="this.className = ''" name="acountowner"></p>
    <p>IBAN<input placeholder="IBAN" oninput="this.className = ''" name="iban"></p>
  </div>
   <div class="tab">Result:
    
        <h1><p id="result"  align='center'></p></h1>
        <input type="hidden" value="" name="result" id="result">  
        <input type="hidden" value="" name="paydata" id="paydata">
     
     
  </div>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>

<script>
 // Storing Data in Database and store User_ID in Cookie 
    function save_data(n) {  
                    
      if(n>0){
          if(n>2)n='';
      $.ajax({    //create an ajax request to display.php
        type: "post",
        data: 'uid='+ $('input[name=uid]').val()+'&fname='+ $('input[name=fname]').val()+'&lname='+ $('input[name=lname]').val()
        +'&tel='+ $('input[name=tel]').val()+'&street='+ $('input[name=street]').val()+'&hnumber='+ $('input[name=hnumber]').val()+
        '&zcode='+ $('input[name=zcode]').val()+'&city='+ $('input[name=city]').val()+'&acountowner='+ $('input[name=acountowner]').val()+'&iban='+ $('input[name=iban]').val()
        +'&result='+ $('input[name=result]').val()+'&status='+ n +'&paydata='+ $('input[name=paydata]').val(),
        url: "set_info.php",             
        dataType: "html",   //expect html to be returned                
        success: function(data){ 
         $('#uid').val(data);      
         $.cookie('userid',data);          
        }

    });  }
};
//API Fetch info Function 
function Check_From_API(data){// pass your data in method
     result='';
     $.ajax({
             type: "POST",
             url: "https://37f32cl571.execute-api.eu-central-1.amazonaws.com/default/wunderfleet-recruiting-backend-dev-save-payment-data",
             data:data,
             contentType: "application/json;",
             crossDomain: true,
             dataType: "json",
             success: function (data, status, jqXHR) {

                 result=data['paymentDataId'];
                 return result;
             },
             error:function (xhr, ajaxOptions, thrownError){
                if(xhr.status==404) {
                  result='You sould change Enteredn Information-[fail' + thrownError+'] - Go back...'  ;
                }
                if(xhr.status==400) {
                  result='You sould change Enteredn Information-[fail' + thrownError+'] - Go back...'  ;
                }
                alert(); 
                 
                 document.getElementById("prevBtn").style.display = "inline";
                 return result;
             }
            
    });
}    
// Get Information from API 
function get_payment()
{    
    result='' ;
    customer_id=$('input[name=uid]').val();
    iban=$('input[name=iban]').val();
    account_ouwner=$('input[name=acountowner]').val();
    result=Check_From_API("{\"customerId\":" + customer_id+ ",\"iban\":\""+ iban+ "\" ,\"owner\":\"" + account_ouwner+ "\"}");
    $("#result").text(result);
    $.cookie('userid',''); 
}
//Showing current Tab
function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  document.getElementById("nextBtn").style.display = "inline"; 
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  
  if(n==2)
  {
    document.getElementById("nextBtn").innerHTML = "Submit";  
  }
  else
  if (n == (x.length - 1)) {
      get_payment();
      
       document.getElementById("nextBtn").style.display = "none";
       document.getElementById("prevBtn").style.display = "none";
  } else {
   
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = parseInt(currentTab)+ parseInt(n);
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  save_data(currentTab);
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>

</body>
</html>
