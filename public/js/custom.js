$(document).ready(function() {
    // Create Machinery
// Routes js logic for each page
var url = window.location.href ;

switch(url){

    case "http://localhost:8080/PharmaMachinery/processInfo":
        showPlants();
        break;
    case "http://localhost:8080/PharmaMachinery/charts":
        showPlants();
        break;
    case "http://localhost:8080/PharmaMachinery/input":
        showPlants();
        break;
    case "http://localhost:8080/PharmaMachinery/download":
        showPlants();

        break;
    case "http://localhost:8080/PharmaMachinery/retrievalProcess/showProcess":
        showProcessData();
        break;
    case "http://localhost:8080/PharmaMachinery/CreatePlant/createPlant":
        addMachinery();
        break;
    case "http://localhost:8080/PharmaMachinery/charts/chartss":
        getCharts();
        break;
    case "http://localhost:8080/PharmaMachinery/input/showProcess":
        showMachinerySubparts();
        getProcesses();
        break;
    case "http://localhost:8080/PharmaMachinery/Comment/ViewProcessFeedback":
        showCommentsForProcess();

        break;
    default:

}

// Retrieves and dusplays all plants
function showPlants(){

    $.ajax({
        url: "http://localhost:8080/PharmaMachinery/retrievalMachinery/retrievePlant",
        data: "",
        dataType: 'json',
              success: function(data){
                    
                    for (i = 0; i < data.length; i++) { 
                         var text = data[i].name;
                          array1 = text.split( data[i]);
                          array1 = $.unique(array1);
                          $('#selectPlantProcess').append('<option>'+array1+'</option>');
                    }
                    
                    },
                    error: function(){
                        console.log('Failed to load data');   
                    }
                });
}

    //End show plants

    // Show Process Data

function showProcessData(){
    $.ajax({
        url: "http://localhost:8080/PharmaMachinery/retrievalProcess/showProcesData",
        data: {type:"booking", plantName: localStorage.getItem('pName'), plantMachinery: localStorage.getItem('mName')},
        type:"POST",
        dataType: 'json',
              success: function(data){
                    // Set values machNameProcessDisplay
                    processNumber = 1;
                    plantNamed = localStorage.getItem('pName');
                    machName= localStorage.getItem('mName');
                    
                    if(data.length != 0){
                        document.getElementById('machNameProcessDisplay').innerHTML = " -> "+plantNamed+" -> "+machName;

                        for (i = 0; i < data.length; i++) { 
                          $('#heyss').append(processNumber +". <label>"+data[i].name+"</label>"+"<p class='well well-lg' >"+data[i].description+"</p>");
                            processNumber++;
                          }
                       }else{
                          $('#heyss').append("No machinery found for "+localStorage.getItem('mName')+"<br />To <b>add processes</b> for "+localStorage.getItem('mName')+" click <a style='color:blue' id='cursored'>here</a>.");
                       }
                               
                    },
                    error: function(){
                        console.log('Failed to load data');  

                    }
                });
   }

   // Add Machinery
function addMachinery(){
    $("#addMachinerySubmit").click(function() {
        $.post("http://localhost:8080/PharmaMachinery/submit", {
            machineName: $('#machineryName').val(),
            machDesc: $('#machDescription').val(),
            date1: $('#aquirydate').val(),
            date2: $('#expiryDate').val(),
            maintanance: $('#maintananceDate').val()
        }, function(data) {
            $("#response").html(data);
            clearFields();
        });
    });
}

//Showing Subparts for machinery
function showMachinerySubparts(){
    $.ajax({
        url: "http://localhost:8080/PharmaMachinery/retrievalProcess/retrieveMachSubparts",
        data: {type:"showMachSubparts", plantMachinery: localStorage.getItem('mName')},
        type:"POST",
        dataType: 'json',
              success: function(data){
                    //$('#machSubparts').append('<option>'+data+'</option>');
                    for (i = 0; i < data.length; i++) { 
                         var text = data[i].name;
                          array1 = text.split( data[i]);
                          array1 = $.unique(array1);
                          $('#machSubpartsfailed').append('<option>'+array1+'</option>');
                    }
                    
                    },
                    error: function(){
                        console.log('Failed to load data');   
                    }
                });
}

    // End showMachinerySubparts

//Showing Subparts for machinery
function showCommentsForProcess(){
    $.ajax({
        url: "http://localhost:8080/PharmaMachinery/Comment/retrieveProcessFeedback",
        data: {type:"showMachSubparts", plantMachinery: localStorage.getItem('mName')},
        type:"POST",
        dataType: 'json',
              success: function(data){
                console.log(data);

                    if(data.length == 0){
                        $('#commentProcessOutput').append('No commments have been made');
                    }
                    
                    for (i = 0; i < data.length; i++) { 
                         var name = data[i].user;
                         var date = data[i].dateUser;
                         var comment = data[i].comment;
                         var processName = data[i].processTested;
                          name = name.split( data[i]);
                          name = $.unique(name);
                          date = date.split( data[i]);
                          date = $.unique(date);
                          comment = comment.split( data[i]);
                          comment = $.unique(comment);
                          processName = processName.split( data[i]);
                          processName = $.unique(processName);
                          $('#commentProcessOutput').append('<div class="well well-sm" style="width:200px; "><b>'+name+' - '+processName);
                          $('#commentProcessOutput').append('<p class="well well-lg">'+comment+'<div class="well well-sm" style="width:200px; margin-left:1340px">Date: '+data[i].dateUser+'</div></p>');
                    }
                    
                    },
                    error: function(){
                        console.log('Failed to load data');   
                    }
                });
}

   
    // Register User

    $("#submitUser").click(function() {
        $.post("http://localhost:8080/PharmaMachinery/register/confirmUser", 
            {role: $('#roll').val(),
             email: $('#email').val(),
             password: $('#password').val(),
             username: $('#username').val() },
         function(data) {
            // Form javascript validations
            roll = document.getElementById("roll").value;
            email = document.getElementById("email").value;
            password = document.getElementById("password").value;
            username = document.getElementById("username").value;
            if(roll!="" && email!="" && password!="" && username!=""){
                $("#useronfirmationOutput").html(data);
                clearFields();

            }else{
                $("#useronfirmationOutput").html(data);
            }
        });
    });

    $("#formSubmitProcess").click(function() {
        $.post(
            "http://localhost:8080/PharmaMachinery/retrievalMachinery", {},
            function(data) {
                //responseProcess
                $("#responseMachinery").html(data);
                clearFields();
            });
    });
    // Open up machinery for subparts
    $("#formSubmitSubparts").click(function() {
        $.post(
            "http://localhost:8080/PharmaMachinery/retrievalMachinery/retrievalMachinerySubparts", {},
            function(data) {
                //responseProcess
                $("#responseMachinery").html(data);
                clearFields();
            });
    });

    $("#updateUser").click(function() {
        $.post("http://localhost:8080/PharmaMachinery/register/updateUser", {
            username: $('#usernameUpdate').val(),
            email: $('#emailUpdate').val(),
            role: $('#rollUpdate').val(),
            id: localStorage.getItem('userID')
        }, function(data) {
            //$("#response").html(data);
            console.log(data);
            location.reload();
            clearFields();
        });
    });

    //Ending Ajax
});



