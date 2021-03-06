//        DROPBOX

var itemsBeingUsed = [];
var numberOfItemsBeingUsed = 0;
var lastDrag;
var selectedRectangle = null;
var removeButton = null;
var personImage;
var removeButtonImage = new Image();
removeButtonImage.src = 'deleteButton.png';

var width = document.getElementById('container').offsetWidth;
var height = document.getElementById('container').offsetHeight;

var stage = new Konva.Stage({
  container: 'container',
  width: width,
  height: height
});

var layer = new Konva.Layer();
stage.add(layer);

var pImage = new Image();
pImage.src = 'person.jpg';
pImage.onload = replaceImage;

function replaceImage() {
  if (personImage != null)
    personImage.destroy();
  var ratio = pImage.height / pImage.width;
  var neededHeight, neededWidth;
  var neededX, neededY;
  var containerHeight = document.getElementById('container').offsetHeight;
  var containerWidth = document.getElementById('container').offsetWidth;

  if (ratio > containerHeight / containerWidth) {
    neededHeight = containerHeight;
    neededWidth = neededHeight / ratio;
    neededX = (containerWidth - neededWidth) /2;
    neededY = 0;
  }
  else {
    neededWidth = containerWidth;
    neededHeight = neededWidth * ratio;
    neededY = (containerHeight - neededHeight) /2;
    neededX = 0;
  }

  personImage = new Konva.Image({
      x: neededX,
      y: neededY,
      image: pImage,
      width: neededWidth,
      height: neededHeight,
      name: 'personImage'
    });
  layer.add(personImage);
  layer.draw();
}

stage.on('click tap', function (e) {
  // if click on empty area - remove all transformers
  if (e.target === stage || e.target.hasName('personImage')) {
    stage.find('Transformer').destroy();
    selectedRectangle = null;
    if (removeButton != null)
      removeButton.destroy();
    layer.draw();
    return;
  }
  //if click on removeButton - remove rectangle, transformers and button
  if (e.target === removeButton) {
    destroyRectangle(selectedRectangle);
    stage.find('Transformer').destroy();
    removeButton.destroy();
    selectedRectangle = null;
    layer.draw();
    return;
  }
  // do nothing if clicked NOT on our rectangles
  if (!e.target.hasName('item')) {
    return;
  }
  // remove old transformers
  // TODO: we can skip it if current rect is already selected
  stage.find('Transformer').destroy();
  if (removeButton != null)
    removeButton.destroy();

  // create new transformer
  var tr = new Konva.Transformer();
  layer.add(tr);
  tr.attachTo(e.target);
  selectedRectangle = e.target;
  createRemoveButton();
  layer.draw();
})

//--------------------------------------------------------------------------
//                DRAG FEATURE
function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
  lastDrag = ev.target.id;
}

function drop(ev) {
  ev.preventDefault();
  var image = new Image();
  image.src = document.getElementById(lastDrag).src;
  createRectangle(image);
}
//--------------------------------------------------------------------------
function createRectangle(image) {
  var rect = new Konva.Rect({
    x: 75,
    y: 60,
    width: image.width * (300 / image.height),
    height: 300,
    fillPatternImage: image,
    fillPatternScaleY: 300 / image.height,
    fillPatternScaleX: 300 / image.height,
    fillPatternRepeat: 'no-repeat',
    name: 'item',
    draggable: true
  });
  layer.add(rect);
  layer.draw();
}

function destroyRectangle(rectangle) {
  rectangle.destroy();
}

function createRemoveButton(){
  removeButton = new Konva.Circle({
    x: 450 - 20,
    y: 20,
    radius: 18,
    fillPatternOffsetX: 50,
    fillPatternOffsetY: 50,
    fillPatternScaleY: 35 / removeButtonImage.height,
    fillPatternScaleX: 35 / removeButtonImage.height,
    fillPatternImage: removeButtonImage,
    fillPatternRepeat: 'no-repeat',
    stroke:'black',
    strokeWidth: 3,
    name: 'button'
  });
  removeButton.on('mouseover', function() {
    removeButton.cache();
    removeButton.filters([Konva.Filters.RGB]);
    removeButton.red(255);
    removeButton.green(0);
    removeButton.blue(0);
    layer.draw();
  });

  removeButton.on('mouseout', function() {
    removeButton.cache();
    removeButton.filters([Konva.Filters.RGB]);
    removeButton.red(0);
    removeButton.green(0);
    removeButton.blue(0);
    layer.draw();
  });
  layer.add(removeButton);
  layer.draw();
}

function uploadImage() {
  if (document.querySelector('input[type=file]').files[0]); {
    var file = document.querySelector('input[type=file]').files[0]; //sames as here
    var reader  = new FileReader();

    reader.onloadend = function () {
      pImage.src = reader.result;
      replaceImage();
    }

    if (file) {
      reader.readAsDataURL(file); //reads the data as a URL
    }
  }
}
