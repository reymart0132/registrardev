<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
require_once 'config.php';

class paginationSearch{

public function paginationSearch1($total_pages,$page,$search,$criteria){
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
      $pagination.= '<a id="page" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPending=Submit&Ppage='.$prev.'\'>&laquo; previous</a>';
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
          $pagination.= '<a id="page" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPending=Submit&Ppage='.$counter.'\'>'.$counter.'</a>';
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
            $pagination.= '<a id="page" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPending=Submit&Ppage='.$counter.'\'>'.$counter.'</a>';
        }
        $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        $pagination.= '<a id="page" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPending=Submit&Ppage='.$lastpage.'\'>'.$lastpage.'</a>';
      }
      //in middle; hide some front and some back
      elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
      {
        $pagination.= '<a id="page" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPending=Submit&Ppage=1\'>1</a>';
        $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
          else
            $pagination.= '<a id="page" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPending=Submit&Ppage='.$counter.'\'>'.$counter.'</a>';
        }
        $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        $pagination.= '<a id="page" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPending=Submit&Ppage='.$lastpage.'\'>'.$lastpage.'</a>';
      }
      //close to end; only hide early pages
      else
      {
        $pagination.= '<a id="page" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPending=Submit&Ppage=1.\'>1</a>';
        // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPending=Submit&Ppage==2\'>2</a>';
        $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
        for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
          else
            $pagination.= '<a id="page" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPending=Submit&Ppage='.$counter.'\'>'.$counter.'</a>';
        }
      }
    }
    if ($page < $counter - 1)
      $pagination.= '<a id="pageN" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPending=Submit&Ppage='.$next.'\'>next &raquo;</a>';
    else
      $pagination.=  '<span id="spanD" class=\'disabled\'>next &raquo;</span>';
    $pagination.= "</div>\n";
  }
  echo $pagination;
}

public function paginationSearch2($total_pages,$page,$dateFrom,$dateTo){
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
      $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPending=Submit&Ppage='.$prev.'\'>&laquo; previous</a>';
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
          $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPending=Submit&Ppage='.$counter.'\'>'.$counter.'</a>';
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
            $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPending=Submit&Ppage='.$counter.'\'>'.$counter.'</a>';
        }
        $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPending=Submit&Ppage='.$lastpage.'\'>'.$lastpage.'</a>';
      }
      //in middle; hide some front and some back
      elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
      {
        $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPending=Submit&Ppage=1\'>1</a>';
        $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
          else
            $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPending=Submit&Ppage='.$counter.'\'>'.$counter.'</a>';
        }
        $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPending=Submit&Ppage='.$lastpage.'\'>'.$lastpage.'</a>';
      }
      //close to end; only hide early pages
      else
      {
        $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPending=Submit&Ppage=1.\'>1</a>';
        // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPending=Submit&Ppage==2\'>2</a>';
        $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
        for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
          else
            $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPending=Submit&Ppage='.$counter.'\'>'.$counter.'</a>';
        }
      }
    }
    if ($page < $counter - 1)
      $pagination.= '<a id="pageN" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPending=Submit&Ppage='.$next.'\'>next &raquo;</a>';
    else
      $pagination.=  '<span id="spanD" class=\'disabled\'>next &raquo;</span>';
    $pagination.= "</div>\n";
  }
  echo $pagination;
}

public function paginationSearch3($total_pages,$page,$search,$criteria,$dateTo,$dateFrom){
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
        $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPending=Submit&tab=view&Ppage='.$prev.'\'>&laquo; previous</a>';
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
            $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPending=Submit&tab=view&Ppage='.$counter.'\'>'.$counter.'</a>';
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
              $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPending=Submit&tab=view&Ppage='.$counter.'\'>'.$counter.'</a>';
          }
          $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
          $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPending=Submit&tab=view&Ppage='.$lastpage.'\'>'.$lastpage.'</a>';
        }
        //in middle; hide some front and some back
        elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
        {
          $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPending=Submit&tab=view&Ppage=1\'>1</a>';
          $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
          for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
          {
            if ($counter == $page)
              $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
            else
              $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPending=Submit&tab=view&Ppage='.$counter.'\'>'.$counter.'</a>';
          }
          $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
          $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPending=Submit&tab=view&Ppage='.$lastpage.'\'>'.$lastpage.'</a>';
        }
        //close to end; only hide early pages
        else
        {
          $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPending=Submit&tab=view&Ppage=1.\'>1</a>';
          // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPending=Submit&tab=view&Ppage==2\'>2</a>';
          $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
          for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
          {
            if ($counter == $page)
              $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
            else
              $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPending=Submit&tab=view&Ppage='.$counter.'\'>'.$counter.'</a>';
          }
        }
      }
      if ($page < $counter - 1)
        $pagination.= '<a id="pageN" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPending=Submit&tab=view&Ppage='.$next.'\'>next &raquo;</a>';
      else
        $pagination.=  '<span id="spanD" class=\'disabled\'>next &raquo;</span>';
      $pagination.= "</div>\n";
    }
    echo $pagination;
}


