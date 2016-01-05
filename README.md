# BackDoor API

BackDoor is an RESTFul API in PHP language with design pattern MVC.

## Index

* [BackDoor API structure](#backdoor_api_structure)
* [Concept](#concept)

## BackDoor API structure

You have an index that load all core system.
You can define the libraries and config files to load in `/config/default.php`.
You can define the models in `/models`, in my example the models files extend a library `model_json` for manage a data files to type JSON.
The controllers extend `Controller`, a class controller with the default method `GET`, `POST`, `PUT` and `DELETE`.

```
/.htaccess
/index.php
/config
	default.php
/core
	core.php
	config.php
	controller.php
	data.php
	error.php
	loader.php
	request.php
	router.php
	sessions.php
	utils.php
/libraries
	/*Models_SQL.php*/
	model_json.php
	/*Datamapper.php*/
	XV_Controller.php
/controllers
	users.php
	helloworld.com
/models
	user.php
/data
	data.users.json
```

## Concept

If you install the frameworks directly in base folder of your web server, you have an access with this: `http://[your domain]/users/:id`. 
In url `users` is your controller and `:id` is your first arguments in request.
For this frameworks, the first arguments (name between `/` after your domain) is the controller, after this is the arguments of request. In my example it's an id, but you can past a date, token, name, number, boolean.

In a controller, the default methods are: `doGet`, `doPost`, `doPut`, `doDelete`. For all methods, you receive an object argument `request` with this default structure:

* `args`
  * it's an array with the arguments in url after the controller
* `data`
  * it's an array with the data receive by `php://input` in methods POST and PUT
* `page`
  * it's the page for the pagination (default is 1). You can define this parameters in url parameter `page`.
* `limit`
  * it's the limit when you return data (default is 100). You can define this parameters in url parameter `limit`.
