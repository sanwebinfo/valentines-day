<?php

header('Content-type: text/html; charset=UTF-8');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');
header('X-Content-Type-Options: nosniff');

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="HandheldFriendly" content="True" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#c7ecee">
<link rel="shortcut icon" href="data:image/x-icon;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAACXBIWXMAAA7EAAAOxAGVKw4bAAABqklEQVQ4jZ2Tv0scURDHP7P7SGWh14mkuXJZEH8cgqUWcklAsLBbCEEJSprkD7hD/4BUISHEkMBBiivs5LhCwRQBuWgQji2vT7NeYeF7GxwLd7nl4knMwMDMfL8z876P94TMLt+8D0U0EggQSsAjwMvga8ChJAqxqjTG3m53AQTg4tXHDRH9ABj+zf6oytbEu5d78nvzcyiivx7QXBwy46XOi5z1jbM+Be+nqVfP8yzuD3FM6rzIs9YE1hqGvDf15cVunmdx7w5eYJw1pcGptC9CD4gBUuef5Ujq/BhAlTLIeFYuyfmTZgeYv+2nPt1a371P+Hm1WUPYydKf0lnePwVmh3hnlcO1uc7yvgJUDtdG8oy98kduK2KjeHI0fzCQINSXOk/vlXBUOaihAwnGWd8V5r1uhe1VIK52V6JW2D4FqHZX5lphuwEE7ooyaN7gjLMmKSwYL+pMnV+MA/6+g8RYa2Lg2RBQbj4+rll7uymLy3coiuXb5PdQVf7rKYvojAB8Lf3YUJUHfSYR3XqeLO5JXvk0dhKqSqQQoCO+s5AIxCLa2Lxc6ALcAPwS26XFskWbAAAAAElFTkSuQmCC" />

<title>Love Calculator</title>
<meta name="description" content="Valentine's Day Special Love Calculator -  Calculate Your Love Percentage."/>
<?php $current_page = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; echo '<link rel="canonical" href="'.$current_page.'" />'; ?>


<meta property="og:site_name" content="Love Calculator">
<meta property="og:type" content="website">
<meta property="og:title" content="Love Calculator">
<meta property="og:description" content="Valentine's Day Special Love Calculator -  Calculate Your Love Percentage.">
<meta property="og:url" content="<?php $current_page = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; echo $current_page; ?>">
<meta property="og:image" content="<?php echo "https://$_SERVER[HTTP_HOST]/og/lovecalculator";?>">
<meta property="og:image:alt" content="Love Calculator" />
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">

<meta name="twitter:title" content="Love Calculator">
<meta name="twitter:description" content="Valentine's Day Special Love Calculator -  Calculate Your Love Percentage.">
<meta name="twitter:url" content="<?php $current_page = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; echo $current_page; ?>">
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:image" content="<?php echo "https://$_SERVER[HTTP_HOST]/og/lovecalculator";?>">

<link rel="preconnect" href="https://cdnjs.cloudflare.com">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css" integrity="sha512-IgmDkwzs96t4SrChW29No3NXBIBv8baW490zk5aXvhCD8vuZM3yUSkbyTBcXohkySecyzIrUwiF/qV0cuPcL3Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/fontfaceobserver/2.3.0/fontfaceobserver.min.js" integrity="sha512-7g/mtWY/pF5yAwrcHhRBBrDK3Tr1Xbjaweymp5/jiEmKJurJkRfi5grW5mKQx78wPRoQPOu1zfeWdJtsCw8QsQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <style>
    body {
      font-family: 'Fira Code', monospace;
      background: #c7ecee;
      min-height: 100vh;
      font-weight: 600;
    }
    button  {
      font-family: 'Fira Code', monospace;
      font-weight: 700;
    }
    input {
      font-family: 'Fira Code', monospace;
      font-weight: 700;
    }
    p {
      font-family: 'Fira Code', monospace;
    }
    .notification {
      font-family: 'Fira Code', monospace;
      font-weight: 700;
    }
    .progress {
      display: none;
      height: 20px;
      background-color: #f0f0f0;
      border-radius: 10px;
      margin-bottom: 20px;
      overflow: hidden;
      animation: slideIn 0.5s ease forwards, fadeIn 0.5s ease forwards;
    }
    .progress-bar {
      height: 100%;
      background-color: #4caf50;
      transition: width 0.5s ease;
    }
    .progress-text {
      display: none;
      margin-top: 5px;
      font-size: 14px;
      animation: fadeIn 0.5s ease forwards;
    }
    @keyframes slideIn {
      from {
        transform: translateX(-100%);
      }
      to {
        transform: translateX(0);
      }
    }
    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }
  </style>

</head>
<body>

<section class="section">
<div class="container content">
<div class="columns is-centered">
<div class="column is-half">
<h1 class="title">Love Calculator</h1>
<div class="field">
<label class="label">Your Name</label>
<div class="control">
<input class="input" type="text" id="yourName" placeholder="Enter your name">
</div>
</div>
<div class="field">
<label class="label">Partner's Name</label>
<div class="control">
<input class="input" type="text" id="partnerName" placeholder="Enter partner's name">
</div>
</div>
<div id="counter">
<div class="tags has-addons"><span class="tag is-dark">Total Words: </span><span class="tag is-info">0</span></div>
</div>
<br>
<div class="field is-grouped">
<div class="control">
<button class="button is-primary" onclick="calculateLove()">Calculate</button>
</div>
<div class="control">
<button class="button is-danger" onclick="clearFields()">Clear</button>
</div>
</div>
<div id="errorMessage"></div>
<br>
<div class="notification is-hidden is-warning" id="loadingText"></div>
<div class="notification is-hidden" id="result"></div>
<span class="progress-text" id="progress-text"></span>
<div class="progress" id="progress-bar">
<div class="progress-bar" id="progress"></div>
</div>
<div id="canva-result"></div>
<div style="font-family: 'Fira Code', monospace;">
<canvas id="Canvas" width="1080px" height="1080px" style="display: none; width:100%; height:100%"></canvas>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

<script src="/calculator/app.js"></script>

</body>
</html>