public function paginationSearch4($total_pages,$page,$search,$criteria){
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
      $pagination.= '<a id="page" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=printed&submitPrinted=Submit&PRpage='.$prev.'\'>&laquo; previous</a>';
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
          $pagination.= '<a id="page" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=printed&submitPrinted=Submit&PRpage='.$counter.'\'>'.$counter.'</a>';
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
            $pagination.= '<a id="page" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=printed&submitPrinted=Submit&PRpage='.$counter.'\'>'.$counter.'</a>';
        }
        $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        $pagination.= '<a id="page" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=printed&submitPrinted=Submit&PRpage='.$lastpage.'\'>'.$lastpage.'</a>';
      }
      //in middle; hide some front and some back
      elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
      {
        $pagination.= '<a id="page" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=printed&submitPrinted=Submit&PRpage=1\'>1</a>';
        $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
          else
            $pagination.= '<a id="page" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=printed&submitPrinted=Submit&PRpage='.$counter.'\'>'.$counter.'</a>';
        }
        $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        $pagination.= '<a id="page" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=printed&submitPrinted=Submit&PRpage='.$lastpage.'\'>'.$lastpage.'</a>';
      }
      //close to end; only hide early pages
      else
      {
        $pagination.= '<a id="page" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=printed&submitPrinted=Submit&PRpage=1.\'>1</a>';
        // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=printed&submitPrinted=Submit&PRpage==2\'>2</a>';
        $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
        for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
          else
            $pagination.= '<a id="page" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=printed&submitPrinted=Submit&PRpage='.$counter.'\'>'.$counter.'</a>';
        }
      }
    }
    if ($page < $counter - 1)
      $pagination.= '<a id="pageN" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=printed&submitPrinted=Submit&PRpage='.$next.'\'>next &raquo;</a>';
    else
      $pagination.=  '<span id="spanD" class=\'disabled\'>next &raquo;</span>';
    $pagination.= "</div>\n";
  }
  echo $pagination;
}

public function paginationSearch5($total_pages,$page,$dateFrom,$dateTo){
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
      $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPrinted=Submit&PRpage='.$prev.'\'>&laquo; previous</a>';
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
          $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPrinted=Submit&PRpage='.$counter.'\'>'.$counter.'</a>';
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
            $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPrinted=Submit&PRpage='.$counter.'\'>'.$counter.'</a>';
        }
        $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPrinted=Submit&PRpage='.$lastpage.'\'>'.$lastpage.'</a>';
      }
      //in middle; hide some front and some back
      elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
      {
        $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPrinted=Submit&PRpage=1\'>1</a>';
        $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
          else
            $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPrinted=Submit&PRpage='.$counter.'\'>'.$counter.'</a>';
        }
        $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPrinted=Submit&PRpage='.$lastpage.'\'>'.$lastpage.'</a>';
      }
      //close to end; only hide early pages
      else
      {
        $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPrinted=Submit&PRpage=1.\'>1</a>';
        // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPrinted=Submit&PRpage==2\'>2</a>';
        $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
        for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
          else
            $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPrinted=Submit&PRpage='.$counter.'\'>'.$counter.'</a>';
        }
      }
    }
    if ($page < $counter - 1)
      $pagination.= '<a id="pageN" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPrinted=Submit&PRpage='.$next.'\'>next &raquo;</a>';
    else
      $pagination.=  '<span id="spanD" class=\'disabled\'>next &raquo;</span>';
    $pagination.= "</div>\n";
  }
  echo $pagination;
}

public function paginationSearch6($total_pages,$page,$search,$criteria,$dateTo,$dateFrom){
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
        $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPrinted=Submit&tab=printed&PRpage='.$prev.'\'>&laquo; previous</a>';
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
            $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPrinted=Submit&tab=printed&PRpage='.$counter.'\'>'.$counter.'</a>';
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
              $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPrinted=Submit&tab=printed&PRpage='.$counter.'\'>'.$counter.'</a>';
          }
          $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
          $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPrinted=Submit&tab=printed&PRpage='.$lastpage.'\'>'.$lastpage.'</a>';
        }
        //in middle; hide some front and some back
        elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
        {
          $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPrinted=Submit&tab=printed&PRpage=1\'>1</a>';
          $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
          for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
          {
            if ($counter == $page)
              $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
            else
              $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPrinted=Submit&tab=printed&PRpage='.$counter.'\'>'.$counter.'</a>';
          }
          $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
          $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPrinted=Submit&tab=printed&PRpage='.$lastpage.'\'>'.$lastpage.'</a>';
        }
        //close to end; only hide early pages
        else
        {
          $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPrinted=Submit&tab=printed&PRpage=1.\'>1</a>';
          // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPrinted=Submit&tab=printed&PRpage==2\'>2</a>';
          $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
          for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
          {
            if ($counter == $page)
              $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
            else
              $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPrinted=Submit&tab=printed&PRpage='.$counter.'\'>'.$counter.'</a>';
          }
        }
      }
      if ($page < $counter - 1)
        $pagination.= '<a id="pageN" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPrinted=Submit&tab=printed&PRpage='.$next.'\'>next &raquo;</a>';
      else
        $pagination.=  '<span id="spanD" class=\'disabled\'>next &raquo;</span>';
      $pagination.= "</div>\n";
    }
    echo $pagination;
}

