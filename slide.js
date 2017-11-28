// JavaScript Document	
function swapImage(id, path)
{
var el = document.getElementById(id);
el.count = el.count || 0;
el.src = path[el.count];
el.count = (el.count + 1) % path.length;
}
setInterval(function () {
swapImage('slide1', [
"img/projects/Home.png",
"img/projects/Contact.png"
]);
}, 1000);
		
setInterval(function () {
swapImage('slide2', [
"img/projects/Home.png",
"img/projects/Contact.png"
]);
}, 3000);
