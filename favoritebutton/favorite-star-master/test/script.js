function clicked ()
{
  //Test ID name = cloth
  //Get the img src as a string and send it via POST
  //var link = document.getElementById("cloth").src; - Absolute URL
  var link = document.getElementById("cloth").getAttribute("src");
  alert("This is it: \n" + link);
  //Set link into textbox for POST
  document.getElementById("sourceTxt").value = link;
  
  var currentColor = document.getElementsByClassName("favorite-star-character")[0].style;
  //Toggle activated or not
  if (currentColor.color ===  'rgb(255, 172, 51)')
  {
    //Take out of favourites
    //Set if favourite or not into textbox for POST
    document.getElementById("txt").value = "false";
    document.getElementsByClassName("favorite-star-character")[0].style.color = '#ccd6dd';
    document.forms["form"].submit();  //Force submit the form
  }
  else
  {
    //Put into favourites
    //Set if favourite or not into textbox for POST
    document.getElementById("txt").value = "true";
    document.getElementsByClassName("favorite-star-character")[0].style.color = '#ffac33';
    document.forms["form"].submit();  //Force submit the form
  }
}
