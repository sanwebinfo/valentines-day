const you = document.getElementById('yourName');
const partner = document.getElementById('partnerName');
const counter = document.getElementById('counter');
function validateInput() {
    const one = you.value;
    const two = partner.value;
    if (one.length < 3 || one.length > 25) {
      errorMessage.innerHTML = '<p class="notification is-warning">Text must be between 3 to 25 characters long.</p>';
      return false;
    } else if (two.length < 3 || two.length > 25) {
        errorMessage.innerHTML = '<p class="notification is-warning">Text must be between 3 to 25 characters long.</p>';
        return false;
    } else {
      errorMessage.textContent = "";
      return true;
    }
  }
you.addEventListener('input', validateInput);
you.addEventListener('keydown', function(event) {
  if (you.value.length >= 25 && event.key !== 'Backspace') {
      event.preventDefault();
    }
   validateInput();
});
partner.addEventListener('input', validateInput);
partner.addEventListener('keydown', function(event) {
  if (partner.value.length >= 25 && event.key !== 'Backspace') {
      event.preventDefault();
    }
   validateInput();
});
you.addEventListener('input', function() {
  const textLength = this.value.length;
  counter.innerHTML = `<div class="tags has-addons"><span class="tag is-dark">Total Words: </span><span class="tag is-info">${textLength}</span><br>`;
});
partner.addEventListener('input', function() {
  const textLength = this.value.length;
  counter.innerHTML = `<div class="tags has-addons"><span class="tag is-dark">Total Words: </span><span class="tag is-info">${textLength}</span><br>`;
})
function calculateLove() {
  const yourName = document
    .getElementById("yourName")
    .value.trim()
    .toLowerCase();
  const partnerName = document
    .getElementById("partnerName")
    .value.trim()
    .toLowerCase();
  localStorage.setItem("yourName", yourName);
  localStorage.setItem("partnerName", partnerName);

  if (!isValidName(yourName) || !isValidName(partnerName)) {
    showAlert("<p>- Please enter a valid names (English text only supported) <br> - Minimum 3 and Maximum 25 letters only supported <br> - Numbers and Symbols Won't Support</p>");
    return;
  }

  const loadingTextElement = document.getElementById("loadingText");
  const resultElement = document.getElementById("result");
  loadingTextElement.classList.remove("is-hidden");
  let percentage = 1;
  const interval = setInterval(() => {
    loadingTextElement.innerHTML = "<p>Calculating...." + percentage + "%</p>";
    if (percentage === 100) {
      clearInterval(interval);
      loadingTextElement.classList.add("is-hidden");
      showResult(yourName, partnerName, resultElement);
      document.getElementById("progress-bar").style.display = "block";
      document.getElementById("progress-text").style.display = "block";
      document.getElementById("canva-result").style.display = "block";
      document.getElementById("Canvas").style.display = "block";
    }
    percentage++;
  }, 50);

  clearFields();
}
function isValidName(name) {
  return /^[a-zA-Z\s]{3,25}$/.test(name) && name.trim() !== "" && name.length >= 3 && name.length <= 25;
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
  resultElement.classList.remove("is-hidden");

  let message;
  let colorClass;

  if (lovePercentage >= 101) {
    message =
      "🌟 You two are meant to be together<br>You're like two peas in a pod";
    colorClass = "is-success";
  } else if (lovePercentage >= 90) {
    message = "💖 Wow You're a perfect match<br>💖 Your love is truly extraordinary";
    colorClass = "is-success";
  } else if (lovePercentage >= 80) {
    message = "💖 Wow You're a perfect match<br>💖 Your love is truly extraordinary";
    colorClass = "is-success";
  } else if (lovePercentage >= 70) {
    message = "😍 Your love is strong Keep nurturing it<br>😍 and watch it flourish";
    colorClass = "is-success";
  } else if (lovePercentage >= 60) {
    message = "😊 Great compatibility Keep enjoying<br>😊 each other's company";
    colorClass = "is-info";
  } else if (lovePercentage >= 50) {
    message =
      "🥰 You're doing great Your relationship<br>🥰 is filled with love and understanding";
    colorClass = "is-link";
  } else if (lovePercentage >= 40) {
    message =
      "😄 Not bad There's potential<br>😄 Work on understanding each other better";
    colorClass = "is-warning";
  } else if (lovePercentage >= 30) {
    message =
      "😅 Things could be better<br>😅 but don't lose hope Communication is key";
    colorClass = "is-warning";
  } else if (lovePercentage >= 20) {
    message = "😐 Hmm Looks like there's some tension<br>😐 Communication is key";
    colorClass = "is-danger";
  } else {
    message = "😬 Uh-oh Hmm <br>😬 This might need some serious work";
    colorClass = "is-danger";
  }

  resultElement.classList.add(colorClass);
  resultElement.innerHTML = `
        <p><strong>${yourName}</strong> and <strong>${partnerName}</strong> have a <strong>${lovePercentage}%</strong> match <br><br> ${message}</p>
      `;
  animateProgressBar(lovePercentage);
  drawCanvas(yourName, partnerName, lovePercentage, message)
}
function drawCanvas(yourName, partnerName, lovePercentage, message) {
    const min = 1;
    const max = 5000;
    const randomNumber = getRandomNumber(min, max);
    const font = new FontFaceObserver("Fira Code");
    font.load().then(function () {
        const imageObj = new Image();
        const canvas = document.getElementById("Canvas");
        const context = canvas.getContext("2d");
        context.font = "700 30px Fira Code";
        imageObj.onload = function () {
            context.textAlign = "justify";
            context.drawImage(imageObj, 0, 0, 1080, 1080);
            context.fillStyle = "#ffeaa7";

            let lovePercentageText =
                "💚 Your Name: " +
                yourName +
                "<br>" +
                "💚 Partner Name: " +
                partnerName +
                "<br>💟 Your Love Percentage: " +
                lovePercentage + "%" +
                "<br>" +
                message;
            let lines = lovePercentageText.split("<br>");

            let y = 365;
            lines.forEach(function (line) {
                context.fillText(line, 135, y, 900);
                y += 55;
            });
            let image = canvas.toDataURL("image/png", 0.5);
            document.getElementById("canva-result").innerHTML = `
                <h2 class="is-size-6 has-text-centered">Download your Report 💜</h2><div class="has-text-centered is-small"><a class="button is-danger is-rounded" href="${image}" download="love-percentage-${randomNumber}">⬇ Download image</a></div><br>
            `;
        };

        imageObj.setAttribute("crossOrigin", "anonymous");
        imageObj.src = "/calculator/love-percentage.png";
    });
}
function animateProgressBar(percentage) {
  const progressText = document.getElementById("progress-text");
  const progressBar = document.getElementById("progress");

  progressText.innerHTML = `<p><div class="tags has-addons"><span class="tag is-dark">Love Percentage: </span><span class="tag is-info">${percentage}%</span></div></p>`;
  progressBar.style.width = percentage + "%";

  if (percentage < 20) {
    progressBar.style.backgroundColor = "#eb2f06";
  } else if (percentage < 30) {
    progressBar.style.backgroundColor = "#fa983a";
  } else if (percentage < 40) {
    progressBar.style.backgroundColor = "#e58e26";
  } else if (percentage < 50) {
    progressBar.style.backgroundColor = "#f8c291";
  } else if (percentage < 60) {
    progressBar.style.backgroundColor = "#4a69bd";
  } else if (percentage < 70) {
    progressBar.style.backgroundColor = "#4a69bd";
  } else if (percentage < 80) {
    progressBar.style.backgroundColor = "#b8e994";
  } else if (percentage < 90) {
    progressBar.style.backgroundColor = "#6ab04c";
  } else if (percentage < 101) {
    progressBar.style.backgroundColor = "#6ab04c";
  } else {
    progressBar.style.backgroundColor = "#eb2f06";
  }
}
function getRandomNumber(min, max) {
  return Math.floor(Math.random() * (max - min) + min);
}
function clearFields() {
  document.getElementById("yourName").value = "";
  document.getElementById("partnerName").value = "";
  document.getElementById("result").classList.add("is-hidden");
  document.getElementById("progress-bar").style.display = "none";
  document.getElementById("progress-text").style.display = "none";
  document.getElementById("canva-result").style.display = "none";
  document.getElementById("Canvas").style.display = "none";
  counter.innerHTML = '<div class="tags has-addons"><span class="tag is-dark">Total Words: </span><span class="tag is-info">0</span></div>';
  errorMessage.textContent = '';
  clearAlert();
}
function showAlert(message) {
  const alertElement = document.getElementById("result");
  document.getElementById("progress-bar").style.display = "none";
  document.getElementById("progress-text").style.display = "none";
  document.getElementById("canva-result").style.display = "none";
  document.getElementById("Canvas").style.display = "none";
  alertElement.classList.remove("is-hidden");
  alertElement.classList.add("is-danger");
  alertElement.innerHTML = message;
  counter.innerHTML = '<div class="tags has-addons"><span class="tag is-dark">Total Words: </span><span class="tag is-info">0</span></div>';
  errorMessage.textContent = '';
}
function clearAlert() {
  document.getElementById("result").classList.remove("is-danger");
  document.getElementById("result").innerHTML = "";
}