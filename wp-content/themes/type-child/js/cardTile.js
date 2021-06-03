const cal = document.getElementById('calendar');
console.log(cal);
const tile = cal.getElementsByClassName(".calendar .card.event");
console.log(tile);
// Function to change the content of a calendar event tile
function modifyTile() {
  console.log('modified tile...');
  // const t2 = document.getElementById("t2");
  // if (t2.firstChild.nodeValue == "three") {
  //   t2.firstChild.nodeValue = "two";
  // } else {
  //   t2.firstChild.nodeValue = "three";
  // }
}

// Add event listener to table
cal.addEventListener("click", modifyTile, false);