public function paginationSearch7($total_pages,$page,$search,$criteria){
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
      $pagination.= '<a id="page" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=forrelease2&submitVerified=Submit&V1page='.$prev.'\'>&laquo; previous</a>';
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
          $pagination.= '<a id="page" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=forrelease2&submitVerified=Submit&V1page='.$counter.'\'>'.$counter.'</a>';
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
            $pagination.= '<a id="page" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=forrelease2&submitVerified=Submit&V1page='.$counter.'\'>'.$counter.'</a>';
        }
        $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        $pagination.= '<a id="page" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=forrelease2&submitVerified=Submit&V1page='.$lastpage.'\'>'.$lastpage.'</a>';
      }
      //in middle; hide some front and some back
      elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
      {
        $pagination.= '<a id="page" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=forrelease2&submitVerified=Submit&V1page=1\'>1</a>';
        $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
          else
            $pagination.= '<a id="page" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=forrelease2&submitVerified=Submit&V1page='.$counter.'\'>'.$counter.'</a>';
        }
        $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        $pagination.= '<a id="page" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=forrelease2&submitVerified=Submit&V1page='.$lastpage.'\'>'.$lastpage.'</a>';
      }
      //close to end; only hide early pages
      else
      {
        $pagination.= '<a id="page" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=forrelease2&submitVerified=Submit&V1page=1.\'>1</a>';
        // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=forrelease2&submitVerified=Submit&V1page==2\'>2</a>';
        $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
        for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
          else
            $pagination.= '<a id="page" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=forrelease2&submitVerified=Submit&V1page='.$counter.'\'>'.$counter.'</a>';
        }
      }
    }
    if ($page < $counter - 1)
      $pagination.= '<a id="pageN" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=forrelease2&submitVerified=Submit&V1page='.$next.'\'>next &raquo;</a>';
    else
      $pagination.=  '<span id="spanD" class=\'disabled\'>next &raquo;</span>';
    $pagination.= "</div>\n";
  }
  echo $pagination;
}

public function paginationSearch8($total_pages,$page,$dateFrom,$dateTo){
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
      $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerified=Submit&V1page='.$prev.'\'>&laquo; previous</a>';
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
          $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerified=Submit&V1page='.$counter.'\'>'.$counter.'</a>';
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
            $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerified=Submit&V1page='.$counter.'\'>'.$counter.'</a>';
        }
        $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerified=Submit&V1page='.$lastpage.'\'>'.$lastpage.'</a>';
      }
      //in middle; hide some front and some back
      elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
      {
        $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerified=Submit&V1page=1\'>1</a>';
        $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
          else
            $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerified=Submit&V1page='.$counter.'\'>'.$counter.'</a>';
        }
        $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerified=Submit&V1page='.$lastpage.'\'>'.$lastpage.'</a>';
      }
      //close to end; only hide early pages
      else
      {
        $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerified=Submit&V1page=1.\'>1</a>';
        // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerified=Submit&V1page==2\'>2</a>';
        $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
        for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
          else
            $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerified=Submit&V1page='.$counter.'\'>'.$counter.'</a>';
        }
      }
    }
    if ($page < $counter - 1)
      $pagination.= '<a id="pageN" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerified=Submit&V1page='.$next.'\'>next &raquo;</a>';
    else
      $pagination.=  '<span id="spanD" class=\'disabled\'>next &raquo;</span>';
    $pagination.= "</div>\n";
  }
  echo $pagination;
}

public function paginationSearch9($total_pages,$page,$search,$criteria,$dateTo,$dateFrom){
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
        $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerified=Submit&tab=forrelease2&V1page='.$prev.'\'>&laquo; previous</a>';
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
            $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerified=Submit&tab=forrelease2&V1page='.$counter.'\'>'.$counter.'</a>';
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
              $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerified=Submit&tab=forrelease2&V1page='.$counter.'\'>'.$counter.'</a>';
          }
          $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
          $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerified=Submit&tab=forrelease2&V1page='.$lastpage.'\'>'.$lastpage.'</a>';
        }
        //in middle; hide some front and some back
        elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
        {
          $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerified=Submit&tab=forrelease2&V1page=1\'>1</a>';
          $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
          for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
          {
            if ($counter == $page)
              $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
            else
              $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerified=Submit&tab=forrelease2&V1page='.$counter.'\'>'.$counter.'</a>';
          }
          $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
          $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerified=Submit&tab=forrelease2&V1page='.$lastpage.'\'>'.$lastpage.'</a>';
        }
        //close to end; only hide early pages
        else
        {
          $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerified=Submit&tab=forrelease2&V1page=1.\'>1</a>';
          // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerified=Submit&tab=forrelease2&V1page==2\'>2</a>';
          $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
          for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
          {
            if ($counter == $page)
              $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
            else
              $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerified=Submit&tab=forrelease2&V1page='.$counter.'\'>'.$counter.'</a>';
          }
        }
      }
      if ($page < $counter - 1)
        $pagination.= '<a id="pageN" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerified=Submit&tab=forrelease2&V1page='.$next.'\'>next &raquo;</a>';
      else
        $pagination.=  '<span id="spanD" class=\'disabled\'>next &raquo;</span>';
      $pagination.= "</div>\n";
    }
    echo $pagination;
}

