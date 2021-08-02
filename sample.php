<?php

use Evans-Wanguba\Sage\SageEvolutionFreedom;

require "vendor/autoload.php";

$sage = new SageEvolutionFreedom();

$response = $sage->postTransaction('CustomerInsert', (object)["client" => ["Active" => true, "Description" => "John Doe", "ChargeTax" => true, "Code" => "JON001"]]);

echo $response;
