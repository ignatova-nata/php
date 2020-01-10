<?php
const SUCCESS = "success";
const ERR = "error";
/*$urlArr[] = [
  'url' => 'url',
  'hashUrl' => 'hashUrl',
  'date' => null,
];*/

// var_dump($urlArr);
$post = $_POST;
$url = $post['url'];
//echo $url;
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


function check($url) {
  if(!isset($url) || empty($url) || (!filter_var($url, FILTER_VALIDATE_URL)))
    {
      return false;
    }
  return true;
}

function getShortUrl($url)
      {
        if(check($url))
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
          echo 'Короткая ссылка для ' . $url . ' - ' . $parseUrl['scheme'] . '://' . $hashHost . '.' . $host[count($host) - 1];
          return $parseUrl['scheme'] . '://' . $hashHost . '.' . $host[count($host) - 1];
        }
      }

/*$shortUrl = getShortUrl($url);*/

function writeUrlToFile($url/*, $shortUrl*/)
{
  if (check($url))
  {
    if(strpos(file_get_contents('file.txt'), $url) !== false)
      {
        echo "Ссылка уже добавлена";
        return;
      }

    $fp = fopen('file.txt','a+');
    fwrite($fp, $url . ' : ' . getShortUrl($url) . ' : ' . date('Y-m-d H:i:s') . PHP_EOL);
    fclose($fp);
}
}
writeUrlToFile($url/*, $shortUrl*/);


//var_dump($urlArr);
