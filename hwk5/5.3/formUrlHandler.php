<?php

$urlArr[] = [
  'url' => 'url',
  'hashUrl' => 'hashUrl',
  'date' => null,
];
var_dump()

const SUCCESS = "success";
const ERR = "error";

function check($url) {
  if(!isset($url) || empty($url) || (!filter_var($url, FILTER_VALIDATE_URL)))
    {
      return false;
    }
  return true;
}

function getShortUrl($url)
{
  if (!in_array($url, $urlArr))
  {
    function getShortHost($url)
    {
      $parseUrl = parse_url($url);
      $host = explode(".", $parseUrl['host']);
      if(count($host) >= 4)
        {
          $hashHost = $host[0]{rand(0,strlen($host[0]) - 1)} . $host[1]{rand(0,strlen($host[1]) - 1)} . $host[2]{rand(0,strlen($host[2]) - 1)};
        }
      if(count($host) === 3)
        {
          $hashHost = $host[0]{rand(0,strlen($host[0]) - 1)} . $host[1]{rand(0,strlen($host[1]) - 1)} . rand(0,9);
        }
      if(count($host) === 2)
        {
          $hashHost = $host[0]{rand(0,strlen($host[0]) - 1)} . rand(0,9) . rand(0,9);
        }
    return $shortUrl = $parseUrl['scheme'] . '://' . $hashHost . '.' . $host[count($host) - 1];
    }
  }
  return $shortUrl = $urlArr[array_search($url, array_column($urlArr, 'url'))]['hashUrl'];
}

if (!check($url) && !in_array($url, $urlArr))
  {
    $urlArr[] =
    [
      'url' => $url,
      'hashUrl' => getShortUrl($url),
      'date' => $server['REQUEST_TIME'],
    ];
  }



function writeUrlToFile() {
  $file = 'file.txt';
  if (!check($url) && !in_array($url, $urlArr))
    {
      $fp = fopen($file,'a+');
      fwrite($fp, $urlArr[count($urlArr) - 1]['url'] . ':' . $urlArr[count($urlArr) - 1]['hashUrl'] . ':' . $urlArr[count($urlArr) - 1]['date'] . PHP_EOL);
      fclose($fp);
    }
}
writeUrlToFile();

$post = $_POST;
$url = $post['url'];
$server = $_SERVER;
if ($server['REQUEST_METHOD'] == 'POST')
{
  echo serverAnswer();
}

function serverAnswer() {
  if(!check($url))
    {
      return ERR;
    }
  return SUCCESS;
}