public function paginationSearch13($total_pages,$page,$search,$criteria){
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
      $pagination.= '<a id="page"  href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=released&submitReleased=Submit&Rpage='.$prev.'\'>&laquo; previous</a>';
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
          $pagination.= '<a id="page" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=released&submitReleased=Submit&Rpage='.$counter.'\'>'.$counter.'</a>';
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
            $pagination.= '<a id="page"  href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=released&submitReleased=Submit&Rpage='.$counter.'\'>'.$counter.'</a>';
        }
        $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        $pagination.= '<a id="page"  href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=released&submitReleased=Submit&Rpage='.$lastpage.'\'>'.$lastpage.'</a>';
      }
      //in middle; hide some front and some back
      elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
      {
        $pagination.= '<a id="page"  href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=released&submitReleased=Submit&Rpage=1\'>1</a>';
        $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
          else
            $pagination.= '<a id="page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=released&submitReleased=Submit&Rpage='.$counter.'\'>'.$counter.'</a>';
        }
        $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        $pagination.= '<a id="page" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=released&submitReleased=Submit&Rpage='.$lastpage.'\'>'.$lastpage.'</a>';
      }
      //close to end; only hide early pages
      else
      {
        $pagination.= '<a id="page"  href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=released&submitReleased=Submit&Rpage=1.\'>1</a>';
        // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=released&submitReleased=Submit&Rpage==2\'>2</a>';
        $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
        for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
          else
            $pagination.= '<a id="page"  href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=released&submitReleased=Submit&Rpage='.$counter.'\'>'.$counter.'</a>';
        }
      }
    }
    if ($page < $counter - 1)
      $pagination.= '<a id="pageN" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=released&submitReleased=Submit&Rpage='.$next.'\'>next &raquo;</a>';
    else
      $pagination.=  '<span id="spanD" class=\'disabled\'>next &raquo;</span>';
    $pagination.= "</div>\n";
  }
  echo $pagination;
}

public function paginationSearch14($total_pages,$page,$dateFrom,$dateTo){
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
      $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitReleased=Submit&Rpage='.$prev.'\'>&laquo; previous</a>';
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
          $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitReleased=Submit&Rpage='.$counter.'\'>'.$counter.'</a>';
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
            $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitReleased=Submit&Rpage='.$counter.'\'>'.$counter.'</a>';
        }
        $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitReleased=Submit&Rpage='.$lastpage.'\'>'.$lastpage.'</a>';
      }
      //in middle; hide some front and some back
      elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
      {
        $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitReleased=Submit&Rpage=1\'>1</a>';
        $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
          else
            $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitReleased=Submit&Rpage='.$counter.'\'>'.$counter.'</a>';
        }
        $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitReleased=Submit&Rpage='.$lastpage.'\'>'.$lastpage.'</a>';
      }
      //close to end; only hide early pages
      else
      {
        $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitReleased=Submit&Rpage=1.\'>1</a>';
        // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitReleased=Submit&Rpage==2\'>2</a>';
        $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
        for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
          else
            $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitReleased=Submit&Rpage='.$counter.'\'>'.$counter.'</a>';
        }
      }
    }
    if ($page < $counter - 1)
      $pagination.= '<a id="pageN" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitReleased=Submit&Rpage='.$next.'\'>next &raquo;</a>';
    else
      $pagination.=  '<span id="spanD" class=\'disabled\'>next &raquo;</span>';
    $pagination.= "</div>\n";
  }
  echo $pagination;
}

