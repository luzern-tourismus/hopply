<?php

require __DIR__ . '/../config.php';

$chatbot = new \LuzernTourismus\Hopply\Chatbot\Chatbot();

(new \Nemundo\Core\Debug\Debug())->write($chatbot->getModel());


