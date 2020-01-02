<?php
// Require composer autoload file
require "./vendor/autoload.php";

// Require the main WaterPipe class
use App\Ip;
use ElementaryFramework\WaterPipe\WaterPipe;
use ElementaryFramework\WaterPipe\HTTP\Response\ResponseStatus;

// Require the Request class
use ElementaryFramework\WaterPipe\HTTP\Request\Request;
// Require the Response class
use ElementaryFramework\WaterPipe\HTTP\Response\Response;

// Create the base pipe
$basePipe = new WaterPipe;

// www site html
$basePipe->request("/", function (Request $req, Response $res) {
    $res->sendFile(__DIR__ . '/main.phtml');
});

// Handle any kind of requests made at the root of the pipe
$basePipe->request("/api", function (Request $req, Response $res) {
    $res->sendText("Welcome to my API");
});

$basePipe->post("/api/get", function (Request $req, Response $res) {
    try {
        $body = $req->getBody();
        $ip = $body["ip"];
        $client = Ip::getDefault()->getDataForIp($ip);

        // Send the retrieved post
        $res->sendJSON(array(
            "success" => true,
            "city" => $client->getCity(),
            "country" => $client->getCountry(),
            "zip" => $client->getZip()
        ));
    } catch (Exception $e) {
        $res->sendText("error: " . $e->getMessage(),ResponseStatus::BadRequestCode);
    }
});

$basePipe->error(ResponseStatus::NotFoundCode, function (Request $req, Response $res) {
    // Just send a forbidden response
    $res->sendText("Forbidden.", ResponseStatus::ForbiddenCode);
});

// Run the pipe and serve the API
$basePipe->run();