## About
This is a very simple RESTfuL API without Token Authentification. Data informations are in JSON
## Database structrure (MySQL default)
Table name : "product"

 * id int  
 * title string
 
Edit your "database.php" file ("application/config").
## MVC structure
 - Modele "Model_product" (5 Actives Records queries)
 - Views : none (it's an API...)
 - Controller "Product" (5 basics functions)

## URLs

### Routing file :
```php
$route['api/product']['get']			  = 'api/v1/product';  
$route['api/v1/product/(:num)']['get']	  = 'api/v1/product/view/$1';  
$route['api/v1/product']['post']		  = 'api/v1/product/create';  
$route['api/v1/product/(:num)']['put']	  = 'api/v1/product/update/$1';  
$route['api/v1/product/(:num)']['delete'] = 'api/v1/product/delete/$1';
```
### 5 basics functions :
| Verb		| Action			| URL 											 |
| --------- | ----------------- | ---------------------------------------------- |
| **GET**	| View all products	| http://localhost/codeigniter-api/api/v1/product   |
| **GET**	| View a product	| http://localhost/codeigniter-api/api/v1/product/1 |
| **POST**	| Create a product	| http://localhost/codeigniter-api/api/v1/product   |
| **PUT**	| Update a product	| http://localhost/codeigniter-api/api/v1/product/1 |
| **DEL**	| Delete a product	| http://localhost/codeigniter-api/api/v1/product/1 |
("1" is the id product)

#Testing with cURL

Read with GET :   
```curl http://localhost/codeigniter-api/api/v1/product```  
```curl http://localhost/codeigniter-api/api/v1/product/1```  

Create with POST :   
```curl -d title="product title" http://localhost/codeigniter-api/api/v1/product```  
Update with PUT :   
```curl -X PUT -d title="edit product title" http://localhost/codeigniter-api/api/v1/product/1```  

Delete with DELETE :  
```curl -X DELETE http://localhost/codeigniter-api/api/v1/product/1```  

## More informations
 - Official Codeigniter 3 doc : [http://www.codeigniter.com/userguide3](http://www.codeigniter.com/userguide3)
 - Postman is a Chrome Tool for testing APIs : [http://www.getpostman.com](http://www.getpostman.com) 
 - Generatedata generate fake data in many languages : [http://generatedata.com](http://generatedata.com)