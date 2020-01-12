public function paginationSearch16($total_pages,$page,$search,$criteria){
$adjacents = 3;
  $plimit = 1;
  $prev = $page - 1;
  $next = $page + 1;
  $lastpage = ceil($total_pages/$plimit);
  $lpm1 = $lastpage - 1;
  $pagination = "";

  if($lastpage >= 1)
  {
    $pagination .= '<div class=\'pagination\'>';
    //previous button
    if ($page > 1)
      $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPendingV=Submit&Verpage='.$prev.'\'>&laquo; previous</a>';
    else
      $pagination.= '<span id="spanD" span class=\'disabled\'>&laquo previous</span>';
    //pages
    if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
    {
      for ($counter = 1; $counter <= $lastpage; $counter++)
      {
        if ($counter == $page)
          $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
        else
          $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPendingV=Submit&Verpage='.$counter.'\'>'.$counter.'</a>';
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
            $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
          else
            $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPendingV=Submit&Verpage='.$counter.'\'>'.$counter.'</a>';
        }
        $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPendingV=Submit&Verpage='.$lastpage.'\'>'.$lastpage.'</a>';
      }
      //in middle; hide some front and some back
      elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
      {
        $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPendingV=Submit&Verpage=1\'>1</a>';
        $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
          else
            $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPendingV=Submit&Verpage='.$counter.'\'>'.$counter.'</a>';
        }
        $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPendingV=Submit&Verpage='.$lastpage.'\'>'.$lastpage.'</a>';
      }
      //close to end; only hide early pages
      else
      {
        $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPendingV=Submit&Verpage=1.\'>1</a>';
        // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'verificationAdmin.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPendingV=Submit&Verpage==2\'>2</a>';
        $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
        for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
          else
            $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPendingV=Submit&Verpage='.$counter.'\'>'.$counter.'</a>';
        }
      }
    }
    if ($page < $counter - 1)
      $pagination.= '<a id="pageN" id"page" href=\'verificationAdmin.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPendingV=Submit&Verpage='.$next.'\'>next &raquo;</a>';
    else
      $pagination.=  '<span id="spanD" class=\'disabled\'>next &raquo;</span>';
    $pagination.= "</div>\n";
  }
  echo $pagination;
}

public function paginationSearch17($total_pages,$page,$dateFrom,$dateTo){
$adjacents = 3;
  $plimit = 1;
  $prev = $page - 1;
  $next = $page + 1;
  $lastpage = ceil($total_pages/$plimit);
  $lpm1 = $lastpage - 1;
  $pagination = "";

  if($lastpage >= 1)
  {
    $pagination .= '<div class=\'pagination\'>';
    //previous button
    if ($page > 1)
      $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPendingV=Submit&Verpage='.$prev.'\'>&laquo; previous</a>';
    else
      $pagination.= '<span id="spanD" span class=\'disabled\'>&laquo previous</span>';
    //pages
    if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
    {
      for ($counter = 1; $counter <= $lastpage; $counter++)
      {
        if ($counter == $page)
          $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
        else
          $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPendingV=Submit&Verpage='.$counter.'\'>'.$counter.'</a>';
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
            $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
          else
            $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPendingV=Submit&Verpage='.$counter.'\'>'.$counter.'</a>';
        }
        $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPendingV=Submit&Verpage='.$lastpage.'\'>'.$lastpage.'</a>';
      }
      //in middle; hide some front and some back
      elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
      {
        $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPendingV=Submit&Verpage=1\'>1</a>';
        $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
          else
            $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPendingV=Submit&Verpage='.$counter.'\'>'.$counter.'</a>';
        }
        $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPendingV=Submit&Verpage='.$lastpage.'\'>'.$lastpage.'</a>';
      }
      //close to end; only hide early pages
      else
      {
        $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPendingV=Submit&Verpage=1.\'>1</a>';
        // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'verificationAdmin.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPendingV=Submit&Verpage==2\'>2</a>';
        $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
        for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
          else
            $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPendingV=Submit&Verpage='.$counter.'\'>'.$counter.'</a>';
        }
      }
    }
    if ($page < $counter - 1)
      $pagination.= '<a id="pageN" id"page" href=\'verificationAdmin.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPendingV=Submit&Verpage='.$next.'\'>next &raquo;</a>';
    else
      $pagination.=  '<span id="spanD" class=\'disabled\'>next &raquo;</span>';
    $pagination.= "</div>\n";
  }
  echo $pagination;
}

public function paginationSearch18($total_pages,$page,$search,$criteria,$dateTo,$dateFrom){
  $adjacents = 3;
    $plimit = 1;
    $prev = $page - 1;
    $next = $page + 1;
    $lastpage = ceil($total_pages/$plimit);
    $lpm1 = $lastpage - 1;
    $pagination = "";

    if($lastpage >= 1)
    {
      $pagination .= '<div class=\'pagination\'>';
      //previous button
      if ($page > 1)
        $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPendingV=Submit&tab=view&Verpage='.$prev.'\'>&laquo; previous</a>';
      else
        $pagination.= '<span id="spanD" span class=\'disabled\'>&laquo previous</span>';
      //pages
      if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
      {
        for ($counter = 1; $counter <= $lastpage; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
          else
            $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPendingV=Submit&tab=view&Verpage='.$counter.'\'>'.$counter.'</a>';
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
              $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
            else
              $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPendingV=Submit&tab=view&Verpage='.$counter.'\'>'.$counter.'</a>';
          }
          $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
          $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPendingV=Submit&tab=view&Verpage='.$lastpage.'\'>'.$lastpage.'</a>';
        }
        //in middle; hide some front and some back
        elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
        {
          $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPendingV=Submit&tab=view&Verpage=1\'>1</a>';
          $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
          for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
          {
            if ($counter == $page)
              $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
            else
              $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPendingV=Submit&tab=view&Verpage='.$counter.'\'>'.$counter.'</a>';
          }
          $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
          $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPendingV=Submit&tab=view&Verpage='.$lastpage.'\'>'.$lastpage.'</a>';
        }
        //close to end; only hide early pages
        else
        {
          $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPendingV=Submit&tab=view&Verpage=1.\'>1</a>';
          // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'verificationAdmin.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPendingV=Submit&tab=view&Verpage==2\'>2</a>';
          $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
          for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
          {
            if ($counter == $page)
              $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
            else
              $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPendingV=Submit&tab=view&Verpage='.$counter.'\'>'.$counter.'</a>';
          }
        }
      }
      if ($page < $counter - 1)
        $pagination.= '<a id="pageN" id"page" href=\'verificationAdmin.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPendingV=Submit&tab=view&Verpage='.$next.'\'>next &raquo;</a>';
      else
        $pagination.=  '<span id="spanD" class=\'disabled\'>next &raquo;</span>';
      $pagination.= "</div>\n";
    }
    echo $pagination;
}
