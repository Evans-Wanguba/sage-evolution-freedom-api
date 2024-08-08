<?php

use EvansWanguba\Sage\SageEvolutionFreedom;

require "vendor/autoload.php";

$sage = new SageEvolutionFreedom();

// Create a customer
$data = [
    "client" => [
        "Active" => true,
        "Description" => "John Doe",
        "ChargeTax" => true,
        "Code" => "JON001",
    ]
];
$response = $sage->postTransaction('CustomerInsert', (object)$data);
echo $response;


// Find a customer
$response = $sage->getTransaction('CustomerFind?Code=CASH');
echo $response;


// Check if customer exists
$response = $sage->getTransaction('CustomerExists?Code=CASH');
echo $response;


// Retrieve a list of customers
$response = $sage->getTransaction('CustomerList?OrderBy=1&PageNumber=1&PageSize=50');
echo $response;


// Find an inventory item
$response = $sage->getTransaction('InventoryItemFind?Code=ISS001');
echo $response;


// Retrieve a list of inventory items
$response = $sage->getTransaction('InventoryItemList?OrderBy=1&PageNumber=1&PageSize=50');
echo $response;


// Load a sales order
$response = $sage->getTransaction('SalesOrderLoadByOrderNo?orderNo=SO0001');
echo $response;


// Check if a sales order exists
$response = $sage->getTransaction('SalesOrderExists?orderNo=SO0001');
echo $response;


// Create an inventory item
$data = [
    "item" => [
        "Code" => "ISS001",
    ]
];
$response = $sage->postTransaction('InventoryItemInsert', (object)$data);
echo $response;


// Place a sales order
$data = [
    "quote" => [
        "CustomerAccountCode" => "CASH",
        "OrderDate" => "\/Date(1627825101757+0300)\/",
        "Lines" => [
            [
                "StockCode" => "Test",
                "WarehouseCode" => "Mstr",
                "Quantity" => 1,
                "UnitPrice" => 200.00
            ],
            [
                "StockCode" => "Test",
                "Quantity" => 1,
                "UnitPrice" => 200.00
            ]
        ],
        "FinancialLines" => []
    ]
];
$response = $sage->postTransaction('SalesOrderPlaceOrder', (object)$data);
echo $response;


// Sales order process invoice
$data = [
    "quote" => [
        "CustomerAccountCode" => "CASH",
        "OrderDate" => "\/Date(1627825101757+0300)\/",
        "InvoiceDate" => "\/Date(1627825101757+0300)\/",
        "Lines" => [
            [
                "StockCode" => "Test",
                "WarehouseCode" => "Mstr",
                "TaxCode" => "1",
                "Quantity" => 1,
                "ToProcess" => 1,
                "UnitPrice" => 200.00
            ], 
            [
                "StockCode" => "Test",
                "TaxCode" => "1",
                "Quantity" => 1,
                "ToProcess" => 1,
                "UnitPrice" => 200.00
            ]
        ],
        "FinancialLines" => []
    ]
];
$response = $sage->postTransaction('SalesOrderProcessInvoice', (object)$data);
echo $response;
