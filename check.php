<?php

// v1   19.11.2021
// Powered by Smart Sender
// https://smartsender.com

ini_set('max_execution_time', '1700');
set_time_limit(1700);
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Content-Type: application/json; charset=utf-8');

http_response_code(200);

$result["state"] = true;
if ($_GET == NULL) {
  $result["state"] = false;
  $result["error"]["message"][] = "check data is not found";
  echo json_encode($result);
  exit;
}
foreach ($_GET as $key => $value) {
  if ($value == NULL) {
    $result[$key]["present"] = true;
  } else {
    $result[$key]["present"] = false;
  }
  try {
    $result[$key]["length"] = mb_strlen($value);
  } catch (Exception $err) {
    $result[$key]["length"] = strlen($value);
  }
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);
