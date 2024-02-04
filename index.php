<?php

header('Content-type: text/html; charset=UTF-8');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');
header('X-Content-Type-Options: nosniff');
header('X-Robots-Tag: noindex, nofollow', true);

$user = '';

if(isset($_GET['name'])){
    $user = $_GET['name'];
}

$cleanup = htmlspecialchars($user,ENT_COMPAT);
$randomNumber = rand();
$specialChars = ["@", "!", "-", "<", ">", "[", "]", "?", "(", ")", "script", "<>", "alert", "php", "`", "'", "+", ' '];
$partner = str_replace($specialChars, '', $cleanup);

function pageurl(){
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }
    else{
        $protocol = 'http';
    }
    return $protocol . "://" . $_SERVER['HTTP_HOST'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="HandheldFriendly" content="True" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#ffffff">
    <link rel="shortcut icon" href="data:image/x-icon;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAACXBIWXMAAA7EAAAOxAGVKw4bAAABqklEQVQ4jZ2Tv0scURDHP7P7SGWh14mkuXJZEH8cgqUWcklAsLBbCEEJSprkD7hD/4BUISHEkMBBiivs5LhCwRQBuWgQji2vT7NeYeF7GxwLd7nl4knMwMDMfL8z876P94TMLt+8D0U0EggQSsAjwMvga8ChJAqxqjTG3m53AQTg4tXHDRH9ABj+zf6oytbEu5d78nvzcyiivx7QXBwy46XOi5z1jbM+Be+nqVfP8yzuD3FM6rzIs9YE1hqGvDf15cVunmdx7w5eYJw1pcGptC9CD4gBUuef5Ujq/BhAlTLIeFYuyfmTZgeYv+2nPt1a371P+Hm1WUPYydKf0lnePwVmh3hnlcO1uc7yvgJUDtdG8oy98kduK2KjeHI0fzCQINSXOk/vlXBUOaihAwnGWd8V5r1uhe1VIK52V6JW2D4FqHZX5lphuwEE7ooyaN7gjLMmKSwYL+pMnV+MA/6+g8RYa2Lg2RBQbj4+rll7uymLy3coiuXb5PdQVf7rKYvojAB8Lf3YUJUHfSYR3XqeLO5JXvk0dhKqSqQQoCO+s5AIxCLa2Lxc6ALcAPwS26XFskWbAAAAAElFTkSuQmCC" />
    
    <title><?php if ($partner) { echo "Hi $partner"; } else { echo "Hi Partner Name"; } ?></title>
    <meta name="description" content="<?php if ($partner) { echo "Happy Valentine's Day: $partner"; } else { echo "Happy Valentine's Day: Partner Name"; } ?>"/>
    <?php $current_page = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; echo '<link rel="canonical" href="'.$current_page.'" />'; ?>

    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css" integrity="sha512-IgmDkwzs96t4SrChW29No3NXBIBv8baW490zk5aXvhCD8vuZM3yUSkbyTBcXohkySecyzIrUwiF/qV0cuPcL3Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,700;1,400&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Space Mono', monospace;
    }
    pre {
    font-family: 'Space Mono', monospace;
    font-size:14px;
    border: #6D214F 1px solid;
    color: #fdcb6e;
    line-height: 1.5em;
    background: #6D214F;
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased !important;
    -moz-font-smoothing: antialiased !important;
    text-rendering: optimizelegibility !important;
}
.join-more {
    font-weight: 400;
    font-size: 14px;
    text-transform: uppercase;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    border-radius: 32px;
    padding: 12px;
    -moz-osx-font-smoothing: grayscale;
   -webkit-font-smoothing: antialiased !important;
   -moz-font-smoothing: antialiased !important;
   text-rendering: optimizelegibility !important;
  }
