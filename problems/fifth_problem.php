<div class="mt-4">
    Get the list of three letter combinations that can be formed with the letters of  <input type="text" name="combination" class="col-lg-3" id="combination" class="form-control" maxlength="3" value="ABC"/>
</div>

<div class="mt-4">
    <button id="get-combinations" class="btn btn-primary">Show answer</button>
</div>

<div class="mt-4">
    Combinations : <label id="combinations"></label>
</div>

<script>
    function swap(combination, str_index_start, str_index_end){
        var temp = "";
        console.log(combination);
        var arr = combination.split("");
        temp = arr[str_index_start];
        arr[str_index_start] = arr[str_index_end];
        arr[str_index_end] = temp;
        var ret = arr.toString();
        return arr.toString().replace(",","");
    }
    function printCombinations(combination, str_index_start, str_index_end){
        
        if(str_index_start == str_index_end){
            combination = combination.replace(",","");
            document.getElementById("combinations").innerHTML = document.getElementById("combinations").innerHTML + " [" + combination.toString()+"]";
        }
        else{
            for (var i = str_index_start; i <= str_index_end; i++) 
            {
                combination = combination.replace(",","");
                combination = swap(combination, str_index_start, i);
                printCombinations(combination, str_index_start + 1, str_index_end); 
                combination = combination.replace(",","");
                combination = swap(combination, str_index_start, i); 
            } 
        }
    }
    function getCombinations(){
        document.getElementById("combinations").innerHTML = "";
        var combination = document.getElementById("combination").value;
        printCombinations(combination, 0, combination.length - 1);
    }
    document.getElementById("get-combinations").addEventListener("click", function(){
        getCombinations();
    });
    document.getElementById("combination").addEventListener("keyup", function(){
        getCombinations();
    });
    getCombinations();
</script>