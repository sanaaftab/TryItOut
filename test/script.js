//        DROPBOX

var itemsBeingUsed = [];
var numberOfItemsBeingUsed = 0;
var lastDrag;

var width = document.getElementById('container').offsetWidth;
var height = document.getElementById('container').offsetHeight;

var stage = new Konva.Stage({
  container: 'container',
  width: width,
  height: height
});

var layer = new Konva.Layer();
stage.add(layer);


stage.on('click tap', function (e) {
  // if click on empty area - remove all transformers
  if (e.target === stage) {
    stage.find('Transformer').destroy();
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

  // create new transformer
  var tr = new Konva.Transformer();
  layer.add(tr);
  tr.attachTo(e.target);
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
  var image = new Image();
  image.src = document.getElementById(lastDrag).src;
  createRectangle(image);
}

/* TODO:
if (img.height >= img.width){
  var ratio = img.width/img.height;
  img.height = 300;
  img.width = 300*ratio;
}
*/
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