public function paginationSearch15($total_pages,$page,$search,$criteria,$dateTo,$dateFrom){
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
        $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitReleased=Submit&tab=released&Rpage='.$prev.'\'>&laquo; previous</a>';
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
            $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitReleased=Submit&tab=released&Rpage='.$counter.'\'>'.$counter.'</a>';
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
              $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitReleased=Submit&tab=released&Rpage='.$counter.'\'>'.$counter.'</a>';
          }
          $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
          $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitReleased=Submit&tab=released&Rpage='.$lastpage.'\'>'.$lastpage.'</a>';
        }
        //in middle; hide some front and some back
        elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
        {
          $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitReleased=Submit&tab=released&Rpage=1\'>1</a>';
          $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
          for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
          {
            if ($counter == $page)
              $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
            else
              $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitReleased=Submit&tab=released&Rpage='.$counter.'\'>'.$counter.'</a>';
          }
          $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
          $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitReleased=Submit&tab=released&Rpage='.$lastpage.'\'>'.$lastpage.'</a>';
        }
        //close to end; only hide early pages
        else
        {
          $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitReleased=Submit&tab=released&Rpage=1.\'>1</a>';
          // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitReleased=Submit&tab=released&Rpage==2\'>2</a>';
          $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
          for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
          {
            if ($counter == $page)
              $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
            else
              $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitReleased=Submit&tab=released&Rpage='.$counter.'\'>'.$counter.'</a>';
          }
        }
      }
      if ($page < $counter - 1)
        $pagination.= '<a id="pageN" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitReleased=Submit&tab=released&Rpage='.$next.'\'>next &raquo;</a>';
      else
        $pagination.=  '<span id="spanD" class=\'disabled\'>next &raquo;</span>';
      $pagination.= "</div>\n";
    }
    echo $pagination;
}


  public function paginationSearch10($total_pages,$page,$search,$criteria){
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
         $pagination.= '<a id="page"  href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=forrelease1&submitVerifiedAll=Submit&V2page='.$prev.'\'>&laquo; previous</a>';
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
             $pagination.= '<a id="page" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=forrelease1&submitVerifiedAll=Submit&V2page='.$counter.'\'>'.$counter.'</a>';
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
               $pagination.= '<a id="page"  href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=forrelease1&submitVerifiedAll=Submit&V2page='.$counter.'\'>'.$counter.'</a>';
           }
           $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
           $pagination.= '<a id="page"  href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=forrelease1&submitVerifiedAll=Submit&V2page='.$lastpage.'\'>'.$lastpage.'</a>';
         }
         //in middle; hide some front and some back
         elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
         {
           $pagination.= '<a id="page"  href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=forrelease1&submitVerifiedAll=Submit&V2page=1\'>1</a>';
           $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
           for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
           {
             if ($counter == $page)
               $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
             else
               $pagination.= '<a id="page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=forrelease1&submitVerifiedAll=Submit&V2page='.$counter.'\'>'.$counter.'</a>';
           }
           $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
           $pagination.= '<a id="page" id"page" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=forrelease1&submitVerifiedAll=Submit&V2page='.$lastpage.'\'>'.$lastpage.'</a>';
         }
         //close to end; only hide early pages
         else
         {
           $pagination.= '<a id="page"  href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=forrelease1&submitVerifiedAll=Submit&V2page=1.\'>1</a>';
           // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=forrelease1&submitVerifiedAll=Submit&V2page==2\'>2</a>';
           $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
           for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
           {
             if ($counter == $page)
               $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
             else
               $pagination.= '<a id="page"  href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=forrelease1&submitVerifiedAll=Submit&V2page='.$counter.'\'>'.$counter.'</a>';
           }
         }
       }
       if ($page < $counter - 1)
         $pagination.= '<a id="pageN" href=\'pending.php?criteria='.$criteria.'&search='.$search.'&tab=forrelease1&submitVerifiedAll=Submit&V2page='.$next.'\'>next &raquo;</a>';
       else
         $pagination.=  '<span id="spanD" class=\'disabled\'>next &raquo;</span>';
       $pagination.= "</div>\n";
     }
     echo $pagination;
 }

 public function paginationSearch11($total_pages,$page,$dateFrom,$dateTo){
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
         $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerifiedAll=Submit&V2page='.$prev.'\'>&laquo; previous</a>';
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
             $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerifiedAll=Submit&V2page='.$counter.'\'>'.$counter.'</a>';
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
               $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerifiedAll=Submit&V2page='.$counter.'\'>'.$counter.'</a>';
           }
           $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
           $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerifiedAll=Submit&V2page='.$lastpage.'\'>'.$lastpage.'</a>';
         }
         //in middle; hide some front and some back
         elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
         {
           $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerifiedAll=Submit&V2page=1\'>1</a>';
           $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
           for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
           {
             if ($counter == $page)
               $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
             else
               $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerifiedAll=Submit&V2page='.$counter.'\'>'.$counter.'</a>';
           }
           $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
           $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerifiedAll=Submit&V2page='.$lastpage.'\'>'.$lastpage.'</a>';
         }
         //close to end; only hide early pages
         else
         {
           $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerifiedAll=Submit&V2page=1.\'>1</a>';
           // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerifiedAll=Submit&V2page==2\'>2</a>';
           $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
           for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
           {
             if ($counter == $page)
               $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
             else
               $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerifiedAll=Submit&V2page='.$counter.'\'>'.$counter.'</a>';
           }
         }
       }
       if ($page < $counter - 1)
         $pagination.= '<a id="pageN" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerifiedAll=Submit&V2page='.$next.'\'>next &raquo;</a>';
       else
         $pagination.=  '<span id="spanD" class=\'disabled\'>next &raquo;</span>';
       $pagination.= "</div>\n";
     }
     echo $pagination;
 }

   public function paginationSearch12($total_pages,$page,$search,$criteria,$dateTo,$dateFrom){
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
           $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerifiedAll=Submit&tab=forrelease1&V2page='.$prev.'\'>&laquo; previous</a>';
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
               $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerifiedAll=Submit&tab=forrelease1&V2page='.$counter.'\'>'.$counter.'</a>';
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
                 $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerifiedAll=Submit&tab=forrelease1&V2page='.$counter.'\'>'.$counter.'</a>';
             }
             $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
             $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerifiedAll=Submit&tab=forrelease1&V2page='.$lastpage.'\'>'.$lastpage.'</a>';
           }
           //in middle; hide some front and some back
           elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
             $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerifiedAll=Submit&tab=forrelease1&V2page=1\'>1</a>';
             $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
             for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
             {
               if ($counter == $page)
                 $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
               else
                 $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerifiedAll=Submit&tab=forrelease1&V2page='.$counter.'\'>'.$counter.'</a>';
             }
             $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
             $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerifiedAll=Submit&tab=forrelease1&V2page='.$lastpage.'\'>'.$lastpage.'</a>';
           }
           //close to end; only hide early pages
           else
           {
             $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerifiedAll=Submit&tab=forrelease1&V2page=1.\'>1</a>';
             // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerifiedAll=Submit&tab=forrelease1&V2page==2\'>2</a>';
             $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
             for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
             {
               if ($counter == $page)
                 $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
               else
                 $pagination.= '<a id="page" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerifiedAll=Submit&tab=forrelease1&V2page='.$counter.'\'>'.$counter.'</a>';
             }
           }
         }
         if ($page < $counter - 1)
           $pagination.= '<a id="pageN" id"page" href=\'pending.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerifiedAll=Submit&tab=forrelease1&V2page='.$next.'\'>next &raquo;</a>';
         else
           $pagination.=  '<span id="spanD" class=\'disabled\'>next &raquo;</span>';
         $pagination.= "</div>\n";
       }
       echo $pagination;
   }


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
      $pagination.= '<a id="page" id"page" href=\'verification.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPendingV=Submit&Verpage='.$prev.'\'>&laquo; previous</a>';
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
          $pagination.= '<a id="page" id"page" href=\'verification.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPendingV=Submit&Verpage='.$counter.'\'>'.$counter.'</a>';
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
            $pagination.= '<a id="page" id"page" href=\'verification.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPendingV=Submit&Verpage='.$counter.'\'>'.$counter.'</a>';
        }
        $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        $pagination.= '<a id="page" id"page" href=\'verification.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPendingV=Submit&Verpage='.$lastpage.'\'>'.$lastpage.'</a>';
      }
      //in middle; hide some front and some back
      elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
      {
        $pagination.= '<a id="page" id"page" href=\'verification.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPendingV=Submit&Verpage=1\'>1</a>';
        $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
          else
            $pagination.= '<a id="page" id"page" href=\'verification.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPendingV=Submit&Verpage='.$counter.'\'>'.$counter.'</a>';
        }
        $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        $pagination.= '<a id="page" id"page" href=\'verification.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPendingV=Submit&Verpage='.$lastpage.'\'>'.$lastpage.'</a>';
      }
      //close to end; only hide early pages
      else
      {
        $pagination.= '<a id="page" id"page" href=\'verification.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPendingV=Submit&Verpage=1.\'>1</a>';
        // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'verification.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPendingV=Submit&Verpage==2\'>2</a>';
        $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
        for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
          else
            $pagination.= '<a id="page" id"page" href=\'verification.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPendingV=Submit&Verpage='.$counter.'\'>'.$counter.'</a>';
        }
      }
    }
    if ($page < $counter - 1)
      $pagination.= '<a id="pageN" id"page" href=\'verification.php?criteria='.$criteria.'&search='.$search.'&tab=view&submitPendingV=Submit&Verpage='.$next.'\'>next &raquo;</a>';
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
      $pagination.= '<a id="page" id"page" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPendingV=Submit&Verpage='.$prev.'\'>&laquo; previous</a>';
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
          $pagination.= '<a id="page" id"page" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPendingV=Submit&Verpage='.$counter.'\'>'.$counter.'</a>';
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
            $pagination.= '<a id="page" id"page" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPendingV=Submit&Verpage='.$counter.'\'>'.$counter.'</a>';
        }
        $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        $pagination.= '<a id="page" id"page" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPendingV=Submit&Verpage='.$lastpage.'\'>'.$lastpage.'</a>';
      }
      //in middle; hide some front and some back
      elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
      {
        $pagination.= '<a id="page" id"page" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPendingV=Submit&Verpage=1\'>1</a>';
        $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
          else
            $pagination.= '<a id="page" id"page" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPendingV=Submit&Verpage='.$counter.'\'>'.$counter.'</a>';
        }
        $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        $pagination.= '<a id="page" id"page" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPendingV=Submit&Verpage='.$lastpage.'\'>'.$lastpage.'</a>';
      }
      //close to end; only hide early pages
      else
      {
        $pagination.= '<a id="page" id"page" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPendingV=Submit&Verpage=1.\'>1</a>';
        // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPendingV=Submit&Verpage==2\'>2</a>';
        $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
        for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
          else
            $pagination.= '<a id="page" id"page" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPendingV=Submit&Verpage='.$counter.'\'>'.$counter.'</a>';
        }
      }
    }
    if ($page < $counter - 1)
      $pagination.= '<a id="pageN" id"page" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitPendingV=Submit&Verpage='.$next.'\'>next &raquo;</a>';
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
        $pagination.= '<a id="page" id"page" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPendingV=Submit&tab=view&Verpage='.$prev.'\'>&laquo; previous</a>';
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
            $pagination.= '<a id="page" id"page" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPendingV=Submit&tab=view&Verpage='.$counter.'\'>'.$counter.'</a>';
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
              $pagination.= '<a id="page" id"page" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPendingV=Submit&tab=view&Verpage='.$counter.'\'>'.$counter.'</a>';
          }
          $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
          $pagination.= '<a id="page" id"page" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPendingV=Submit&tab=view&Verpage='.$lastpage.'\'>'.$lastpage.'</a>';
        }
        //in middle; hide some front and some back
        elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
        {
          $pagination.= '<a id="page" id"page" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPendingV=Submit&tab=view&Verpage=1\'>1</a>';
          $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
          for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
          {
            if ($counter == $page)
              $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
            else
              $pagination.= '<a id="page" id"page" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPendingV=Submit&tab=view&Verpage='.$counter.'\'>'.$counter.'</a>';
          }
          $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
          $pagination.= '<a id="page" id"page" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPendingV=Submit&tab=view&Verpage='.$lastpage.'\'>'.$lastpage.'</a>';
        }
        //close to end; only hide early pages
        else
        {
          $pagination.= '<a id="page" id"page" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPendingV=Submit&tab=view&Verpage=1.\'>1</a>';
          // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPendingV=Submit&tab=view&Verpage==2\'>2</a>';
          $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
          for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
          {
            if ($counter == $page)
              $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
            else
              $pagination.= '<a id="page" id"page" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPendingV=Submit&tab=view&Verpage='.$counter.'\'>'.$counter.'</a>';
          }
        }
      }
      if ($page < $counter - 1)
        $pagination.= '<a id="pageN" id"page" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitPendingV=Submit&tab=view&Verpage='.$next.'\'>next &raquo;</a>';
      else
        $pagination.=  '<span id="spanD" class=\'disabled\'>next &raquo;</span>';
      $pagination.= "</div>\n";
    }
    echo $pagination;
}
public function paginationSearch19($total_pages,$page,$search,$criteria){
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
    $pagination.= '<a id="page" id"page" href=\'verification.php?criteria='.$criteria.'&search='.$search.'&tab=verified&submitVerfiedV=Submit&Vrpage='.$prev.'\'>&laquo; previous</a>';
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
        $pagination.= '<a id="page" id"page" href=\'verification.php?criteria='.$criteria.'&search='.$search.'&tab=verified&submitVerfiedV=Submit&Vrpage='.$counter.'\'>'.$counter.'</a>';
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
          $pagination.= '<a id="page" id"page" href=\'verification.php?criteria='.$criteria.'&search='.$search.'&tab=verified&submitVerfiedV=Submit&Vrpage='.$counter.'\'>'.$counter.'</a>';
      }
      $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
      $pagination.= '<a id="page" id"page" href=\'verification.php?criteria='.$criteria.'&search='.$search.'&tab=verified&submitVerfiedV=Submit&Vrpage='.$lastpage.'\'>'.$lastpage.'</a>';
    }
    //in middle; hide some front and some back
    elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
    {
      $pagination.= '<a id="page" id"page" href=\'verification.php?criteria='.$criteria.'&search='.$search.'&tab=verified&submitVerfiedV=Submit&Vrpage=1\'>1</a>';
      $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
      for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
      {
        if ($counter == $page)
          $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
        else
          $pagination.= '<a id="page" id"page" href=\'verification.php?criteria='.$criteria.'&search='.$search.'&tab=verified&submitVerfiedV=Submit&Vrpage='.$counter.'\'>'.$counter.'</a>';
      }
      $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
      $pagination.= '<a id="page" id"page" href=\'verification.php?criteria='.$criteria.'&search='.$search.'&tab=verified&submitVerfiedV=Submit&Vrpage='.$lastpage.'\'>'.$lastpage.'</a>';
    }
    //close to end; only hide early pages
    else
    {
      $pagination.= '<a id="page" id"page" href=\'verification.php?criteria='.$criteria.'&search='.$search.'&tab=verified&submitVerfiedV=Submit&Vrpage=1.\'>1</a>';
      // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'verification.php?criteria='.$criteria.'&search='.$search.'&tab=verified&submitVerfiedV=Submit&Vrpage==2\'>2</a>';
      $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
      for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
      {
        if ($counter == $page)
          $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
        else
          $pagination.= '<a id="page" id"page" href=\'verification.php?criteria='.$criteria.'&search='.$search.'&tab=verified&submitVerfiedV=Submit&Vrpage='.$counter.'\'>'.$counter.'</a>';
      }
    }
  }
  if ($page < $counter - 1)
    $pagination.= '<a id="pageN" id"page" href=\'verification.php?criteria='.$criteria.'&search='.$search.'&tab=verified&submitVerfiedV=Submit&Vrpage='.$next.'\'>next &raquo;</a>';
  else
    $pagination.=  '<span id="spanD" class=\'disabled\'>next &raquo;</span>';
  $pagination.= "</div>\n";
}
echo $pagination;
}

