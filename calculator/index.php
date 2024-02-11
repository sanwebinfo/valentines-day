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
    #progress {
      display: none;
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
      <progress class="progress is-primary" id="progress" max="100">15%</progress>
      <div class="notification is-hidden is-warning" id="loadingText">Calculating...</div>
      <div class="notification is-hidden" id="result"></div>
    </div>
</section>

<script>
    function calculateLove() {
      const yourName = document.getElementById('yourName').value.trim();
      const partnerName = document.getElementById('partnerName').value.trim();

      if (!isValidName(yourName) || !isValidName(partnerName)) {
        showAlert('Please enter a valid names (English text only supported).');
        return;
      }

      const progressElement = document.getElementById('progress');
      const loadingTextElement = document.getElementById('loadingText');
      const resultElement = document.getElementById('result');

      progressElement.style.display = 'block';
      loadingTextElement.classList.remove('is-hidden');

      const interval = setInterval(() => {
        progressElement.value += 5;
        if (progressElement.value >= 100) {
          clearInterval(interval);
          progressElement.style.display = 'none';
          loadingTextElement.classList.add('is-hidden');
          showResult(yourName, partnerName, resultElement);
        }
      }, 100);

      clearFields();
    }
    function isValidName(name) {
      return /^[a-zA-Z\s]*$/.test(name) && name.trim() !== '';
    }
    function showResult(yourName, partnerName, resultElement) {
      const lovePercentage = Math.floor(Math.random() * 100) + 1;

      resultElement.classList.remove('is-hidden');

      let message;
      let colorClass;

      if (lovePercentage >= 90) {
            message = "You both are perfect couple";
            colorClass = "is-success";
        } else if (lovePercentage >= 70) {
            message = "Your relationship will be awesome carry on.";
            colorClass = "is-info";
        } else if (lovePercentage >= 30) {
            message = "Trust and care for each other everything is gonna be ok.";
            colorClass = "is-info";
        } else {
            message = "This isn't going to greate relationship makesure it's ok for you.";
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
      document.getElementById('progress').style.display = 'none';
      document.getElementById('progress').value = 0;
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