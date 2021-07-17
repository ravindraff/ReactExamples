React Basics:
=================================
1.npx create-react-app signfront
2.cd signfront
3.mkdir signback
4.cd signback
5.npm init
6.npm install express nodemon mongoose dotenv cors
7.create server.js in signback
	const express = require('express');
	const app = express();

	app.listen(4000,()=>console.log("server is up and running"));
8. "scripts": {
    "start": "nodemon server.js"
  },
9.npm run start
10.create routes folder in signback
11.create new file routes.js in routes folder
	const express = require('express');
	const router = express.Router();
	router.post('/signup',(request,response) =>{
		response.send('send');
	})

	module.exports = router;
12.Create Models foler inside signback 
13.Create new file SignUpModels.js inside Models Folder
	const mongoose = require('mongoose');
	const SignUpTemplate = new mongoose.Schema({
		fullName:{
			type :String,
			required :true,
		},
		username:{
			type :String,
			required :true,
		},
		email:{
			type :String,
			required :true,
		},
		password:{
			type :String,
			required :true,
		},
		date:{
			type:Date,
			Default:Date.now,
		}
	})

	module.exports = mongoose.model('mytable',SignUpTemplate)
	
14.change router.js file:
	const express = require('express');
	const router = express.Router();
	const signUpTemplateCopy = require('../models/SignUpModels');
	router.post('/signup', (request, response) => {
		const signedUpUser = new signedUpTemplateCopy({
			fullName: request.body.fullName,
			username: request.body.username,
			email: request.body.email,
			password: request.body.password
		})
		signedUpUser.save().then(data => {
			response.json(data)
		}).catch(error => {
			response.json(error)
		})
	})

	module.exports = router;
15.Create mongodb access
16.create .env file inside signback folder
17.inside .env file
	DATABASE_ACCESS = "mongodb+srv://myproject:myproject@cluster0.6mktf.mongodb.net/myFirstDatabase?retryWrites=true&w=majority";
18.Change Server.js file
	const express = require('express');
	const app = express();
	const mongoose = require('mongoose');
	const dotenv = require('dotenv');
	const routesUrls = require('./routes/routes');
	const cors = require('cors');

	dotenv.config();
	mongoose.connect(process.env.DATABASE_ACCESS,()=>console.log("Database Connected"))

	app.use(express.json())
	app.use(cors())
	app.use('/app',routesUrls)
	app.listen(4000,()=>console.log("server is up and running"));
	
	
	
	
	
	###Steps:
	1.create new folder
	2.open folder after execute this command npm init
	3.npm i express morgan nodemon ejs body-parser dotenv mongoose axios
	