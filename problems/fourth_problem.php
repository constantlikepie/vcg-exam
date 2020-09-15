<div class="mt-4">
    Aaron alone can finish a piece of work in <input type="number" name="aaron-days" class="col-lg-1" id="aaron-days" class="form-control" value="12" min="1" /> days and Brandon alone can do it in 
    <input type="number" name="brandon-days" class="col-lg-1" id="brandon-days" class="form-control" value="15" min="1" /> days. If both of them work at it together, how much time will they take to finish it?
</div>

<div class="mt-4">
    <button id="calculate-btn" class="btn btn-primary">Show answer</button>
</div>

<div class="mt-4">
    Total days : <label id="total-days"></label>
</div>

<script>
    function gcd(aaron_days, brandon_days){
        if (aaron_days == 0)  
            return brandon_days;  
        return gcd(brandon_days%aaron_days, aaron_days);
    }
    function addFraction(aaron_days,brandon_days){
        var den = gcd(aaron_days,brandon_days);
        den = (aaron_days*brandon_days) / den;
        var num = (den/aaron_days) + (den/brandon_days);

        var common_factor = gcd(num,den);  
  
        den = den/common_factor;
        num = num/common_factor;
        return (den/num).toFixed(3);
    }
    function calculateTotalDays(){
        var aaron_days = parseInt(document.getElementById("aaron-days").value);
        var brandon_days = parseInt(document.getElementById("brandon-days").value);
        return addFraction(aaron_days,brandon_days);
    }
    document.getElementById("calculate-btn").addEventListener("click", function(){
        document.getElementById("total-days").innerHTML = calculateTotalDays();
    });
    document.getElementById("aaron-days").addEventListener("keyup", function(){
        document.getElementById("total-days").innerHTML = calculateTotalDays();
    });
    document.getElementById("brandon-days").addEventListener("keyup", function(){
        document.getElementById("total-days").innerHTML = calculateTotalDays();
    });
    document.getElementById("total-days").innerHTML = calculateTotalDays();
</script>