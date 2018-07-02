<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JSON</title>
    <link rel="stylesheet" href="http://killstreak.pe.hu/theFramework/res/css/theframework.css">
    <script src="jquery-3.3.1.min.js"></script>
    <!-- <script src="index.js"> -->
</head>
<body>
    <div class="row">
        <h1 class="centerAlign">JSON</h1>
        <hr><br>
        <div class="col-12">
            <label>
                <button class="button" onclick='theFunction(this)'>GET JSON</button>
                <button class="button" onclick='theSecondFunction(this)'>GET FROM LOCALSTORAGE</button>
                <button class="button" onclick='theLastFunction(this)'>SET TO LOCALSTORAGE</button>
            </label>
    <br>
            <div class="row">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody id="result">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
            <div class="row"><hr>
                <h3 class="centerAlign">Maximum Efforts</h3>
            </div>
<script>

    function theFunction(x){
        $("#result").html('');
        $.ajax({
            url : "json.php",
            type : "post",
            dataType: "json",
            data : {name:x.value},
            success : function(data){
                var outp = "";
                data.forEach(element => {
                    outp = '<tr>';
                    outp+= '<td class="value">'+element.id+'</td>';
                    outp+= '<td class="value">'+element.firstname+'</td>';
                    outp+= '<td class="value">'+element.lastname+'</td>';
                    outp+= '<td class="value">'+element.email+'</td>';
                    outp+= '</tr>';
                $("#result").append(outp);
                });    
                localStorage.setItem('jsonData',$("#result").html());
            }
        });
    }
 data = {};
function theSecondFunction(x){
    data = localStorage.jsonData;         
}

function theLastFunction(x){
    localStorage.setItem('jsonData',$("#result").html());
}

$(document).ready(function(){
    $("#result").on('click','.value', function(){
    if($(this).children().eq(0).val()==undefined)
        $(this).html('<input type="text" class="ip" value="'+$(this).text()+'" />');
    // else
    //     $(this).html('<input type="text" value="'+$(this).text()+'" />');
    });
    $("#result").on('focusout','.ip', function(){
        $(this).parent().html($(this).val());
        // alert($(this).val());
    });
});
</script>            
</body>
</html>

