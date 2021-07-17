const express = require('express')
const app = express()
const dotenv = require('dotenv')
const morgan = require('morgan')
dotenv.config({path:'config.env'})
const PORT = process.env.PORT || 8081

app.use(morgan('tiny'))

app.get('/', (req, res) => {
    res.send("CRUD Application");
})
app.listen(PORT, () => {
            console.log("server is running on http://localhost:"+PORT);
        })