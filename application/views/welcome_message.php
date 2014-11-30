<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.2.4 or newer
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright	Copyright (c) 2014, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Simple API with Codeigniter 3</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }
	::-webkit-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Welcome to the Simple API with Codeigniter 3</h1>

	<div id="body">
		<h2>About</h2>
		<p>This is a very simple RESTfuL API without Token Authentification. Data informations are in JSON</p>
		<h2>Database structrure (MySQL default)</h2>
		<p>Table name : "product"</p>
		<ul>
			<li>id <em>int</em></li>
			<li>title <em>string</em></li>
		</ul>
		<p>Edit your "database.php" file ("application/config").</p>
		<h2>MVC structure</h2>
		<ul>
			<li>Modele "Model_product" (5 Actives Records queries)</li>
			<li>Views : none (it's an API...) </li>
			<li>Controller "Product" (5 basics functions)</li>
		</ul>
		<h2>URLs</h2>
		<h3>Routing file :</h3>
		<pre><code>$route['api/product']['get']		  = 'api/v1/product';
$route['api/v1/product/(:num)']['get']    = 'api/v1/product/view/$1';
$route['api/v1/product']['post']	  = 'api/v1/product/create';
$route['api/v1/product/(:num)']['put']    = 'api/v1/product/update/$1';
$route['api/v1/product/(:num)']['delete'] = 'api/v1/product/delete/$1';</code></pre>
		<h3>5 basics functions :</h3>
		<table>
		<tr>
			<th>Verb</th>
			<th>Action</th>
			<th>URL</th>
		</tr>
		<tr>
			<th>GET</th>
			<td>View all products</td>
			<td><a href="api/v1/product"><?php echo base_url('api/v1/product'); ?></a></td>
		</tr>
		<tr>
		<tr>
			<th>GET</th>
			<td>View a product</td>
			<td><a href="api/v1/product/1"><?php echo base_url('api/v1/product/1'); ?></a></td>
		</tr>
		<tr>
			<th>POST</th>
			<td>Create a product</td>
			<td><?php echo base_url('api/v1/product'); ?></td>
		</tr>
		<tr>
			<th>PUT</th>
			<td>Update a product</td>
			<td><?php echo base_url('api/v1/product/1'); ?></td>
		</tr>
		<tr>
			<th>DELETE</th>
			<td>Delete a product</td>
			<td><?php echo base_url('api/v1/product/1'); ?></td>
		</tr>
		</table>
		<p><em>("1" is the id product)</em></p>
		<h2>Testing with cURL</h2>
		<p>Read with GET :
		<code>curl http://localhost/codeigniter-api/api/v1/product</code>
		<code>curl http://localhost/codeigniter-api/api/v1/product/1</code>
		</p>
		<p>Create with POST :
		<code>curl -d title="product title" http://localhost/codeigniter-api/api/v1/product</code>
		</p>
		<p>Update with PUT :
		<code>curl -X PUT -d title="edit product title" http://localhost/codeigniter-api/api/v1/product/1</code>
		</p>
		<p>Delete with DELETE :
		<code>curl -X DELETE http://localhost/codeigniter-api/api/v1/product/1</code>
		</p>
		<h2>More informations</h2>
		<ul>
			<li>Official Codeigniter 3 doc : <a href="http://www.codeigniter.com/userguide3" target="_blank">http://www.codeigniter.com/userguide3</a></li>
			<li><em>Postman</em> is a Chrome Tool for testing APIs : <a href="http://www.getpostman.com" target="_blank">http://www.getpostman.com</a></li>
			<li><em>Generatedata</em> generate fake data in many languages : <a href="http://generatedata.com">http://generatedata.com</a></li>
		</ul>

	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>