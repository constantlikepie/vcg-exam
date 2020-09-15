<div class="mt-4">
    Tim earned $ <input type="number" step="any" step=".01" name="earned" class="col-lg-2" id="earned" class="form-control" value="100" min="1" />
on the first day. If he earned two times the amount of money earned the day before each day, how much did he earn in the first
<input type="number" name="days" class="col-lg-2" id="days" class="form-control" value="7" min="1" /> day(s)?
</div>

<div class="mt-4">
    <button id="calculate-btn" class="btn btn-primary">Show answer</button>
</div>

<div class="mt-4">
    Total earned : $<label id="total-earned"></label>
</div>

<script>
    function calculateTotalEarned(){
        var earned = parseInt(document.getElementById("earned").value);
        var days = parseInt(document.getElementById("days").value);
        if(earned < 1 || days < 1)
            return 0;
        var day_earned = earned;
        var total_earned = day_earned;
        for(var i = 1; i <= days-1; i++){
            day_earned = day_earned * 2;
            total_earned = day_earned + total_earned;
        }
        return total_earned;
    }
    document.getElementById("calculate-btn").addEventListener("click", function(){
        document.getElementById("total-earned").innerHTML = calculateTotalEarned();
    });
    document.getElementById("earned").addEventListener("keyup", function(){
        document.getElementById("total-earned").innerHTML = calculateTotalEarned();
    });
    document.getElementById("days").addEventListener("keyup", function(){
        document.getElementById("total-earned").innerHTML = calculateTotalEarned();
    });
    document.getElementById("total-earned").innerHTML = calculateTotalEarned();
</script>