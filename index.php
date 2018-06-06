<?/php

$_method = $_SERVER['REQUEST_METHOD'];

if($method == "POST"){
  $requestBody = file_get_contents('php://input');
  $json = json_decode($requestBody);

  $text = $json->queryResult->parameters->text;

  switch ($text) {
      case 'hi':
        $speech = "Hi, Nice to meet you";
        break;

      case 'bye':
        $speech = "Bye bye!";
        break;

      case 'anything':
        $speech = "Sorry, I didn't get that. Please ask me something else."
        break;

      default:
        $speech = "Sorry, I didn't get that. Please say 'hi', 'bye', 'anything'";
        break;
  }
  $response = new \stdClass();
  $response->speech = "";
  $response->displayText = "";
  $response->source = "webhook";
  echo json_encode($response);
}else{
  echo "Method not allowed";
}

?>
