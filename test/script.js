var width = document.getElementById('container').offsetWidth;
var height = document.getElementById('container').offsetHeight;

var stage = new Konva.Stage({
  container: 'container',
  width: width,
  height: height
});

var layer = new Konva.Layer();
stage.add(layer);

var img = new Image();
img.src = "shirt.png";
/*
if (img.height >= img.width){
  var ratio = img.width/img.height;
  img.height = 300;
  img.width = 300*ratio;
}
*/

var rect1 = new Konva.Rect({
  x: 50,
  y: 50,
  width: 300,
  height: 300,
  fillPatternImage: img,
  name: 'item',
  draggable: true
});
layer.add(rect1);
layer.draw();

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