public function paginationSearch20($total_pages,$page,$dateFrom,$dateTo){
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
    $pagination.= '<a id="page" id"page" href=\'verification.php?tab=verified&dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerfiedV=Submit&Vrpage='.$prev.'\'>&laquo; previous</a>';
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
        $pagination.= '<a id="page" id"page" href=\'verification.php?tab=verified&dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerfiedV=Submit&Vrpage='.$counter.'\'>'.$counter.'</a>';
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
          $pagination.= '<a id="page" id"page" href=\'verification.php?tab=verified&dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerfiedV=Submit&Vrpage='.$counter.'\'>'.$counter.'</a>';
      }
      $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
      $pagination.= '<a id="page" id"page" href=\'verification.php?tab=verified&dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerfiedV=Submit&Vrpage='.$lastpage.'\'>'.$lastpage.'</a>';
    }
    //in middle; hide some front and some back
    elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
    {
      $pagination.= '<a id="page" id"page" href=\'verification.php?tab=verified&dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerfiedV=Submit&Vrpage=1\'>1</a>';
      $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
      for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
      {
        if ($counter == $page)
          $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
        else
          $pagination.= '<a id="page" id"page" href=\'verification.php?tab=verified&dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerfiedV=Submit&Vrpage='.$counter.'\'>'.$counter.'</a>';
      }
      $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
      $pagination.= '<a id="page" id"page" href=\'verification.php?tab=verified&dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerfiedV=Submit&Vrpage='.$lastpage.'\'>'.$lastpage.'</a>';
    }
    //close to end; only hide early pages
    else
    {
      $pagination.= '<a id="page" id"page" href=\'verification.php?tab=verified&dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerfiedV=Submit&Vrpage=1.\'>1</a>';
      // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerfiedV=Submit&Vrpage==2\'>2</a>';
      $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
      for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
      {
        if ($counter == $page)
          $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
        else
          $pagination.= '<a id="page" id"page" href=\'verification.php?tab=verified&dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerfiedV=Submit&Vrpage='.$counter.'\'>'.$counter.'</a>';
      }
    }
  }
  if ($page < $counter - 1)
    $pagination.= '<a id="pageN" id"page" href=\'verification.php?tab=verified&dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&search=&submitVerfiedV=Submit&Vrpage='.$next.'\'>next &raquo;</a>';
  else
    $pagination.=  '<span id="spanD" class=\'disabled\'>next &raquo;</span>';
  $pagination.= "</div>\n";
}
echo $pagination;
}

