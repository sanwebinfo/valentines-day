<?php

$user = '';

if(isset($_GET['name'])){
    $user = $_GET['name'];
}

$cleanup = htmlspecialchars($user,ENT_COMPAT);
$randomNumber = rand();
$specialChars = ["@", "!", "-", "<", ">", "[", "]", "?", "(", ")", "script", "<>", "alert", "php", "`", "'"];
$partner = str_replace($specialChars, '', $cleanup);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="HandheldFriendly" content="True" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#ffffff">
    <title><?php echo "Hi $partner"; ?></title>
    <meta name="description" content="<?php echo "Happy Valentine's Day: $partner"; ?> "/>

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
    border: #303952 1px solid;
    color: #fdcb6e;
    line-height: 1.5em;
    background: #12372A;
    border-radius: 5px;
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
    echo '<pre style="display: flex; justify-content: center;" >';
    echo "No user input data";
    echo "</pre>";
    echo '</div></div></div></section>';
}

?>

<script>html2canvas(document.getElementById("copy-quote"), {
     onclone: function (clonedDoc) {
        clonedDoc.getElementById('copy-quote').style.display = 'block';
    },
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
      ' download="valentines-day-<?php echo $randomNumber; ?>.png">⬇ Download image</a></p>';
  })
  .catch((e) => {
    console.log(e);
  });</script>

</body>
</html>