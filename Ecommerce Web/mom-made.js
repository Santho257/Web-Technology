function addCart(num){
	var carts=document.getElementsByClassName("fa-cart-shopping");
	var chosen=carts[num];
	console.log(chosen);
	if(chosen.parentNode.style.color!="rgb(233, 156, 46)")	
		chosen.parentNode.style.color="#e99c2e";
	else	chosen.parentNode.style.color="#ffffff";
}
function addFav(num){
	var hearts=document.getElementsByClassName("fa-heart");
	var chosen=hearts[num];
	if(chosen.style.color!="rgb(255, 0, 0)")	
		chosen.style.color="#ff0000";
	else	chosen.style.color="#ffffff";
}
var x=document.getElementsByClassName("pro");
for(var i=0;i<x.length;i++){
	x[i].addEventListener('click',prodDesc(x[i]));
}
function prodDesc(a){
	var img=a.getElementsByTagName("img")[0].getAttribute("src");
	var proImg=document.getElementById("prog-imag");
	// getElementsByTagName("img");
	console.log(proImg);
	// proImg[0].setAttribute("src",img);
}
function login(num){
	if(num==0){
		document.getElementById('sign-in').style.display="none";
		document.getElementById('sign-up').style.display="block";
		document.getElementById('status').innerHTML="Sign Up";
	}
	else if(num==1){
		document.getElementById('sign-up').style.display="none";
		document.getElementById('sign-in').style.display="block";
		document.getElementById('status').innerHTML="Sign In";
	}
}
