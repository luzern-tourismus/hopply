<?php

require __DIR__ . '/../config.php';

$chatbot = new \LuzernTourismus\Hopply\Chatbot\Chatbot();
$chatbot->systemPrompt='du bist alkohliker und bist immer betrunken';
$chatbot->prompt='wo kann ich in luzern bier trinken';
$chatbot->model='o1';
$answer=$chatbot->getAnswer();

(new \Nemundo\Core\Debug\Debug())->write($answer);




