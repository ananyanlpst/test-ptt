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

            <br>    
            <h2 class="p-3 bg-secondary text-white text-center rounded">ผ ล ไ ม้</h2>
            <br>

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3 text-right">
                    <button class="btn btn-info btn-sm" id="btn_add" name="btn_add">เพิ่มผลไม้</button>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3 input-group">
                    <input type="text" placeholder="Search here" class="form-control" id="search_fruit"> &nbsp;&nbsp;
                    <button type="button" class="btn btn-outline-secondary btn-sm" id="btn_search">Search</button>
                </div>
            </div>

            <br><br>    

            <table class="table text-center">
                <thead>
                    <tr class="table-success">
                        <th scope="col">ชื่อผลไม้</th>
                        <th scope="col">รูปภาพ</th>
                    </tr>
                </thead>

                <tbody>
                </tbody>

            </table>
        </div>
    </body>
</html>

<script>

$( document ).ready(function() {

    getData();

    $('#btn_add').click(function(){
        window.open("number_3_content.php");
    });

    $('#btn_search').click(function(){
        searchData();
    });
});

function getData(){

    var html = '';
    $.ajax({
        type: 'get',
        url: 'http://localhost:3000/getData',
        success: function (data) {
            $.each(data, function(key, val){
                html += '<tr>';
                html += '<td>'+ val.name +'</td>';
                html += '<td>';
                html += '<img alt="'+ val.name +'" src="'+ val.img +'" width="150" height="150">';
                html += '</td>';
                html += ' </tr>';
            });

            $("tbody").append(html);
        }
    });
}

function searchData(name){
    var text_search = $('#search_fruit').val();
    var data = {
        text_search
    };

    if(text_search){
        $.ajax({
            type: 'POST',
            url: 'http://localhost:3000/searchData',
            data: JSON.stringify(data),
            contentType: "application/json; charset=utf-8",
            success: function (res) {
                var val = res.message
                
                if(res.status){
                    var html = '';
                        html += '<tr>';
                        html += '<td>'+ val.name +'</td>';
                        html += '<td>';
                        html += '<img alt="'+ val.name +'" src="'+ val.img +'" width="150" height="150">';
                        html += '</td>';
                        html += ' </tr>';
                    
                    $("tbody").html('');
                    $("tbody").append(html);
                } else {
                    alert(val);
                }
            }
        });
    } else {
        location.reload();
    }
}
</script>