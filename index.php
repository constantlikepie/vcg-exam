<?php include_once("layout_head.php"); ?>

<main role="main">
  <div class="jumbotron">
    <div class="container">
      <h2 class="display-5">Raffle</h2>
            <h4>Names added: </h4>
            <div class="mb-5" id="names"></div>
            <div id="inputs-container">
                <input type="text" class="form-control col-md-4 float-left" name="name" id="name" />
                <input type="button" class="btn btn-primary" id="add-name-btn" value="Submit">
            </div>
            <div class="mt-5" id="start-raffle-container"><input type="button" class="btn btn-primary" id="start-raffle" value="Start Raffle"></div>
            <div class="mt-4" id="random-call-container"><input type="button" class="btn btn-primary" id="raffle-call" value="Random Call"></div>
    </div>
  </div>
</main>
<script>
    var current_names;
    function randomCall(){
        var random_number = Math.floor((Math.random() * current_names.length));
        var name = current_names[random_number].name;
        alert(name+" is "+"choosen.");
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert(name+" was "+"removed.");
                displayNames();
                if(current_names.length <= 1){
                    alert("No more names remain. Raffle ended.");
                    window.location.href = "index.php";
                }
            }
        };
        xhttp.open("POST", "api/delete_name.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("name="+name);
    }

    function addName(){
        var name = document.getElementById("name").value;
        if(name.length > 0){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if(this.responseText == "Cannot add the same name."){
                        alert(this.responseText);
                    }
                    displayNames();
                }
            };
            xhttp.open("POST", "api/create_name.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("name="+name);
        }else{
            alert("Name must have atleast 1 character.")
        }
    }

    function displayNames(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("name").value = "";
                var names = JSON.parse(this.responseText);
                current_names = names;
                if(names.length > 0){
                    document.getElementById("names").innerHTML = "";
                    for(var i = 0; i < names.length; i++){
                        document.getElementById("names").innerHTML = document.getElementById("names").innerHTML+" [ "+names[i].name+" ] ";
                    }
                }
            }
        };
        xhttp.open("GET", "api/read_all.php", true);
        xhttp.send();
    }
    
    document.getElementById("add-name-btn").addEventListener("click", function(){
        addName();
    });

    document.getElementById("start-raffle").addEventListener("click", function(){
        document.getElementById("inputs-container").style.display = "none";
        document.getElementById("start-raffle-container").style.display = "none";
        document.getElementById("random-call-container").style.display = "block";
    });

    document.getElementById("raffle-call").addEventListener("click", function(){
        randomCall();
    });

    document.getElementById("random-call-container").style.display = "none";
    displayNames();

</script>
<?php include_once("layout_foot.php"); ?>