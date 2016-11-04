<html>
<head>
<style type="text/css">
body{
background:gray;
}
#wrap{
width:810px;
height:200px;
border:1px solid black;
position:relative;
left:50%;
top:50%;
margin-left:-410px;
margin-top:-250px;
background:#F5E0E3;
overflow:hidden;
}
#wrap ul{
margin:0px;
padding:0px;
position:absolute;
top:0px;
left:0px;
}
#wrap ul li{
list-style:none;
float:left;
margin:5px 10px;
}
#wrap ul li img{
width:250px;
height:180px;
cursor:pointer;
}
.direction{
width:104px;
margin:50px auto;
}
.direction img{
border:1px dotted pink;
cursor:pointer;
}
.active{
border:2px solid gray;
}
</style>
<script type="text/javascript">
window.onload = function(){
	var ul = document.getElementById("wrap").getElementsByTagName("ul")[0];
	var lis = ul.getElementsByTagName("li");
	var btn1 = document.getElementById("button1");
	var btn2 = document.getElementById("button2");
	var imgs = ul.getElementsByTagName("img");
	var speed = 3;
	var time = null;
	ul.innerHTML += ul.innerHTML;
	ul.style.width = (lis[0].offsetWidth+20)*lis.length + "px";
	time = setInterval(function(){
			ul.style.left = ul.offsetLeft - speed + "px";
			if(ul.offsetLeft <= -ul.offsetWidth/2){
					ul.style.left ="0px";
				}else if(ul.offsetLeft >=0){
						ul.style.left = -ul.offsetWidth/2 + "px";
					}
		},30);
	btn1.onmouseover = function(){
			speed = 3;
		}
	btn2.onmouseover = function(){
			speed = -3;
			}
	for(var i in imgs){
		imgs[i].onmouseover = function(){
				clearInterval(time);
				for(var i = 0;i<imgs.length;i++){
						imgs[i].className = "none";
					}
				this.className = "active";
			}
		imgs[i].onmouseout = function(){
				time = setInterval(function(){
					ul.style.left = ul.offsetLeft - speed + "px";
					if(ul.offsetLeft <= -ul.offsetWidth/2){
						ul.style.left ="0px";
							}else if(ul.offsetLeft >=0){
							ul.style.left = -ul.offsetWidth/2 + "px";
						}
							},30);
								for(var i = 0;i<imgs.length;i++){
						imgs[i].className = "none";
					}
			}
		}
		}
</script>
</head>


<div id="wrap">
<ul>
<li><img src="upimages/1.jpg" alt="pic one" /></li>
<li><img src="upimages/2.jpg" alt="pic two" /></li>
<li><img src="upimages/5.jpg" alt="pic three" /></li>
<li><img src="upimages/6.jpg" alt="pic four" /></li>
</ul>
</div>
<div class="direction"><img src="/jscss/demoimg/201204/left.png" alt="" id="button1"/><img src="/jscss/demoimg/201204/right.png" alt="" id="button2"/></div>




</html>