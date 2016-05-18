/* 
	An example of connecting to a MySQL database. This example
	shows how to establish multiple connections by using a connection
	pool.
*/

(function() {
	"use strict";
	
	var Express = require('express'),
			bodyParser = require('body-parser'),
			mysql = require('mysql'),
			app = new Express(),
			pool = mysql.createPool({
				connectionLimit : 100,
				host : 'localhost',
				user : 'root',
				password : 'root',
				database : 'user',
				debug : false
			});
	
	app.use(bodyParser.urlencoded({ extended: true }));
	
	function handleDatabase(req, res) {
		pool.getConnection(function(err, connection) {
			if (err) {
				connection.release();
				res.json({"code" : 100, "status" : "Error in connection database"});
			}
			
			console.log("connected as id " + connection.threadId);
			
			connection.query("select * from artist", function(err, rows) {
				connection.release();
				if (!err) {
					res.json(rows);
				}
			});
			
			connection.on("error", function(err) {
				res.json({"code" : 100, "status" : "Error in connection database"});
				return;
			});
		});
	}
											 
	app.get("/", function(req, res) {
			handleDatabase(req, res);
	});
	
	app.listen(3000);
	console.log("server listening on port 3000");
}());