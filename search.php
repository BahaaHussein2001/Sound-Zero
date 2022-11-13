<!DOCTYPE html>
<html lang="en"> 
<meta charset="utf-8">
  <head>
    <title>Ground Zero</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="imag/x-icon" href="favicon.ico">
  </head>
  <body>
    <div class="topnav"> 
      <ul>   
        <li><a href="home.html">Home</a></li>
        <li><a href="about.html">About Us</a></li>
        <li><a href="contact.html">Contact Us</a></li>
      </ul>
    </div>
    <div class="container">
      <div class="row">
        <div class="column">
        <?php
    $artist = $_GET['artist_name'];
    $song = $_GET['title_of_song'];
 
    $curl = curl_init();
     
    curl_setopt_array($curl, [
           CURLOPT_URL => "https://api.genius.com/search?q=${song} ${artist}",
           CURLOPT_RETURNTRANSFER => true,
           CURLOPT_FOLLOWLOCATION => true,
           CURLOPT_ENCODING => "",
           CURLOPT_MAXREDIRS => 10,
           CURLOPT_TIMEOUT => 30,
           CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
           CURLOPT_CUSTOMREQUEST => "GET",
           CURLOPT_HTTPHEADER => [
                  "Host: api.genius.com",
                  "Authorization: Bearer 6OT9uJooiLJiODWlolZRCTKv8JfgM8hXggWsFgxZS3EfhFaf7WvYMRvyEQ32W3b9"
           ],
    ]);
     
    $response = curl_exec($curl);
   
    $err = curl_error($curl);
     
    curl_close($curl);
     
    if ($err) {
           echo "cURL Error #:" . $err;
    } else {
           //echo $response;
           $found = false;
           $results = json_decode($response, true);
           foreach ($results["response"]["hits"] as $songResult)
           {
                $title = $songResult["result"]["full_title"];
                //echo $title;
               // echo "<br> <br> <br>";
               if (strpos(strtolower($title), strtolower($song)) !== false)
               {
                $found = true;
                $songid = $songResult["result"]["id"];
                $curl = curl_init();
     
                curl_setopt_array($curl, [
                       CURLOPT_URL => "https://api.genius.com/songs/${songid}",
                       CURLOPT_RETURNTRANSFER => true,
                       CURLOPT_FOLLOWLOCATION => true,
                       CURLOPT_ENCODING => "",
                       CURLOPT_MAXREDIRS => 10,
                       CURLOPT_TIMEOUT => 30,
                       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                       CURLOPT_CUSTOMREQUEST => "GET",
                       CURLOPT_HTTPHEADER => [
                              "Host: api.genius.com",
                              "Authorization: Bearer 6OT9uJooiLJiODWlolZRCTKv8JfgM8hXggWsFgxZS3EfhFaf7WvYMRvyEQ32W3b9"
                       ],
                ]);
                 
                $response = curl_exec($curl);
               
                $err = curl_error($curl);
                 
                curl_close($curl);
                if ($err) {
                    echo "cURL Error #:" . $err;
             } else {
                $results = json_decode($response, true);
                $lyric = $results["response"]["song"]["embed_content"] ;
              
                echo $lyric;
                break;
                }
            }
           }
           if($found == false)
           {
                echo "<p id='error'> Song not found! </p>";
           }
        }
?>
        </div>
      </div>
    </div>
    
  </body>
</html>    
