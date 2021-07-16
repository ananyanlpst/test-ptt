<html>
    <head>
        <meta charset= utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <title>TEST PTT Number 3.</title>
    </head>

    <body>
        <div class="container">
            <form>
                <br>    

                <h3 class="p-2 bg-secondary text-white text-center rounded">C r e a t e</h3>
                <br>

                <div class="row form-group">
                    <div class="col-md-4"></div>
                    <label >Name: </label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="name_fruit" >
                    </div>
                    <div class="col-md-4"></div>
                </div>  

                <div class="row form-group">
                    <div class="col-md-4"></div>
                    <label >Photo: </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="img_fruit">
                        </div>
                    <div class="col-md-4"></div>
                </div>  

                <div class="row form-group">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 text-center">
                        <button type="button" class="btn btn-success btn-sm" id="btn_save">Save</button>
                        <button type="button" class="btn btn-secondary btn-sm" id="btn_cancel">Cancel</button>
                    </div>
                    <div class="col-md-4"></div>
                </div>  
            </form>
        </div>
    </body>
</html>

<script>

$( document ).ready(function() {

    $('#btn_save').click(function(){
        saveData();
    });

    $('#btn_cancel').click(function(){
        window.open("number_3.php");
    });
});

function saveData(){

    var name = $("#name_fruit").val();
    var img = $("#img_fruit").val();
    var html = '';

    if(!name || !img){
        if(!name && img){
            alert("กรุณาระบุชื่อผลไม้");
        } else if(!img && name){
            alert("กรุณาใส่ Link รูปภาพ");
        } else if(!name && !img){
            alert("กรุณาระบุข้อมูลทุกช่อง");
        }
        return false;
    }

    var data = {
        name,
        img
    };

    $.ajax({
        type: 'POST',
        url: 'http://localhost:3000/addData',
        data: JSON.stringify(data),
        contentType: "application/json; charset=utf-8",
        success: function (res) {
            if(res.status){
                alert('Successfully!');
                window.open("number_3.php");
            } else {
                alert(res.message);
                console.log(res.message);
            }
        }
    });
}

</script>