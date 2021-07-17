
function work() {
    
  var newDiv = document.createElement("workDiv");
  var newContent = document.createTextNode('A quand meme il était temps de se mettre au travail !');
  newDiv.appendChild(newContent);
  var currentDiv = document.getElementById('working');
  document.body.insertBefore(newDiv, currentDiv);
    
}
document.getElementById("test").onmouseout = function() {mouseOut()};
function mouseOut() {
    
    var workDiv = document.getElementsByTagName('workDiv').remove();
    
}
document.getElementById("demo").onmouseout = function() {mouseOut()};

