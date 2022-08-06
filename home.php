<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
  <style>
  *{

  font-family: 'Poppins', sans-serif;

}

body {
  background: linear-gradient(45deg, #49a09d, #5f2c82);
	font-family: sans-serif;
	font-weight: 100;

}

* {box-sizing:border-box}

/* Slideshow container */
.slideshow-container {
  border-color: black;
  box-shadow: -3px -3px 9px black,
              3px 3px 7px rgba(147, 149, 151, 0.671);
  max-width: 1200px;
position: relative;
  margin: auto;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}
.content{
  margin-left: 80px;
  margin-right: 80px;
  font-size: 150%;

  color: black;
}
</style>

  <div class="topnav">
    <a class="active" href="home.php">Home</a>
    <div class="dropdown">
      <button class="dropbtn">Menu
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <!-- <a target="_self" href="Stocks.html">Stocks

      </a>-->
        <a target="_self" href="stocks1.php">Stocks</a>
        <a target="_self" href="investmentstatus.php">Investment Status</a>
        <a target="_self" href="analysis.php">Analysis</a>
        <a target="_self" href="transactions.php">Transactions</a>
      </div>
    </div>
    <a target="_self" href="contactus.html">Contact Us</a>
    <a target="_self" href="aboutus.html">About Us</a>

  </div>
  <br/>
  <br/>
  <div class="slideshow-container">

<!-- Full-width images with number and caption text -->
<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="bullmarket.jpg" style="width:100%" >
  <div class="text">Bull Market - "A bull market is the condition of a financial market in which prices are rising or are expected to rise. The term "bull market" is most often used to refer to the stock market but can be applied to anything that is traded, such as bonds, real estate, currencies, and commodities."</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="bear.jpg" style="width:100%" >
  <div class="text">Bear Market - "A bear market is a general decline in the stock market over a period of time. It includes a transition from high investor optimism to widespread investor fear and pessimism. One generally accepted measure of a bear market is a price decline of 20% or more over at least a two-month period."</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="bse.jpg" style="width:100%">
  <div class="text">Bombay Stock Exchange(BSE) - "The Bombay Stock Exchange (BSE) is the first and largest securities market in India and was established in 1875 as the Native Share and Stock Brokers' Association."</div>
</div>


<!-- Next and previous buttons -->
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
<span class="dot" onclick="currentSlide(1)"></span>
<span class="dot" onclick="currentSlide(2)"></span>
<span class="dot" onclick="currentSlide(3)"></span>
</div>
  </p>
  <script>
   var slideIndex = 1;
  showSlides(slideIndex);

  // Next/previous controls
  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  // Thumbnail image controls
  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
  }
  /*
  var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 4000); // Change image every 4 seconds
}*/
  </script>
  <br /><br />
  <div class="content">
      <p>
        <h3>What is Stock market?</h3>
        <br/>
        <p>
          Stock markets are venues where buyers and sellers meet to exchange equity shares of public corporations.
Stock markets are vital components of a free-market economy because they enable democratized access to trading and exchange of capital for investors of all kinds.
        </p>
        <p>

          The stock market allows numerous buyers and sellers of securities to meet, interact, and transact. Stock markets allow for price discovery for shares of corporations and serve as a barometer for the overall economy. Since the number of stock market participants is huge, one can often be assured of a fair price and a high degree of liquidity as various market participants compete with one another for the best price.

        </p>
      </p>
      <p>

        <h4>Introduction to the Indian Stock Market
        </h4>
        <br/>
        <p>

          Stock markets are among the largest avenues for investments. There are primarily two stock exchanges in India, the Bombay Stock Exchange (BSE) and the National Stock Exchange (NSE). Companies list their shares for the first time on a stock exchange through an IPO. Investors may then trade in these shares through the secondary market.
        </p>

      </p>
      <p>
        <h4>Sensex and Nifty</h4>
        <p>
          While BSE and NSE are stock markets, both Sensex and Nifty are stock market indices. A stock market index statistically summarises the movements of the market in real-time. A stock market index is created by selecting similar kinds of stock from a market or exchange and grouping them together. Sensex, which stands for ‘Stock Exchange Sensitive Index’, is the stock market index for the Bombay Stock Exchange. It calculates the movement on BSE. Nifty stands for ‘National Stock Exchange Fifty’ and is the index for the National Stock Exchange.
        </p>
      </p>
      <p>
        <h3>Nifty 50 Companies List</h3>
        <br/>
       50 companies listed under NSE
        <a href="https://tradebrains.in/nifty-50-companies-list/" target="_blank">Click here</a>
      </p>
      <p>
        <h3>Sensex 30 Companies List</h3>
        <br/>
         30 companies listed under BSE
        <a href="https://www.samco.in/knowledge-center/articles/sensex-companies/" target="_blank">Click here</a>
      </p>
  </div>
</body>

</html>
