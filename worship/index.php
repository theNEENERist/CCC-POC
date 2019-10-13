<?php $title = "CCC - Worship Team" ?>
<?php include 'inc/preContent.php'?>

<script type="text/javascript">
   //  $(document).ready(function () {
   //      $("#txtFilter").on("keyup", function () {
   //          var search = this.value;
   //          $(".searchable").each(function () {
   //              a = this; if (a.innerText.toLowerCase().startsWith(search.toLowerCase()))
   //                  this.hidden = false
   //              else
   //                  this.hidden = true
   //          });
   //      })
   //  });

   // var selected

   // function dragOver( e ) {
   //    if ( isBefore( selected, e.target ) ) e.target.parentNode.insertBefore( selected, e.target )
   //    else e.target.parentNode.insertBefore( selected, e.target.nextSibling )
   // }

   // function dragEnd() {
   //    selected = null
   // }

   // function dragStart( e ) {
   //    e.dataTransfer.effectAllowed = "move"
   //    e.dataTransfer.setData( "text/plain", null )
   //    selected = e.target
   // }

   // function isBefore( el1, el2 ) {
   //    var cur
   //    if ( el2.parentNode === el1.parentNode ) {
   //       for ( cur = el1.previousSibling; cur; cur = cur.previousSibling ) {
   //          if (cur === el2) return true
   //       }
   //    } else return false;
   // }
</script>

<!-- <div>
   <ul>
      <li draggable="true" ondragend="dragEnd()" ondragover="dragOver(event)" ondragstart="dragStart(event)">Apples</li>
      <li draggable="true" ondragend="dragEnd()" ondragover="dragOver(event)" ondragstart="dragStart(event)">Oranges</li>
      <li draggable="true" ondragend="dragEnd()" ondragover="dragOver(event)" ondragstart="dragStart(event)">Bananas</li>
      <li draggable="true" ondragend="dragEnd()" ondragover="dragOver(event)" ondragstart="dragStart(event)">Strawberries</li>
      <li draggable="true" ondragend="dragEnd()" ondragover="dragOver(event)" ondragstart="dragStart(event)">Pineapples</li>
      <li draggable="true" ondragend="dragEnd()" ondragover="dragOver(event)" ondragstart="dragStart(event)">Plums</li>
      <li draggable="true" ondragend="dragEnd()" ondragover="dragOver(event)" ondragstart="dragStart(event)">Peaches</li>
   </ul>
</div> -->

<!-- <div id="filter">
    <label class="labels">Search: </label><input type="text" id="txtFilter">
</div>
<div class="row" id="songListContainer">
    <div class="col-md-3 songListOutter searchable">
        <a href="#" runat="server" onclick="LinkOnClick">
            <div class="songList">
                <h3>Blessed be the Name</h3>
            </div>
        </a>
    </div>
</div> -->
<div class="container">
   <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
      Date: <input type="date" name="date" id="date">
      <button type="submit" class="btn btn-primary">Login</button>
   </form>
   
   <div class="song-inputs">
      <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
         <div class="mt-3">Worship</div>
         <div class="woship-inputs ml-3">
            <input type="text" class="mt-1" name="worship-1" id="worship-1"/><br/>
            <input type="text" class="mt-1" name="worship-2" id="worship-2"/><br/>
            <input type="text" class="mt-1" name="worship-3" id="worship-3"/><br/>
            <input type="text" class="mt-1" name="worship-4" id="worship-4"/>
         </div>
         
         <div class="mt-3">Communion</div>
         <div class="communion-inputs ml-3">
            <input type="text" class="mt-1" name="communion" id="communion"/>
         </div>

         <div class="mt-3">Invitation</div>
         <div class="invitation-inputs ml-3">
            <input type="text" class="mt-1" name="invitation" id="invitation"/>
         </div>

         <div class="mt-3">Closing</div>
         <div class="closing-inputs ml-3">
            <input type="text" class="mt-1" name="closing" id="closing"/>
         </div>

         <div class="submit mt-3">
         <button type="submit" class="btn btn-primary">Choose Songs</button>
         </div>
      </form>
   </div>

   <div class="song-list"></div>

</div>

<?php
if(isset($_POST['submit']))
{

   echo "help";
   $mysqli = new mysqli($host, $user, $password, $dbname, $port, $socket)
         or die ('Could not connect to the database server' . mysqli_connect_error());
   
         $sql = "SELECT * FROM ccc.worship_set where date = '2019-09-15'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo $row["song_title"];
      echo $_POST['date'];
    }
} else {
    echo "0 results";
}
}

?>