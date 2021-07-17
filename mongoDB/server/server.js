const express = require('express')
const app = express()
const mongoose = require('mongoose')
const DATABASE_ACCESS = "mongodb+srv://myfirstproject:myfirstproject@cluster0.iuxoy.mongodb.net/myFirstDatabase?retryWrites=true&w=majority";
const routesUrl = require('./router/router')
const cors = require('cors');
mongoose.connect(DATABASE_ACCESS, () => console.log("Database connected"))

app.use(express.json())
app.use(cors())
app.use('/app', routesUrl)
app.listen(5000, () => console.log("Serveri up and running"));