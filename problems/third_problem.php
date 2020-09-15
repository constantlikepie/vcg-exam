<div class="mt-4">
    Arrange the numbers from the given array <input type="text" name="to-array" class="col-lg-3" id="to-array" class="form-control" value="8,2,3,6,1,5,11,7,4,9"/> from lowest to highest
</div>

<div class="mt-4">
    <button id="sort-btn" class="btn btn-primary">Show answer</button>
</div>

<div class="mt-4">
    Sorted (lowest to highest) : <label id="sorted"></label>
</div>

<script>
    function sortArray(){
        var to_array = document.getElementById("to-array").value;
        var array = to_array.split(",");
        for(var i = 0; i < array.length; i ++){
            for(var j = 0; j < array.length; j ++){
                if(parseInt(array[j]) > parseInt(array[j+1])){
                    var temp = array[j+1];
                    array[j+1] = array[j];
                    array[j] = temp;
                }
            }
        }
        return array;
    }
    document.getElementById("sort-btn").addEventListener("click", function(){
        document.getElementById("sorted").innerHTML = sortArray().toString();
    });
    document.getElementById("to-array").addEventListener("keyup", function(){
        document.getElementById("sorted").innerHTML = sortArray().toString();
    });
    document.getElementById("sorted").innerHTML = sortArray().toString();
</script>