// Displays process inputs
function getVar(selectedMachinery) {
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("responseMachineryName").innerHTML =
                    "Add Process for " + selectedMachinery;
                document.getElementById("responseProcess").innerHTML =
                    xhttp.responseText;
            }
        };
        xhttp.open("POST",
            "http://localhost:8080/PharmaMachinery/retrievalProcess", true);
        xhttp.setRequestHeader("Content-type",
            "application/x-www-form-urlencoded");
        xhttp.send("selectMach=" + selectedMachinery);
    }
    

// Displays subpart inputs
function getSubpartForm(selectedMachinery) {

        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("responseMachineryName").innerHTML =
                    "Add Subpart for " + selectedMachinery;
                document.getElementById("responseProcess").innerHTML =
                    xhttp.responseText;
            }
        };
        xhttp.open("POST",
            "http://localhost:8080/PharmaMachinery/retrievalProcess/retriveSubparts", true);
        xhttp.setRequestHeader("Content-type",
            "application/x-www-form-urlencoded");
        xhttp.send("selectMach=" + selectedMachinery);
    }

// Adds process for the machinery
function addProcess() {
        var xhttp = new XMLHttpRequest();
        var pName = document.getElementById("processName").value;
        var pDesc = document.getElementById("processDescription").value;
        var pMachine = document.getElementById("selectMachine").value;
        clearFields();


        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                // document.getElementById("responseMachineryName").innerHTML = "Add Process for "+selectedMachinery;
                document.getElementById("responseProcesssOutput").innerHTML =
                    xhttp.responseText;
                document.getElementById("finishCreatePlantBTN").style.visibility = "visible";
            }
        };
        xhttp.open("POST",
            "http://localhost:8080/PharmaMachinery/createPlant/createProcessFinal",
            true);
        xhttp.setRequestHeader("Content-type",
            "application/x-www-form-urlencoded");
        xhttp.send("pName=" + pName+"&pDesc="+pDesc+"&pMachine="+pMachine);
    }
    
