<html>
	<head>
		<title>Twitter</title>
	</head>
	<body>
		<h1>Welcome To Twitter App</h1>
		<div id="main">
			<p>
				<?php

function linkify_twitter_status($status_text)
{
  // linkify URLs
  $status_text = preg_replace(
    '/(https?:\/\/\S+)/',
    '<a href="\1">\1</a>',
    $status_text
  );

  // linkify twitter users
  $status_text = preg_replace(
    '/(@[a-zA-Z0-9_]*)/',
    '<a href="http://www.twitter.com/$1">$1</a>',
    $status_text
  );

  // linkify tags
  $status_text = preg_replace(
    '/(#[a-zA-Z0-9_]*)/',
    '<a href="http://www.twitter.com/search?q=%23$1">$1</a>',
    $status_text
  );

  return $status_text;
}


$url = 'https://api.twitter.com/1/statuses/user_timeline/vaqasuddin.json';
		$c = curl_init($url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($c, CURLOPT_TIMEOUT, 30);
        $status = json_decode(curl_exec($c) );
        $num = 5;
        $data = array();
        echo "<h1>Twitter</h1>";
        foreach( $status as $tweet )
        {
            if( $num-- === 0) break;
            $data[] = $tweet->text;
        }
        echo "<ul>";
        foreach($data as $text):?>

            <?php $final_tweet = linkify_twitter_status($text);?>
            <?php echo "<li>$final_tweet</li>"?>
            
        <?php endforeach;?>
        
        <?php echo "</ul>"; ?>
        
			</p>
		</div>
	</body>
</html>       