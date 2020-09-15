<div class="mt-4">
Aaron wants to know how much candy his container can hold. The container is 
<input type="number" name="tall" class="col-lg-2" id="tall" class="form-control" value="20" min="1" /> centimeters tall, 
<input type="number" name="long" class="col-lg-2" id="long" class="form-control" value="10" min="1" /> centimeters long and 
<input type="number" name="wide" class="col-lg-2" id="wide" class="form-control" value="10" min="1" /> centimeters wide. What is the container’s volume?
</div>

<div class="mt-4">
    <button id="calculate-btn" class="btn btn-primary">Show answer</button>
</div>

<div class="mt-4">
    Answer : <label id="total-volume"></label> centimeter(s)
</div>

<script>
    function calculateVolume(){
        var tall = parseInt(document.getElementById("tall").value);
        var long = parseInt(document.getElementById("long").value);
        var wide = parseInt(document.getElementById("wide").value);
        var volume = tall*long*wide;
        return volume;
    }
    document.getElementById("calculate-btn").addEventListener("click", function(){
        document.getElementById("total-volume").innerHTML = calculateVolume();
    });
    document.getElementById("tall").addEventListener("keyup", function(){
        document.getElementById("total-volume").innerHTML = calculateVolume();
    });
    document.getElementById("long").addEventListener("keyup", function(){
        document.getElementById("total-volume").innerHTML = calculateVolume();
    });
    document.getElementById("wide").addEventListener("keyup", function(){
        document.getElementById("total-volume").innerHTML = calculateVolume();
    });
    document.getElementById("total-volume").innerHTML = calculateVolume();
</script>