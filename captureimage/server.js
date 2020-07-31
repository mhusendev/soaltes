const express = require('express');
const path = require('path');
const bodyParser = require('body-parser');
const hbs = require('hbs');
// pembuatan App Express
const app = express();
const fs = require('fs');
const mime = require('mime');

// memparse reques content-type - application/x-www-form-urlencoded
app.use(bodyParser.json({limit: '50mb'}));
app.use(bodyParser.urlencoded({limit: '50mb', extended: true}));

// mendefinisikan router

app.set('app',path.join(__dirname,'app'));

app.set('view engine', 'hbs');
// listen for requests
// Konfigurasi Database
const MongoClient = require('mongodb').MongoClient.connect('mongodb://localhost:27017', { useUnifiedTopology: true })
  .then(client => {
    console.log('Connected to Database')
    const db = client.db('capture')
    const quotesCollection = db.collection('image')




app.post('/upload', (req, res) => {

 

let data = {image:req.body.urlimage};

  quotesCollection.insertOne(data)
    .then(result => {
      res.redirect('/')
    })
    .catch(error => console.error(error))
})

app.get('/',(req,res)=>{
  
  res.render('home');

})



  })
  .catch(error => console.error(error));

app.listen(3000, () => {
    console.log("Server is listening on port 3000");
});