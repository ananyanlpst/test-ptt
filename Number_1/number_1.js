for(var i = 1; i <= 9; i++){

    var text = '';
    for(var j = 9-i; j > 0; j--){
        text += " ";
    }

    for(var k = 0; k < i; k++){
        text += i+" ";
    }

    console.log(text);
}