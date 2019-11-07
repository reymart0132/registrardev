<?php
 if(empty($_GET['tab'])){
    echo "active";
    }elseif($_GET['tab']=="view"){
    echo "active";
}
?>


<?php if(!empty($_GET['tab'])){if($_GET['tab']=="printed"){echo "active2";}}?>