public function paginationSearch21($total_pages,$page,$search,$criteria,$dateTo,$dateFrom){
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
      $pagination.= '<a id="page" id"page" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerfiedV=Submit&tab=verified&Vrpage='.$prev.'\'>&laquo; previous</a>';
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
          $pagination.= '<a id="page" id"page" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerfiedV=Submit&tab=verified&Vrpage='.$counter.'\'>'.$counter.'</a>';
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
            $pagination.= '<a id="page" id"page" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerfiedV=Submit&tab=verified&Vrpage='.$counter.'\'>'.$counter.'</a>';
        }
        $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        $pagination.= '<a id="page" id"page" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerfiedV=Submit&tab=verified&Vrpage='.$lastpage.'\'>'.$lastpage.'</a>';
      }
      //in middle; hide some front and some back
      elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
      {
        $pagination.= '<a id="page" id"page" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerfiedV=Submit&tab=verified&Vrpage=1\'>1</a>';
        $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
          else
            $pagination.= '<a id="page" id"page" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerfiedV=Submit&tab=verified&Vrpage='.$counter.'\'>'.$counter.'</a>';
        }
        $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        $pagination.= '<a id="page" id"page" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerfiedV=Submit&tab=verified&Vrpage='.$lastpage.'\'>'.$lastpage.'</a>';
      }
      //close to end; only hide early pages
      else
      {
        $pagination.= '<a id="page" id"page" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerfiedV=Submit&tab=verified&Vrpage=1.\'>1</a>';
        // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerfiedV=Submit&tab=verified&Vrpage==2\'>2</a>';
        $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
        for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
          else
            $pagination.= '<a id="page" id"page" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerfiedV=Submit&tab=verified&Vrpage='.$counter.'\'>'.$counter.'</a>';
        }
      }
    }
    if ($page < $counter - 1)
      $pagination.= '<a id="pageN" id"page" href=\'verification.php?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&criteria='.$criteria.'&search='.$graduate.'&submitVerfiedV=Submit&tab=verified&Vrpage='.$next.'\'>next &raquo;</a>';
    else
      $pagination.=  '<span id="spanD" class=\'disabled\'>next &raquo;</span>';
    $pagination.= "</div>\n";
  }
  echo $pagination;
}

