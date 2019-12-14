<?php
public function paginationSearch($total_pages,$page){
  $adjacents = 3;
    $plimit = 1;
    $prev = $page - 1;
    $next = $page + 1;
    $lastpage = ceil($total_pages/$plimit);
    $lpm1 = $lastpage - 1;
    $pagination = "";
    if($lastpage >= 1)
    {
      $pagination .= '<div style = "padding-top:10px;"class=\'pagination\'>';
      //previous button
      if ($page > 1)
        $pagination.= '<a style="background-color:white; border: 1px solid #DC65A1;color:#DC65A1; padding:3px; text-decoration: none;" href=\'pending.php?search='.$search.'&submitPending=Submit#pending&tab=view&submit=submitPending&criteria='.$criteria.'&Ppage='.$prev.'\'>&laquo; previous</a>';
      else
        $pagination.= '<span style="background-color:white; border: 1px solid #DC65A1;color:#DC65A1; padding-left:5px; padding-right:7px;padding-top:3px;text-decoration: none;" span class=\'disabled\'>&laquo previous</span>';
      //pages
      if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
      {
        for ($counter = 1; $counter <= $lastpage; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<span style="background-color:#DC65A1;color:white; border: 1px solid #DC65A1; padding-left:10px;padding-right:10px; text-decoration: none; padding-top:2px;" class=\'current\'>'.$counter.'</span>';
          else
            $pagination.= '<a style="background-color:white; border: 1px solid #DC65A1; color:#DC65A1; padding:3px; text-decoration: none;" href=\'pending.php?search='.$search.'&submitPending=Submit#pending&tab=view&submit=submitPending&criteria='.$criteria.'&Ppage'.$counter.'\'>'.$counter.'</a>';
        }
      }
      elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
      {
        //close to beginning; only hide later pages
        if($page < 1 + ($adjacents * 2))
        {
          for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
          {
            if ($counter == $page)
              $pagination.= '<span style="background-color:#DC65A1;color:white; border: 1px solid #DC65A1; padding-left:10px;padding-right:10px; text-decoration: none; padding-top:2px;" class=\'current\'>'.$counter.'</span>';
            else
              $pagination.= '<a style="background-color:white; border: 1px solid #DC65A1; color:#DC65A1; padding-left:13px;padding-right:13px;text-decoration: none; padding-top:2px;" href=\'pending.php?search='.$search.'&submitPending=Submit#pending&tab=view&submit=submitPending&criteria='.$criteria.'&Ppage'.$counter.'\'>'.$counter.'</a>';
          }
          $pagination .= '<span style="padding-top:10px;"class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
          $pagination.= '<a style="background-color:white; border: 1px solid #DC65A1; color:#DC65A1;padding-left:10px;padding-right:10px; text-decoration: none; padding-top:2px;"  href=\'pending.php?search='.$search.'&submitPending=Submit#pending&tab=view&submit=submitPending&criteria='.$criteria.'&Ppage'.$lastpage.'\'>'.$lastpage.'</a>';
        }
        //in middle; hide some front and some back
        elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
        {
          $pagination.= '<a style="background-color:white; border: 1px solid #DC65A1; padding-left:12px; color:#DC65A1;padding-right:12px;  text-decoration: none; padding-top:2px;" href=\'pending.php?search='.$search.'&submitPending=Submit#pending&tab=view&submit=submitPending&criteria='.$criteria.'&Ppage1\'>1</a>';
          $pagination .= '<span style="padding-top:10px;" class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
          for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
          {
            if ($counter == $page)
              $pagination.= '<span style="background-color:#DC65A1;color:white; border: 1px solid #DC65A1; padding-left:10px;padding-right:10px; text-decoration: none; padding-top:2px;"class=\'current\'>'.$counter.'</span>';
            else
              $pagination.= '<a style="background-color:white; border: 1px solid #DC65A1; color:#DC65A1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;"  href=\'pending.php?search='.$search.'&submitPending=Submit#pending&tab=view&submit=submitPending&criteria='.$criteria.'&Ppage'.$counter.'\'>'.$counter.'</a>';
          }
          $pagination .= '<span style = "padding-top:10px;"class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
          $pagination.= '<a style="background-color:white; border: 1px solid #DC65A1; color:#DC65A1; padding-left:10px;padding-right:10px; text-decoration: none; padding-top:2px;"href=\'pending.php?search='.$search.'&submitPending=Submit#pending&tab=view&submit=submitPending&criteria='.$criteria.'&Ppage'.$lastpage.'\'>'.$lastpage.'</a>';
        }
        //close to end; only hide early pages
        else
        {
          $pagination.= '<a style="background-color:white; color:#DC65A1; border: 1px solid #DC65A1; color: #DC65A1; padding-left:13px;padding-right:13px; text-decoration: none; padding-top:2px;" href=\'pending.php?search='.$search.'&submitPending=Submit#pending&tab=view&submit=submitPending&criteria='.$criteria.'&Ppage1.\'>1</a>';
          // $pagination.= '<a style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'pending.php?search='.$search.'&submitPending=Submit#pending&tab=view&submit=submitPending&criteria='.$criteria.'&Ppage2\'>2</a>';
          $pagination .= '<span style="padding-top:10px;" class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
          for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
          {
            if ($counter == $page)
              $pagination.= '<span style="background-color:#DC65A1;color:white; border: 1px solid #DC65A1; padding:3px; text-decoration: none; padding-left:9px;padding-right:9px;"class=\'current\'>'.$counter.'</span>';
            else
              $pagination.= '<a style="background-color:white; color:#DC65A1; border: 1px solid #DC65A1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'pending.php?search='.$search.'&submitPending=Submit#pending&tab=view&submit=submitPending&criteria='.$criteria.'&Ppage'.$counter.'\'>'.$counter.'</a>';
          }
        }
      }
      if ($page < $counter - 1)
        $pagination.= '<a style="background-color:white; border: 1px solid #DC65A1; color:#DC65A1;padding-right:15px; padding-left:15px; padding-top:3px;text-decoration: none;" href=\'pending.php?search='.$search.'&submitPending=Submit#pending&tab=view&submit=submitPending&criteria='.$criteria.'&Ppage'.$next.'\'>next &raquo;</a>';
      else
        $pagination.=  '<span style="background-color:white; border: 1px solid #DC65A1; color:#DC65A1;padding-right:10px; padding-left:10px; padding-top:2.5px;text-decoration: none;"class=\'disabled\'>next &raquo;</span>';
      $pagination.= "</div>\n";
    }
    echo $pagination;
}
 ?>
