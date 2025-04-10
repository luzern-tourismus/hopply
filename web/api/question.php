<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Methods: "GET, POST, PUT, DELETE,OPTIONS"');
//Access-Control-Allow-Methods
header('Access-Control-Allow-Headers: Content-Type, Authorization');
// 'Access-Control-Allow-Headers': 'Content-Type, Authorization',

//header('Content-Type: application/json; charset=utf-8');
header("HTTP/1.1 200 OK");

//echo 'key';

require_once('../../vendor/autoload.php');

//echo 'key';
//echo __DIR__;

//$dotenv = Dotenv\Dotenv::createImmutable(DIR__.'/../../');
//$dotenv->load();

//$apiKey = $dotenv->required('OPEN_AI_API_KEY');
$apiKey = getenv('OPEN_AI_API_KEY');

//echo 'key:' . $apiKey;

$ini_array = parse_ini_file(__DIR__.'/../../config.ini');
//print_r($ini_array);

$apiKey=$ini_array['OPEN_AI_API_KEY'];
//echo $apiKey;
//exit;

$body=file_get_contents('php://input');

//echo $body;

$json=json_decode($body,true);


//$question = $_POST['question'];
$question = $json['question'];
//$question='luzern';


//echo print_r($_ENV);

//exit;

//$yourApiKey = getenv('YOUR_API_KEY');
$client = OpenAI::client($apiKey);

/*
$result = $client->chat()->create([
    'model' => 'gpt-4',
    'messages' => [
        ['role' => 'user', 'content' => $question],
    ],
]);*/


$data=[];
//$data['answer'] = $result['choices'][0]['message']['content'];    //http_response_code(200);


$data['answer']=$question;  // 'asdf';



//http_response_code(200);

/*
Access-Control-Allow-Origin = "*"
    Access-Control-Allow-Headers = "Content-Type, Authorization"
    Access-Control-Allow-Methods = "GET, POST, PUT, DELETE,OPTIONS"
*/

echo json_encode($data);


