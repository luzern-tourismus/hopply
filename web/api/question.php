<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header("HTTP/1.1 200 OK");

require_once('../../vendor/autoload.php');


$apiKey = getenv('OPEN_AI_API_KEY');

$ini_array = parse_ini_file(__DIR__ . '/../../config.ini');
$apiKey = $ini_array['OPEN_AI_API_KEY'];

$body = file_get_contents('php://input');

$json = json_decode($body, true);


$jsonUrl = 'https://app.tourismdata-luv.com/public/easter-egg/easter-egg-json';
$response = file_get_contents($jsonUrl);


$systemPrompt = 'Du bist "Hopply" und bist der Osterhase der Stadt Luzern. 
Du antwortest immer auf Deutsch.
Du hast Osternester/Ostereier in der Stadt Luzern versteckt. 
Du kannst Tipps geben.


Du wünsccht immer viel Spass bei der Suche oder etwas ähnliches.
Schreibe nie ein Doppel s, sondern immer ss. 

Daten für die Osternester/Ostereier:

- im feld "ort" ist das versteck
- im feld "tipp" ist ein tipp, den du geben kannst oder auch nicht
- im feld "gefunden" ist vermekt, ob das osternest schon gefunden ist
- im feld "gefunden_date_time" ist der zeitpunkt als es gefunden wurde, wurde es gefunden gibst du das datum und uhrzeit an. das datum gibst du in deutschem datums format an. die uhrzeit ohne sekunden.
- gib jeweils nur für ein osternest auskunft oder tipps
- falls ein osternest gefunden wurde, dann gibst du kein tipp mehr

' . $response;

$question = $json['question'];

$client = OpenAI::client($apiKey);

$result = $client->chat()->create([
    'model' => 'o3-mini',  //   'gpt-4',
    'messages' => [
        ['role' => 'developer', 'content' => $systemPrompt],
        ['role' => 'user', 'content' => $question],
    ],
]);


$data = [];
$data['answer'] = $result['choices'][0]['message']['content'];

echo json_encode($data);
