const express = require('express')
const cors = require('cors');
const fs = require('fs');
const { request } = require('http');
const app = express();

app.use(cors());
app.use(express.json())

app.get('/getData', (req, res) => {
    var obj = JSON.parse(fs.readFileSync('./data.json', 'utf8'));
    res.json(obj.data);
});

app.post('/addData', (req, res) => {
    var { name } = req.body;
    var { img } = req.body;

    var obj = JSON.parse(fs.readFileSync('./data.json', 'utf8'));

    var found_data = true;

    for(var val in obj.data){
        var val_name = obj.data[val].name;
        if(val_name == name){
            found_data = false;
        }
    }

    if(!found_data){
        res.json({
            status: false,
            message: 'มีผลไม้ชนิดนี้เรียบร้อยแล้ว'
        });
        return false;
    }

    obj.data.push({
        name,
        img
    });

    fs.writeFile("./data.json", JSON.stringify(obj), function(err) {
            if (err) throw res.json({
                status: false,
                message: err
            });

            res.json({
                status: true,
                message: ''
            });
        }
    );

});

app.post('/searchData', (req, res) => {
    var { text_search } = req.body;

    var obj = JSON.parse(fs.readFileSync('./data.json', 'utf8'));

    var status = false;
    var message = 'ไม่พบข้อมูล';

    for(var val in obj.data){
        var val_name = obj.data[val].name;
        if(val_name == text_search){
            status = true;
            message = obj.data[val];
        }
    }

    res.json({
        status,
        message
    });

});

app.listen(3000, function(){
    console.log("Express server listening on port 3000");
});