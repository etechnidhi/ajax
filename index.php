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
        <div class="col-8" style = "margin-left:20%;">
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

$(document).ready(function(x){
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
});
    data = {};

// function theSecondFunction(x){
//     data = localStorage.jsonData;         
// }

$("#result").on('keypress','.value',function(e){
    if(e. keyCode == 13){
        alert("hdgfhs");
        localStorage.setItem('jsonData',$("#result").html());
    }
});

$(document).ready(function(){
    $("#result").on('click','.value', function(){
    if($(this).children().eq(0).val()==undefined)
        $(this).html('<input type="text" class="ip" value="'+$(this).text()+'" />');
    });
    $("#result").on('keypress','.ip', function(e){
        if(e.keyCode == 13){
        $(this).parent().html($(this).val());
        // alert($(this).val());
        }
    });
});
</script>            
</body>
</html>

