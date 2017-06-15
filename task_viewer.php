<?  // PHP here, no need to fiddle
    // Page Variables ignore
    $title = "Task Viewer";
    $hide_footer = false;
    $show_minimal_footer = false;
    $is_mission_control = true;
    $page = "dashboard";
    // User Variables ignore
    $loggedin = TRUE; $is_creator = TRUE;
    include("./templates/header.php");
?>

<link rel="stylesheet" href="./assets/sass/pages/task_viewer.scss"/>

<h1>Status</h1>
<div id="open">
  <div id="fillColorOpenProgressBar"></div>
</div>
<div id="begun">
  <div id="fillColorBegunProgressBar"></div>
</div>
<div id="review">
  <div id="fillColorReviewProgressBar"></div>
</div>
<div id="completed">
  <div id="fillColorCompletedProgressBar"></div>
</div>
<h4>Contribution Points</h4>

<br>

<button onclick="progressBarAnimation('open')">Open</button>
<button onclick="progressBarAnimation('begun')">Begun</button>
<button onclick="progressBarAnimation('review')">In Review</button>
<button onclick="progressBarAnimation('completed')">Completed</button>

<script>
function progressBarAnimation(status) {
  console.log(status);
  updateProgressBar(status);
}
function updateProgressBar(status){
  //var elem = document.getElementById("fillColorProgressBar");
  var elem = document.getElementById(status).children[0];
  console.log(document.getElementById(status).children[0].style.width);

  elem.innerHTML = status.charAt(0).toUpperCase() + status.slice(1);
  var width =  elem.style.width.slice(0, -1)
  width < 100 ? incrementBar(): decrementBar();


  function incrementBar(){
    console.log(width);
    if (width++ < 100) {
      elem.style.width = width + '%';
      setTimeout(incrementBar, 8);
    }
  };
  function decrementBar(){
    console.log(width);
    if (width-- !== 0) {
      elem.style.width = width + '%';
      setTimeout(decrementBar,  8);
    }
  };

}
</script>


<? include("./templates/footer.php"); ?>
