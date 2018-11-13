<?php
  function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
  }

  $hosts = array("RMSuppliers" => "https://www.rmsuppliers.com",
                 "Reprotec" => "https://www.reprotec.co.uk",
                 "3ADVServices" => "http://3advservices.com",
                 "Prothorn Consultants" => "https://www.prothornconsultants.co.uk");

  /*Initializing CURL*/
  $curlHandle = curl_init();

  $options = array(
    CURLOPT_RETURNTRANSFER => false,  // don't return web page
    CURLOPT_NOBODY         => true,   // we don't need body
    CURLOPT_HEADER         => false,  // don't return full headers
    CURLOPT_FOLLOWLOCATION => true,   // continue to follow redirects until 200
    CURLOPT_MAXREDIRS      => 10,     // stop redirecting after 10 tries
    CURLOPT_ENCODING       => "",     // handle any encoding
    CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
    CURLOPT_SSL_VERIFYPEER => false,  // disable SSL verification
    CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
    CURLOPT_TIMEOUT        => 120,    // time-out on response
    CURLOPT_USERAGENT      => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)
                              AppleWebKit/537.36 (KHTML, like Gecko)
                              Chrome/66.0.3359.181 Safari/537.36'
                              // set UserAgent to me
  );
  curl_setopt_array($curlHandle, $options);

  function downloadURL($URL) {

    global $curlHandle;

    curl_setopt($curlHandle, CURLOPT_URL, $URL);

    /*Now execute the CURL and get the response code*/
    $response = curl_exec($curlHandle);
    $httpCode = curl_getinfo($curlHandle, CURLINFO_HTTP_CODE);

    if (curl_error($curlHandle)) {
      return curl_error($curlHandle);
    }

    if ( $httpCode != 200 ){
      return $httpCode . " ❌";
    } else {
      return $httpCode . " ✔️";
    }

    curl_close($curlHandle);
  }

  foreach ($hosts as $link => $link_value) {
    echo "<h2>";
    echo $link . " response: " . downloadURL($link_value); //print response
    echo "</h2>";
  }
?>
