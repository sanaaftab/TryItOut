function getQueryVariable(variable){
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return pair[1];}
       }
       return(false);
}

function createPicDiv(StorageLink, ShopLink){
  let div1 = document.createElement("div");
  div1.className = "col-lg-3 col-md-6 mb-4";
  div1.style.display = "inline-block";
  div1.style.height = 500;

  let div2 = document.createElement("div");
  div2.className = "cardshadow h-100";

  let image = new Image();
  image.src = StorageLink;
  image.className = "card-img-top" ;
  image.onclick = function(){window.location.href = ShopLink};
  image.style.height = 'auto';
  image.style.width = 200;

  list.appendChild(div1);
  div1.appendChild(image);
}


function displayInfo(location){
  $.post("getOutfitInfo.php",{location: location})
    .done(function(data){
      var list = document.getElementById("list");

      var tokens = data.split(" ");

      for(var i=0; i<parseInt(data[0]); i++){
        createPicDiv(tokens[1 + i * 3 + 1],tokens[1 + i * 3 + 2]);
      }//for

      var shareDiv = document.createElement("div");
      list.appendChild(shareDiv);

      var text = document.createElement("h2");
      text.innerHTML = "Share outfit with you friends using the link below";
      text.style.padding = "20px 10px 20px 10px";

      var linkText = document.createElement("h4");
      linkText.innerHTML = window.location.href;
      linkText.style.border = 'inset';
      linkText.style.borderRadius = '0.5em';
      linkText.style.display = 'inline';

      shareDiv.appendChild(text);
      shareDiv.appendChild(linkText);
    });
}

var outfitLocation = getQueryVariable("o");
if(outfitLocation){
  outfitLocation = "outfits/" + outfitLocation + ".png";
  var image1 = document.getElementById("outfit");
  image1.src = outfitLocation;

  //find and display the creator
  creator = document.getElementById("creator");

  $.post("findCreator.php",{location: outfitLocation})
    .done(function(data){
      if (data === "Outfit Not Found"){
        image1.parentNode.removeChild(image);
        creator.style.padding = "200px 10px 200px";
      }
      else {
        creator.innerHTML = "Created by: " + data;
        creator.style.padding = "15px 10px 15px";
        displayInfo(outfitLocation);
      }
    });

    if (isLoggedIn){
      $.post("getUserID.php",{location: outfitLocation})
        .done(function(data){
          if (data == usersID){

            let buttonDiv = document.createElement("div");
            document.getElementById("rmvBtn").appendChild(buttonDiv);

            let rmvBtn = document.createElement("removeButton");
            rmvBtn.className = "btn btn-primary";
            rmvBtn.innerHTML = "Delete outfit";

            rmvBtn.onclick = function(){
              $.post("removeOutfit.php", {location: outfitLocation})
                .done(function(data){
                  alert(data);
                  window.location = "myaccount.php";
                });
            }

            buttonDiv.appendChild(rmvBtn);
          }
      });
    }
}
