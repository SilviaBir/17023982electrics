//jQuery code here
//loading products one by one without refreshing the page, after pressing the button

//TVs:
//LG
$(document).ready(function() {
  var productCount = 0;
  $("#LG").click(function() {
    productCount = productCount + 1;
    //we use .load() function to pass the data from the .php file, using the AJAX request
    $("#lgtv").load("tv-lg.php", {
      //to keep track on how many products I have right now
      productLGCount: productCount
    });
  });
});
//Samsung
$(document).ready(function() {
  var productCount = 0;
  $("#Samsung").click(function() {
    productCount = productCount + 1;
    //we use .load() function to pass the data from the .php file, using the AJAX request
    $("#samsungtv").load("tv-samsung.php", {
      //to keep track on how many products I have right now
      productSamsungCount: productCount
    });
  });
});
//Sony
$(document).ready(function() {
  var productCount = 0;
  $("#Sony").click(function() {
    productCount = productCount + 1;
    //we use .load() function to pass the data from the .php file, using the AJAX request
    $("#sonytv").load("tv-sony.php", {
      //to keep track on how many products I have right now
      productSonyCount: productCount
    });
  });
});
//Refrigerators:
//LG
$(document).ready(function() {
  var productCount = 0;
  $("#LGRefLogo").click(function() {
    productCount = productCount + 1;
    //we use .load() function to pass the data from the .php file, using the AJAX request
    $("#lgref").load("ref-lg.php", {
      //to keep track on how many products I have right now
      productLGCount: productCount
    });
  });
});
//Samsung
$(document).ready(function() {
  var productCount = 0;
  $("#SamsungRefLogo").click(function() {
    productCount = productCount + 1;
    //we use .load() function to pass the data from the .php file, using the AJAX request
    $("#samsungref").load("ref-samsung.php", {
      //to keep track on how many products I have right now
      productSamsungCount: productCount
    });
  });
});
//Midea
$(document).ready(function() {
  var productCount = 0;
  $("#MideaLogo").click(function() {
    productCount = productCount + 1;
    //we use .load() function to pass the data from the .php file, using the AJAX request
    $("#midearef").load("ref-midea.php", {
      //to keep track on how many products I have right now
      productMideaCount: productCount
    });
  });
});
