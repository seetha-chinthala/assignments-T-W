<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>Birthday Surprise Gallery</title>

<script crossorigin src="https://unpkg.com/react@18/umd/react.development.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@18/umd/react-dom.development.js"></script>
<script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>

<style>

body{
margin:0;
font-family:Arial;
text-align:center;
height:100vh;
background:linear-gradient(135deg,#ff9a9e,#fad0c4,#fad0c4);
overflow:hidden;
}

/* balloons */

.balloon{
position:absolute;
bottom:-100px;
font-size:40px;
animation:float 10s linear infinite;
}

@keyframes float{
0%{transform:translateY(0)}
100%{transform:translateY(-120vh)}
}

/* container */

.container{
margin-top:100px;
}

img{
width:340px;
height:240px;
border-radius:20px;
box-shadow:0 10px 25px rgba(0,0,0,0.5);
animation:fadeIn 1s;
}

@keyframes fadeIn{
from{opacity:0; transform:scale(0.9)}
to{opacity:1; transform:scale(1)}
}

.month{
font-size:32px;
margin-top:15px;
font-weight:bold;
color:white;
text-shadow:2px 2px 6px black;
}

/* progress */

.progress{
margin-top:20px;
color:white;
font-size:20px;
}

/* popup */

.popup{
position:fixed;
top:0;
left:0;
right:0;
bottom:0;
background:rgba(0,0,0,0.8);
display:flex;
justify-content:center;
align-items:center;
}

.popup-box{
background:white;
padding:40px;
border-radius:20px;
width:380px;
animation:pop 1s;
}

@keyframes pop{
from{transform:scale(0)}
to{transform:scale(1)}
}

.popup-box img{
width:120px;
margin-top:15px;
}

h2{
color:#ff4081;
}

.confetti{
position:absolute;
width:10px;
height:10px;
background:red;
animation:fall 4s linear infinite;
}

@keyframes fall{
0%{transform:translateY(-100px)}
100%{transform:translateY(100vh)}
}

</style>

</head>

<body>

<div id="root"></div>

<script type="text/babel">

function Balloons(){

const balloons=["🎈","🎈","🎈","🎈","🎈"];

return balloons.map((b,i)=>
<div key={i}
className="balloon"
style={{
left:Math.random()*100+"%",
animationDuration:(6+Math.random()*5)+"s"
}}>
{b}
</div>
);

}

function Confetti(){

const items=new Array(40).fill(0);

return items.map((_,i)=>
<div key={i}
className="confetti"
style={{
left:Math.random()*100+"%",
background:`hsl(${Math.random()*360},80%,60%)`,
animationDuration:(2+Math.random()*3)+"s"
}}/>
);

}

function MonthGallery(){

const months=[
"January","February","March","April","May","June",
"July","August","September","October","November","December"
];

const images=[
"https://picsum.photos/id/1011/400/300",
"https://picsum.photos/id/1025/400/300",
"https://picsum.photos/id/1035/400/300",
"https://picsum.photos/id/1041/400/300",
"https://picsum.photos/id/1050/400/300",
"https://picsum.photos/id/1062/400/300",
"https://picsum.photos/id/1074/400/300",
"https://picsum.photos/id/1084/400/300",
"https://picsum.photos/id/1080/400/300",
"https://picsum.photos/id/109/400/300",
"https://picsum.photos/id/110/400/300",
"https://picsum.photos/id/111/400/300"
];

const [index,setIndex]=React.useState(0);
const [showPopup,setShowPopup]=React.useState(false);

React.useEffect(()=>{

if(index < months.length){

const timer=setTimeout(()=>{
setIndex(prev=>prev+1);
},1000);

return ()=>clearTimeout(timer);

}else{
setShowPopup(true);
}

},[index]);

return(

<div className="container">

<Balloons/>

{index < months.length &&

<div>

<img src={images[index]} />

<div className="month">{months[index]}</div>

<div className="progress">
Month {index+1} / 12
</div>

</div>

}

{showPopup &&

<div className="popup">

<Confetti/>

<div className="popup-box">

<h2>🎉 Happy Birthday 🎂</h2>

<p>
May your life be filled with happiness,
success and wonderful memories!
</p>

<img src="https://cdn-icons-png.flaticon.com/512/3468/3468379.png"/>

<br/><br/>

<audio autoPlay>
<source src="https://www2.cs.uic.edu/~i101/SoundFiles/HappyBirthday.mid"/>
</audio>

</div>

</div>

}

</div>

);

}

function App(){
return <MonthGallery/>;
}

const root=ReactDOM.createRoot(document.getElementById("root"));
root.render(<App/>);

</script>

</body>
</html>