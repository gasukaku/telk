function makeRoom(){
  alert();
  var text = document.getElementById("RoomName").value;
  var href = document.getElementById("href");
  href.href = "https://telk.glitch.me/chat.php?room="+text;
  href.click();
}