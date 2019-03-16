function clicked ()
{
  alert("Clicked was invoked!");
  //SQL to activate favorites in Database
  var currentColor = document.getElementsByClassName("favorite-star-character")[0].style;
  //Toggle activated and not
  if (currentColor.color ===  'rgb(255, 172, 51)')
  {
    //Take out of favourites
    document.getElementsByClassName("favorite-star-character")[0].style.color = '#ccd6dd';
  }
  else
  {
    //Put into favourites
    document.getElementsByClassName("favorite-star-character")[0].style.color = '#ffac33';
  }
}