// Adds subpart for the machinery
function addSubpart() {
        var xhttp = new XMLHttpRequest();
        var subName = document.getElementById("subpartName").value;
        var subDesc = document.getElementById("subDescription").value;
        var subManufacturer = document.getElementById("subpartManufacturer").value;
        var subpAquiry = document.getElementById("subpartAquiry").value;
        var subExpiry = document.getElementById("subpartExpiry").value;
        var sMachine = document.getElementById("selectSubpartMach").value;
        clearFields();

        // Creates Loadin Images
        // var img = document.createElement('img');
        // img.src = 'http://localhost:8080/PharmaMachinery/public/images/newAnimation.gif';
        // document.getElementById('gamediv').appendChild(img);



        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                // document.getElementById("responseMachineryName").innerHTML = "Add Process for "+selectedMachinery;
                document.getElementById("responseProcesssOutput").innerHTML =
                    xhttp.responseText;
                //document.getElementById("finishCreatePlantBTN").style.visibility = "visible";
            }
        };
        xhttp.open("POST",
            "http://localhost:8080/PharmaMachinery/createPlant/createSubpartFinal",
            true);
        xhttp.setRequestHeader("Content-type",
            "application/x-www-form-urlencoded");
        xhttp.send("sName=" + subName+"&sDesc="+subDesc+"&sManufacturer="+subManufacturer+"&sAquired="+subpAquiry+"&sExpired="+subExpiry+"&sMachName="+sMachine);
        //+"&sAquired="+subpAquiry+"&sExpired="+subExpiry+"&sMachName="+sMachine
    }

function clearFields() {
    var elems = document.getElementsByTagName("input");
    var textArea = document.getElementsByTagName("textarea");
    var select = document.getElementsByTagName("select");

    for (var i = elems.length; i--;) {
        elems[i].value = "";
    }
    for (var i = textArea.length; i--;) {
        textArea[i].value = "";
    }

    for (var i = textArea.length; i--;) {
        select[i].value = "";
    }
}



function deleteUser(id) {

    //alert("hey "+id);
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                    location.reload();
                    console.log(xhttp.responseText);
            }
        };
        xhttp.open("POST",
            "http://localhost:8080/PharmaMachinery/register/deleteUser", true);
        xhttp.setRequestHeader("Content-type",
            "application/x-www-form-urlencoded");
        xhttp.send("userID=" + id);
}


function deleteUser(id) {

    //alert("hey "+id);
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                    location.reload();
                    console.log(xhttp.responseText);
            }
        };
        xhttp.open("POST",
            "http://localhost:8080/PharmaMachinery/register/deleteUser", true);
        xhttp.setRequestHeader("Content-type",
            "application/x-www-form-urlencoded");
        xhttp.send("userID=" + id);
}

// Enabling button for Process view Logic as well as processing and rendering of view processes logic
cMach = false;
cPlant = false;

function checkPlant(name){
    setVar = true;
    pName = name;
    var timer=10;
   

    if(setVar){
        inTime();
     }else{
         $("#LoadMachinery").html("Unable to load machinery for"+pName);
     }
     
    function inTime(){
       if(setVar){
        setTimeout(inTime, 1000);

        $("#LoadMachinery").html("Looking for machinery for "+pName+ " "+"<span id='gamediv'></span>");

        var img = document.createElement('img');
        img.src = 'http://localhost:8080/PharmaMachinery/public/images/newAnimation.gif';
        document.getElementById('gamediv').appendChild(img);

        
        document.getElementById("pButton").disabled = true;
         //document.getElementById("loadingmessage").style.visibility = "visible"; 
        if(timer == 7){
            $("#LoadMachinery").html("Machinery loaded succesfully for "+pName);
            localStorage.setItem('pName', pName);
            $.post("http://localhost:8080/PharmaMachinery/retrievalMachinery/findMachinery", {plantName:pName}, function(data){
                $("#realTime").html(data);
                setVar = false;
                  // Enables green button
                 cPlant = true;

                enableViewProcess();
                document.getElementById("pButton").disabled = true;

            });
            // Checks to see if the request to php came back as successs
                timer=11;
                clearTimeout(inTime);

        }
        timer--;
    
    }

}
   
        
   
}

function checkMach(value){

    cMach = true;
    localStorage.setItem('mName', value);
    enableViewProcess();
}


function enableViewProcess(){

    if(cMach == true && cPlant == true){
      //document.getElementsByName("pButton").style.visibility="visible"; 
      document.getElementById("pButton").disabled = false;
      cMach = false;
      cPlant = false;
         
    }
}


// End of processing view process logic

// Edit Users

function editUserButton(id){

    $.post("http://localhost:8080/PharmaMachinery/register/updateUserShowDetails", {userID:id},  function(data){

        obj = JSON.parse(data);
        document.getElementById("updateUserTitle").innerHTML = "Update user "+obj[0].username;
        document.getElementById("usernameUpdate").value = obj[0].username;
        document.getElementById("emailUpdate").value = obj[0].email;
        document.getElementById("rollUpdate").value = obj[0].role;
        localStorage.setItem('userID', id);

    });

}


