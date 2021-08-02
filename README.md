# Sage Evolution Freedom API

This is a PHP package for Sage Evolution Freedom web service integration. The API is a set of generic Accounting functions that 
is designed to cater for a wide-ranging of functions that allows a merchant to have access to the Sage Evolution system.

## Installation

Pull in the package through Composer.
```bash
composer require Evans-Wanguba/sage-evolution-freedom-api
```

Create the following variables in your .env file.
```bash
SAGE_AGENT_USERNAME=agentusername
SAGE_AGENT_PASSWORD=agentpassword
```

## Supported Functions
- Customers
- Suppliers
- Inventory Items 
- Inventory Item Price Lists
- Inventory Item Selling Prices
- Aging Terms
- Areas 
- Customer Groups
- Person 
- Supplier Groups
- Sales Representatives
- Settlement Terms 
- Customer Transactions
- Supplier Transactions
- Inventory Transactions
- Create Sales Order Quotation
- Create Sales Order
- Create Sales Order Invoice
- Open Sales Order & Process Invoice

## Usage
To make a create customer request is simple. Just initiate the `SageEvolutionFreedom` and post the transaction:
```php
use Evans-Wanguba\Sage\SageEvolutionFreedom;

require "vendor/autoload.php";

$sage = new SageEvolutionFreedom();

$response = $sage->postTransaction('CustomerInsert', (object)["client" => ["Active" => true, "Description" => "John Doe", "ChargeTax" => true, "Code" => "JON001"]]);
```
The `$response` is either JSON or XML depending on the function.
