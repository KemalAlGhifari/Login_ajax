<?php
require 'function.php';
if(isset($_SESSION["id"])){
  $id = $_SESSION["id"];
  $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id"));
}
else{
  header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Index</title>
    <script src="aset/scrippt.js"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="aset/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="aset/style.css">
  </head>
  <body id="body-game" onload="startgams()" onload="sweet()">

    <div id="container-warna">
      <h1 id="title-game"><span class="box">BOX <span class="mario">MARIO</span></h1>
        <div id="form-warna">
          <div  id="warna-kotaks"></div>
          <label id="usernamewarna" for="">Player Kemal#12345</label>
          <p class="choose">Choose Color :</p>
          <input autocomplete="on" id="choosec" type="color" name="">
          <form action="function.php" method="POST">
      <input name="btn" type="submit" class="logoust" value="Logout"></form>
      <button onclick="startGame()" id="startg">Start Game</button>
 
        </div>
    </div>

    <div id="container-game">
      
      <div id="games">
        <label style="top: 21%;" id="usernamegames" for=""></label>
        
      </div>
      <button onclick="tryagaian()" id="btn-2">Try Again</button>
      <button id="btn-23" onclick="exit()">Exit</button>
    </div>
  
    <div class="footer">
      <label class="devfooter" for="">Developed by kemal</label>
    </div>
  <script>
    document.getElementById
    document.getElementById("usernamewarna").innerHTML = "Player :" + " <?php echo $user["Fullname"]; ?>" + "#" + "<?php echo $user["id"]; ?>"
    function tryagaian(){
      myGameArea.stop()
      myGameArea.clear()
      startGame()
      document.getElementById("btn-2").style.display="none"
  document.getElementById("btn-23").style.display="none"
      
      }
      
      function exit(){
        location.reload(  )
      }
  
  var myGamePiece;
var myObstacles = [];
var myScore;

function startGame() {
  var warnss = document.getElementById("choosec").value
  document.getElementById("usernamegames").style.color = warnss
  document.getElementById("usernamegames").innerHTML = "Player :" + " <?php echo $user["Fullname"]; ?>" + "#" + "<?php echo $user["id"]; ?>"
  document.getElementById("container-game").style.display="block"
  document.getElementById("container-warna").style.display="none"
    myGamePiece = new component(40, 40, document.getElementById("choosec").value, 10, 120);
    myScore = new component("30px", "mono", "black", 800, 40, "text");
    myGameArea.start();
    myObstacles = [];
}

var myGameArea = {
    canvas : document.createElement("canvas"),
    start : function() {
        this.canvas.width = 1000;
        this.canvas.height = 500;
        this.context = this.canvas.getContext("2d");
        document.getElementById("games").insertBefore(this.canvas, document.getElementById("games").childNodes[0]);
        this.frameNo = 0;
        this.interval = setInterval(updateGameArea, 20);
        window.addEventListener('keydown', function (e) {
      myGameArea.keys = (myGameArea.keys || []);
      myGameArea.keys[e.keyCode] = true;
    })
    window.addEventListener('keyup', function (e) {
      myGameArea.keys[e.keyCode] = false;
    })
        },
    clear : function() {
        this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
    },
    stop : function() {
        clearInterval(this.interval);
    }
}

function component(width, height, color, x, y, type) {
    this.type = type;
    this.width = width;
    this.height = height;
    this.speedX = 0;
    this.speedY = 0;    
    this.x = x;
    this.y = y;    
    this.update = function() {
        ctx = myGameArea.context;
        if (this.type == "text") {
            ctx.font = this.width + " " + this.height;
            ctx.fillStyle = color;
            ctx.fillText(this.text, this.x, this.y);
        } else {
            ctx.fillStyle = color;
            ctx.fillRect(this.x, this.y, this.width, this.height);
        }
    }
    this.newPos = function() {
        this.x += this.speedX;
        this.y += this.speedY;        
    }
    this.crashWith = function(otherobj) {
        var myleft = this.x;
        var myright = this.x + (this.width);
        var mytop = this.y;
        var mybottom = this.y + (this.height);
        var otherleft = otherobj.x;
        var otherright = otherobj.x + (otherobj.width);
        var othertop = otherobj.y;
        var otherbottom = otherobj.y + (otherobj.height);
        var crash = true;
        if ((mybottom < othertop) || (mytop > otherbottom) || (myright < otherleft) || (myleft > otherright)) {
            crash = false;
        }
        return crash;
    }
}

function updateGameArea() {
    var x, height, gap, minHeight, maxHeight, minGap, maxGap;
    for (i = 0; i < myObstacles.length; i += 1) {
        if (myGamePiece.crashWith(myObstacles[i])) {
            document.getElementById("btn-2").style.display="block"
            document.getElementById("btn-23").style.display="block"

            myGameArea.stop();
            return;
        } 
    }
    myGameArea.clear();
    myGameArea.frameNo += 1;
    if (myGameArea.frameNo == 1 || everyinterval(60)) {
        x = myGameArea.canvas.width;
        minHeight = 30;
        maxHeight = 100;
        height = Math.floor(Math.random()*(maxHeight-minHeight+1)+minHeight);
        minGap = 100;
        maxGap = 100;
        gap = Math.floor(Math.random()*(maxGap-minGap+1)+minGap);
        myObstacles.push(new component(20, height, "grey", x, 0));
        myObstacles.push(new component(20, x - height - gap, "grey", x, height + gap));
    }
    for (i = 0; i < myObstacles.length; i += 1) {
        myObstacles[i].speedX = -4;
        myObstacles[i].newPos();
        myObstacles[i].update();
    }
    myScore.text="SCORE: " + myGameArea.frameNo;
    myScore.update();
    myGamePiece.newPos();    
    myGamePiece.update();
    myGamePiece.speedX = 0;
    myGamePiece.speedY = 0;    
    if (myGameArea.keys && myGameArea.keys[37]) {myGamePiece.speedX = -1; }
    if (myGameArea.keys && myGameArea.keys[39]) {myGamePiece.speedX = 1; }
    if (myGameArea.keys && myGameArea.keys[38]) {myGamePiece.speedY = -1; }
    if (myGameArea.keys && myGameArea.keys[40]) {myGamePiece.speedY = 1; }
}

function everyinterval(n) {
    if ((myGameArea.frameNo / n) % 1 == 0) {return true;}
    return false;
}


function clearmove() {
    myGamePiece.speedX = 0; 
    myGamePiece.speedY = 0; 
}
</script>
  </body>
</html>