pre code {
    padding: 0;
    font-size: inherit;
    line-height: inherit;
    color: inherit;
}
.user-img {
    width: 1024px;
    height: 1024px;
    font-size: 25px;
}
.hide-me {
    visibility: none;
    max-height: 0;
    overflow:hidden
}
.sign-button {
    max-width: 100%;
}
.sign-button {
    font-weight: 500;
    font-size: 14px;
    text-transform: uppercase;
    padding: 12px;
    -moz-osx-font-smoothing: grayscale;
   -webkit-font-smoothing: antialiased !important;
   -moz-font-smoothing: antialiased !important;
   text-rendering: optimizelegibility !important;
}
.input-box,
textarea,
.sign-button {
	width: 45rem !important;
	min-height: 3rem;
}
button {
    max-width: 100%;
}
.card-content.login {
    background-color: #ffe96e;
    box-shadow: 0 2px 4px #5351464d;
    border-radius: 32px;
    -moz-osx-font-smoothing: grayscale;
   -webkit-font-smoothing: antialiased !important;
   -moz-font-smoothing: antialiased !important;
   text-rendering: optimizelegibility !important;
    }
    .card-content.login {
        border: none;
        padding-top: 50px;
        padding-bottom: 50px;
}
.user-form p {
    letter-spacing: .03em;
    line-height: 20px;
    margin-bottom: 20px;
    word-wrap: break-word;
    font-size: 16px;
    color: #221f1f;
    -moz-osx-font-smoothing: grayscale;
   -webkit-font-smoothing: antialiased !important;
   -moz-font-smoothing: antialiased !important;
   text-rendering: optimizelegibility !important;
}
.user-form button {
    display: flex;
    flex-grow: 0.3;
    font-weight: 500;
    font-size: 14px;
    text-transform: uppercase;
    border-radius: 32px;
    padding: 12px;
    -moz-osx-font-smoothing: grayscale;
   -webkit-font-smoothing: antialiased !important;
   -moz-font-smoothing: antialiased !important;
   text-rendering: optimizelegibility !important;
}
.user-form input {
    display: flex;
    flex-grow: 0.3;
    font-weight: 500;
    font-size: 14px;
    border-radius: 32px;
    padding: 12px;
    -moz-osx-font-smoothing: grayscale;
   -webkit-font-smoothing: antialiased !important;
   -moz-font-smoothing: antialiased !important;
   text-rendering: optimizelegibility !important;
}
input {
    text-align: center;
}
    ::-webkit-input-placeholder {
    text-align: center;
}
    :-moz-placeholder {
    text-align: center;
}
</style>

<link rel="preconnect" href="https://cdn.jsdelivr.net">
<script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js" integrity="sha256-6H5VB5QyLldKH9oMFUmjxw2uWpPZETQXpCkBaDjquMs=" crossorigin="anonymous"></script>

</head>
<body>

<?php

if($partner) {

$name = "

$partner@❤️:~/💑$

       ||
   ___\||
   ____\|   %%%       %%%
        \  %   %     %   %
         \%     %   %     %
         %\      % %       %
        %  \      %         %
        %   \               %
        %    \   BE MY      %
         %    \             %
          %   VALENTINE    %
           %    \         %
            %    \       %
             %    \     %
              %    \   %
               %    \ %
                %   %\
                 % %  \ ||
                  %  __\||
                     ___\|
 
";

// Hidden from users - it uses to download image in square shape

echo '<div class="hide-me"><section class="section"><div class="container content"><div class="columns is-centered"><div class="column is-half">';
echo '<div id="copy-quote">';
echo '<pre class="user-img">';
echo "$name";
echo "</pre>";
echo "</div>";
echo '</div></div></div></section></div>';

// Preview to users

echo '<section class="section"><div class="container content"><div class="columns is-centered"><div class="column is-half">';
echo '<pre>';
echo "$name";
echo "</pre>";
echo '<div id="result">';
echo '</div></div></div></section>';

} else {
    echo '<section class="section"><div class="container content"><div class="columns is-centered"><div class="column is-half">';
    echo '<pre style="display: flex; justify-content: center;">';
    echo "Enter Your Partner Name";
    echo "</pre>";
    echo '</div></div></div></section>';
}

?>

<section class="section">
<div class="container content">
<div class="columns is-centered">
<div class="column is-half">
<div class="card-content content user-form login">
<p>Terminal Style Greeting - Just Enter your Partner Name (without Space)</p>
<form method="GET" rel="nofollow noopener noreferrer" target="_blank" action="<?php echo pageurl(); ?>">
<div class="field">
<input class="input is-info column is-half input-box" name="name" type="text" placeholder="Partner Name" required="" minlength="4" maxlength="25">
</div>
<div class="field">
<button type="submit" class="button is-info sign-button">⏏ Create My Greeting</button>
</div>
</form>
</div>
</div>
</div>
</div>
</section>
<br>

<script>html2canvas(document.getElementById("copy-quote"), {
  allowTaint: true,
  useCORS: true,
  width: 1024,
  height: 1024,
  scale: 1,
  logging: false,
})
  .then(function (canvas) {
    let image = canvas.toDataURL("image/png", 0.5);
    document.getElementById("result").innerHTML =
      '<br><p class="content has-text-centered"><a class="button join-more is-warning is-rounded" href=' +
      image +
      ' download="valentines-day-<?php echo $randomNumber; ?>.png">▶ Download image</a></p>';
  })
  .catch((e) => {
    console.log(e);
  });</script>

</body>
</html>