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
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Fira Code', monospace;
        background: #9AECDB;
        min-height: 100vh;
        font-weight: 600;
    }
    p {
      font-family: 'Fira Code', monospace;
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
    pre {
     font-family: monospace;
     font-size: 14px;
     color: #fdcb6e;
     text-shadow: 0 0 3px #fdcb6e;
     line-height: 1.5em;
     background:  #2c001e;
     -moz-osx-font-smoothing: grayscale;
     -webkit-font-smoothing: antialiased !important;
     -moz-font-smoothing: antialiased !important;
     text-rendering: optimizelegibility !important;
}
.join-more {
    font-weight: 600;
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
    font-weight: 600;
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
    font-family: 'Fira Code', monospace;
    font-weight: 600;
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
.user-form {
    font-family: 'Fira Code', monospace;
}
.user-form p {
    font-family: 'Fira Code', monospace;
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
    font-family: 'Fira Code', monospace;
    display: flex;
    flex-grow: 0.3;
    font-weight: 600;
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
    font-family: 'Fira Code', monospace;
    display: flex;
    flex-grow: 0.3;
    font-weight: 600;
    font-size: 14px;
    border-radius: 32px;
    padding: 12px;
    -moz-osx-font-smoothing: grayscale;
   -webkit-font-smoothing: antialiased !important;
   -moz-font-smoothing: antialiased !important;
   text-rendering: optimizelegibility !important;
}
input {
    font-family: 'Fira Code', monospace;
    text-align: center;
}
    ::-webkit-input-placeholder {
    text-align: center;
}
    :-moz-placeholder {
    text-align: center;
}
#terminal__bar {
  display: flex;
  width: 100%;
  height: 30px;
  align-items: center;
  padding: 0 8px;
  background: linear-gradient(#504b45 0%,#3c3b37 100%);
}
#terminal__barimg {
  display: flex;
  width: 313%;
  height: 30px;
  align-items: center;
  padding: 0 8px;
  background: linear-gradient(#504b45 0%,#3c3b37 100%);
}
#bar__buttons {
  display: flex;
  align-items: center;
}
.bar__button {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0;
  margin-right: 5px;
  font-size: 8px;
  height: 12px;
  width: 12px;
  box-sizing: border-box;
  border: none;
  border-radius: 100%;
  background: linear-gradient(#7d7871 0%, #595953 100%);
  text-shadow: 0px 1px 0px rgba(255,255,255,0.2);
  box-shadow: 0px 0px 1px 0px #41403A, 0px 1px 1px 0px #474642;
}
.bar__button:focus {
  outline: none;
}
#bar__button--exit {
  background: linear-gradient(#f37458 0%, #de4c12 100%);
  background-clip: padding-box;
}
.fakeButtons {
  height: 14px;
  width: 14px;
  border-radius: 100%;
  border: 1px solid #000;
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0;
  margin-right: 3px;
  top: 1px;
  left: 7px;
  background-color: #ff3b47;
  border-color: #9d252b;
  display: inline-block;
}
.fakeMinimize {
  left: 11px;
  background-color: #ffc100;
  border-color: #9d802c;
}
.fakeZoom {
  left: 16px;
  background-color: #00d742;
  border-color: #049931;
}
</style>

<link rel="preconnect" href="https://cdn.jsdelivr.net">
<script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js" integrity="sha256-6H5VB5QyLldKH9oMFUmjxw2uWpPZETQXpCkBaDjquMs=" crossorigin="anonymous"></script>

</head>
<body>

<?php

if (preg_match('/^[a-z0-9 .\-]+$/i', $partner)) {

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
echo '<section id="terminal__barimg">
<div class="fakeButtons fakeClose"></div>
<div class="fakeButtons fakeMinimize"></div>
<div class="fakeButtons fakeZoom"></div>
</section>';
echo '<pre class="user-img">';
echo "$name";
echo "</pre>";
echo "</div>";
echo '</div></div></div></section></div>';

// Preview to users

echo '<section class="section"><div class="container content"><div class="columns is-centered"><div class="column is-half">';
echo '<h2 class="is-size-5 has-text-centered">💜 Linux Terminal Style Greeting 💜</h2><br>';
echo '<section id="terminal__bar">
<div class="fakeButtons fakeClose"></div>
<div class="fakeButtons fakeMinimize"></div>
<div class="fakeButtons fakeZoom"></div>
</section>';
echo '<pre>';
echo "$name";
echo "</pre>";
echo '<p class="has-text-centered"><small><b>image will be downloaded in Square Shape format <br> 1024x1024 Social Media Post Size</b></small></p>';
echo '<div id="result"></div>';
echo '</div></div></div></section>';

} else {
    echo '<section class="section"><div class="container content"><div class="columns is-centered"><div class="column is-half">';
    echo "<img src='/valentines-day.jpg' loading='lazy' alt='Valentines Day'><br><br>";
    echo '<div class="notification is-danger text-center">';
    echo "Enter Your Partner Name (Supports English Letters only)";
    echo "</div>";
    echo '</div></div></div></section>';
}

?>

<section class="section">
<div class="container content">
<div class="columns is-centered">
<div class="column is-half">
<div class="card-content content user-form login">
<p class="has-text-centered is-size-6">Terminal Style Greeting - Just Enter your Partner Name (without Space)</p>
<form method="GET" rel="nofollow noopener noreferrer" target="_blank" action="<?php echo pageurl(); ?>">
<div class="field">
<input class="input is-info column is-half input-box" name="name" type="text" placeholder="Partner Name" required="" minlength="4" maxlength="25">
</div>
<div class="field">
<button type="submit" class="button is-danger sign-button">⏏ Create My Greeting</button>
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
      '<p class="content has-text-centered"><a class="button join-more is-danger is-rounded" href=' +
      image +
      ' download="valentines-day-<?php echo $randomNumber; ?>.png">▶ Download image</a></p>';
  })
  .catch((e) => {
    console.log(e);
  });</script>

</body>
</html>