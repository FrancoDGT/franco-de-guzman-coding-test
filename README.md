<a name="readme-top"></a>

<div align="center">
    <h3 align="center">Backend Developer coding test</h3>
</div>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-test">About the test</a>
    </li>
    <li>
      <a href="#requirements">Requirements</a>
      <ul>
        <li><a href="#product-specifications">Product specifications</a></li>
        <li><a href="#api-requirements">API Requirements</a></li>
      </ul>
    </li>
    <li>
        <a href="#instruction">Instructions</a>
    </li>
    <li>
      <a href="#bonus-points">Bonus points</a>
    </li>
  </ol>
</details>

<!-- ABOUT THE TEST -->
## About the test

You're tasked to create a simple REST web service application for a fictional e-commerce business using Laravel.

You need to develop the following REST APIs:

* Products list
* Product detail
* Create product
* Update product
* Delete product

<!-- REQUIREMENTS -->
## Requirements

### Product specifications

A product needs to have the following information:

* Product name
* Product description
* Product price
* Created at
* Updated at

<!-- INSTRUCTION -->
## Instructions

### Installation
* Clone the repository.
* Install Composer Dependencies
    * <i>composer install</i> - This command will install all the PHP dependencies.
* Run migration
    * After cloning and installing dependencies, run the following command to create the necessary database tables:
        * <i>php artisan migrate</i> - This command will execute the database migrations defined in my test project.
### API Endpoints

#### GET /products
Retrieve the list of all products.

#### GET /products/{id}
Retrieve details of a specific product by its ID.

#### POST /products
Create a new product.

#### PUT /products/update/{id}
Update an existing product by its ID.

#### DELETE /products/delete/{id}
Delete a product by its ID.

### API requirements

* Products list API
    * The products list API must be paginated.
* Create and Update product API
    * The product name, description, and price must be required.
    * The product name must accept a maximum of 255 characters.
    * The product price must be numeric in type and must accept up to two decimal places.
    * The created at and updated at fields must be in timestamp format.

Others:
* You are required to use MYSQL for the database storage in this test.
* You are free to use any library or component just as long as it can be installed using Composer.
* Don't forget to provide instructions on how to set the application up.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- GETTING STARTED -->
## Getting Started

### Prerequisites

* Git
* Composer
* PHP ^8.0.2
* MySQL

### Installation

#### Automatically generate a new repository
Click <a href="https://github.com/QualityTrade/backend-dev-coding-test/generate" target="_blank">here</a> to generate a new repository from this template.

* Select your GitHub username as the owner.
* Name the repository `{FIRST NAME}-{LAST NAME}-coding-test`. (e.g. `john-doe-coding-test`)
* Make sure to set the repository visibility to Public.
* Clone your generated repository.

#### Manual
If automatically generating a new repository does not work, follow these steps instead.

* Click <a href="https://github.com/QualityTrade/backend-dev-coding-test/archive/refs/heads/main.zip">here</a> to download the ZIP archive of the test.
* Create a new repository named `{FIRST NAME}-{LAST NAME}-coding-test`. (e.g. `john-doe-coding-test`)
* Push your code to the new repository.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- BONUS POINTS -->
## Bonus points

#### For bonus points:

* Cache the response of the Product detail API. You are free to use any cache driver.
* Use the Service layer and Repository design patterns.
* Create automated tests for the app.

#### Answer the question below by updating this file.

Q: The management requested a new feature where in the fictional e-commerce app must have a "featured products" section.
How would you go about implementing this feature in the backend?

A: In my very own raw knowledge, I would like to implement it in a way where I will add a new property in the model that will be named "featured" that will hold boolean values, and my preference for classifying an item to be featured is that it can be "newly added" or "most bought product". In the "newly added" condition, I would like to check the time it was created and the current time. If it does satisfy the condition, the property "featured" will have a value of "true" which will make it a featured item. For the "most bought product" condition I would like to add a new property in the model that will be named "sold" that will hold a value of how many times it will be bought by the customers and by that we can now compare the variable "sold" to the other products and I will only pick the top ten (10) products that will hold a "true" value for their each property "featured". 
