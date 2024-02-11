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
  <meta name="theme-color" content="#f8a5c2">
  <link rel="shortcut icon" href="data:image/x-icon;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAACXBIWXMAAA7EAAAOxAGVKw4bAAABqklEQVQ4jZ2Tv0scURDHP7P7SGWh14mkuXJZEH8cgqUWcklAsLBbCEEJSprkD7hD/4BUISHEkMBBiivs5LhCwRQBuWgQji2vT7NeYeF7GxwLd7nl4knMwMDMfL8z876P94TMLt+8D0U0EggQSsAjwMvga8ChJAqxqjTG3m53AQTg4tXHDRH9ABj+zf6oytbEu5d78nvzcyiivx7QXBwy46XOi5z1jbM+Be+nqVfP8yzuD3FM6rzIs9YE1hqGvDf15cVunmdx7w5eYJw1pcGptC9CD4gBUuef5Ujq/BhAlTLIeFYuyfmTZgeYv+2nPt1a371P+Hm1WUPYydKf0lnePwVmh3hnlcO1uc7yvgJUDtdG8oy98kduK2KjeHI0fzCQINSXOk/vlXBUOaihAwnGWd8V5r1uhe1VIK52V6JW2D4FqHZX5lphuwEE7ooyaN7gjLMmKSwYL+pMnV+MA/6+g8RYa2Lg2RBQbj4+rll7uymLy3coiuXb5PdQVf7rKYvojAB8Lf3YUJUHfSYR3XqeLO5JXvk0dhKqSqQQoCO+s5AIxCLa2Lxc6ALcAPwS26XFskWbAAAAAElFTkSuQmCC" />

  <title>Love Calculator</title>
  <meta name="description" content="Valentine's Day Special Love Calculator -  Calculate Your Love Percentage."/>
  <?php $current_page = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; echo '<link rel="canonical" href="'.$current_page.'" />'; ?>


  <link rel="preconnect" href="https://cdnjs.cloudflare.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css" integrity="sha512-IgmDkwzs96t4SrChW29No3NXBIBv8baW490zk5aXvhCD8vuZM3yUSkbyTBcXohkySecyzIrUwiF/qV0cuPcL3Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,700;1,400&display=swap" rel="stylesheet">

  <style>
    body {
        font-family: 'Space Mono', monospace;
        background: #e27eeb;
        min-height: 100vh;
    }
    button  {
        font-family: 'Space Mono', monospace;
    }
    input {
        font-family: 'Space Mono', monospace;
    }
    p {
        font-family: 'Space Mono', monospace;
    }
  </style>

</head>
<body>

<section class="section">
    <div class="container">
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
      <div class="field is-grouped">
        <div class="control">
          <button class="button is-primary" onclick="calculateLove()">Calculate</button>
        </div>
        <div class="control">
          <button class="button is-danger" onclick="clearFields()">Clear</button>
        </div>
      </div>
      <div class="notification is-hidden is-warning" id="loadingText"></div>
      <div class="notification is-hidden" id="result"></div>
    </div>
</section>

<script>
    function calculateLove() {
      const yourName = document.getElementById('yourName').value.trim().toLowerCase();
      const partnerName = document.getElementById('partnerName').value.trim().toLowerCase();
      localStorage.setItem("yourName", yourName);
      localStorage.setItem("partnerName", partnerName);
  
      if (!isValidName(yourName) || !isValidName(partnerName)) {
        showAlert('Please enter a valid names (English text only supported).');
        return;
      }

      const loadingTextElement = document.getElementById('loadingText');
      const resultElement = document.getElementById('result');
      loadingTextElement.classList.remove('is-hidden');
      let percentage = 1;
      const interval = setInterval(() => {
          loadingTextElement.innerHTML = "Calculating...." + percentage + "%";
          if (percentage === 100) {
              clearInterval(interval);
              loadingTextElement.classList.add('is-hidden');
              showResult(yourName, partnerName, resultElement);
          }
          percentage++;
      }, 50);

      clearFields();

    }
    function isValidName(name) {
      return /^[a-zA-Z\s]*$/.test(name) && name.trim() !== '';
    }
    function showResult(yourName, partnerName, resultElement) {

      const lovername = localStorage.getItem("yourName");
      const partnersname = localStorage.getItem("partnerName");
      var lovePercentage = 0;

      for (var i = 0; i < lovername.length; i++) {
            for (var j = 0; j < partnersname.length; j++) {
                 lovePercentage += lovername.charCodeAt(i) * partnersname.charCodeAt(j);
              }
           }

      lovePercentage = lovePercentage % 101;
      resultElement.classList.remove('is-hidden');

      let message;
      let colorClass;

      if (lovePercentage >= 90) {
          message = "🌟 You two are meant to be together! You're like two peas in a pod!";
          colorClass = "is-success";
      } else if (lovePercentage >= 80) {
          message = "💖 Wow! You're a perfect match! Your love is truly extraordinary!";
          colorClass = "is-success";
      } else if (lovePercentage >= 70) {
          message = "😍 Your love is strong! Keep nurturing it and watch it flourish!";
          colorClass = "is-success";
      } else if (lovePercentage >= 60) {
          message = "😊 Great compatibility! Keep enjoying each other's company!";
          colorClass = "is-info";
      } else if (lovePercentage >= 50) {
          message = "🥰 You're doing great! Your relationship is filled with love and understanding!";
          colorClass = "is-link";
      } else if (lovePercentage >= 40) {
          message = "😄 Not bad! There's potential. Work on understanding each other better!";
          colorClass = "is-warning";
      } else if (lovePercentage >= 30) {
          message = "😅 Things could be better, but don't lose hope! Communication is key!";
          colorClass = "is-warning";
      } else if (lovePercentage >= 20) {
          message = "😐 Hmm... Looks like there's some tension. Communication is key!";
          colorClass = "is-danger";
      } else {
          message = "😬 Uh-oh... This might need some serious work! Seek support if needed!";
          colorClass = "is-danger";
      }

      resultElement.classList.add(colorClass);
      resultElement.innerHTML = `
        <p><strong>${yourName}</strong> and <strong>${partnerName}</strong> have a <strong>${lovePercentage}%</strong> match! <br><br> ${message}</p>
      `;
    
    }
    function clearFields() {
      document.getElementById('yourName').value = '';
      document.getElementById('partnerName').value = '';
      document.getElementById('result').classList.add('is-hidden');
      clearAlert();
    }
    function showAlert(message) {
      const alertElement = document.getElementById('result');
      alertElement.classList.remove('is-hidden');
      alertElement.classList.add('is-danger');
      alertElement.innerHTML = message;
    }
    function clearAlert() {
      document.getElementById('result').classList.remove('is-danger');
      document.getElementById('result').innerHTML = '';
    }
</script>

</body>
</html>