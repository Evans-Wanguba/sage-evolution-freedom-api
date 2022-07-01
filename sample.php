<?php

use EvansWanguba\Sage\SageEvolutionFreedom;

require "vendor/autoload.php";

$sage = new SageEvolutionFreedom();

// Create a customer
$response = $sage->postTransaction('CustomerInsert', (object)["client" => ["Active" => true, "Description" => "John Doe", "ChargeTax" => true, "Code" => "JON001"]]);

// Find a customer
$response = $sage->getTransaction('CustomerFind?Code=CASH');

// Check if customer exists
$response = $sage->getTransaction('CustomerExists?Code=CASH');

// Retrieve a list of customers
$response = $sage->getTransaction('CustomerList?OrderBy=1&PageNumber=1&PageSize=50');

// Find an inventory item
$response = $sage->getTransaction('InventoryItemFind?Code=ISS001');

// Retrieve a list of inventory items
$response = $sage->getTransaction('InventoryItemList?OrderBy=1&PageNumber=1&PageSize=50');

// Load a sales order
$response = $sage->getTransaction('SalesOrderLoadByOrderNo?orderNo=SO0001');

// Check if a sales order exists
$response = $sage->getTransaction('SalesOrderExists?orderNo=SO0001');

// Create an inventory item
$response = $sage->postTransaction('InventoryItemInsert', (object)["item" => ["Code" => "ISS001"]]);

// Place a sales order
$response = $sage->postTransaction('SalesOrderPlaceOrder', (object)["quote" =>["CustomerAccountCode" => "CASH","OrderDate" => "\/Date(1627825101757+0300)\/","Lines" => [["StockCode" => "Test","WarehouseCode" => "Mstr","Quantity" => 1,"UnitPrice" => 200.00], ["StockCode" => "Test","Quantity" => 1,"UnitPrice" => 200.00]],"FinancialLines" => []]]);

// Sales order process invoice
$response = $sage->postTransaction('SalesOrderProcessInvoice', (object)["quote" =>["CustomerAccountCode" => "CASH","OrderDate" => "\/Date(1627825101757+0300)\/","InvoiceDate" => "\/Date(1627825101757+0300)\/","Lines" => [["StockCode" => "Test","WarehouseCode" => "Mstr","TaxCode" => "1","Quantity" => 1,"ToProcess" => 1,"UnitPrice" => 200.00], ["StockCode" => "Test","TaxCode" => "1","Quantity" => 1,"ToProcess" => 1,"UnitPrice" => 200.00]],"FinancialLines" => []]]);

// Echo the response
echo $response;