public function paginationSearchAlumni($total_pages,$page,$search,$criteria){
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
      $pagination.= '<a id="page" id"page" href=\'viewAlumni.php?criteria='.$criteria.'&search='.$search.'&submitAlumni=Submit&page='.$prev.'\'>&laquo; previous</a>';
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
          $pagination.= '<a id="page" id"page" href=\'viewAlumni.php?criteria='.$criteria.'&search='.$search.'&submitAlumni=Submit&page='.$counter.'\'>'.$counter.'</a>';
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
            $pagination.= '<a id="page" id"page" href=\'viewAlumni.php?criteria='.$criteria.'&search='.$search.'&submitAlumni=Submit&page='.$counter.'\'>'.$counter.'</a>';
        }
        $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        $pagination.= '<a id="page" id"page" href=\'viewAlumni.php?criteria='.$criteria.'&search='.$search.'&submitAlumni=Submit&page='.$lastpage.'\'>'.$lastpage.'</a>';
      }
      //in middle; hide some front and some back
      elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
      {
        $pagination.= '<a id="page" id"page" href=\'viewAlumni.php?criteria='.$criteria.'&search='.$search.'&submitAlumni=Submit&page=1\'>1</a>';
        $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
          else
            $pagination.= '<a id="page" id"page" href=\'viewAlumni.php?criteria='.$criteria.'&search='.$search.'&submitAlumni=Submit&page='.$counter.'\'>'.$counter.'</a>';
        }
        $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
        $pagination.= '<a id="page" id"page" href=\'viewAlumni.php?criteria='.$criteria.'&search='.$search.'&submitAlumni=Submit&page='.$lastpage.'\'>'.$lastpage.'</a>';
      }
      //close to end; only hide early pages
      else
      {
        $pagination.= '<a id="page" id"page" href=\'viewAlumni.php?criteria='.$criteria.'&search='.$search.'&submitAlumni=Submit&page=1.\'>1</a>';
        // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'viewAlumni.php?criteria='.$criteria.'&search='.$search.'&submitAlumni=Submit&page==2\'>2</a>';
        $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
        for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
        {
          if ($counter == $page)
            $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
          else
            $pagination.= '<a id="page" id"page" href=\'viewAlumni.php?criteria='.$criteria.'&search='.$search.'&submitAlumni=Submit&page='.$counter.'\'>'.$counter.'</a>';
        }
      }
    }
    if ($page < $counter - 1)
      $pagination.= '<a id="pageN" id"page" href=\'viewAlumni.php?criteria='.$criteria.'&search='.$search.'&submitAlumni=Submit&page='.$next.'\'>next &raquo;</a>';
    else
      $pagination.=  '<span id="spanD" class=\'disabled\'>next &raquo;</span>';
    $pagination.= "</div>\n";
  }
  echo $pagination;
}


}
 ?>
