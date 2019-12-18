<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/registrardev/resource/php/class/core/init.php';
require_once 'config.php';

class paginationOneAdmin{


  public function pagination($total_pages,$page){
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
          $pagination.= '<a id="page" id"page" href=\'view_pending_requests.php?tab=view&Ppage='.$prev.'\'>&laquo; previous</a>';
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
              $pagination.= '<a id="page" id"page" href=\'view_pending_requests.php?tab=view&Ppage='.$counter.'\'>'.$counter.'</a>';
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
                $pagination.= '<a id="page" id"page" href=\'view_pending_requests.php?tab=view&Ppage='.$counter.'\'>'.$counter.'</a>';
            }
            $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
            $pagination.= '<a id="page" id"page" href=\'view_pending_requests.php?tab=view&Ppage='.$lastpage.'\'>'.$lastpage.'</a>';
          }
          //in middle; hide some front and some back
          elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
          {
            $pagination.= '<a id="page" id"page" href=\'view_pending_requests.php?tab=view&Ppage=1\'>1</a>';
            $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
            for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
            {
              if ($counter == $page)
                $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
              else
                $pagination.= '<a id="page" id"page" href=\'view_pending_requests.php?tab=view&Ppage='.$counter.'\'>'.$counter.'</a>';
            }
            $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
            $pagination.= '<a id="page" id"page" href=\'view_pending_requests.php?tab=view&Ppage='.$lastpage.'\'>'.$lastpage.'</a>';
          }
          //close to end; only hide early pages
          else
          {
            $pagination.= '<a id="page" id"page" href=\'view_pending_requests.php?tab=view&Ppage=1.\'>1</a>';
            // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'view_pending_requests.php?tab=view&Ppage==2\'>2</a>';
            $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
            for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
            {
              if ($counter == $page)
                $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
              else
                $pagination.= '<a id="page" id"page" href=\'view_pending_requests.php?tab=view&Ppage='.$counter.'\'>'.$counter.'</a>';
            }
          }
        }
        if ($page < $counter - 1)
          $pagination.= '<a id="pageN" id"page" href=\'view_pending_requests.php?tab=view&Ppage='.$next.'\'>next &raquo;</a>';
        else
          $pagination.=  '<span id="spanD" class=\'disabled\'>next &raquo;</span>';
        $pagination.= "</div>\n";
      }
      echo $pagination;
  }

  public function paginationPrinted($total_pages,$page){
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
          $pagination.= '<a id="page" id"page" href=\'view_pending_requests.php?tab=printed&PRpage='.$prev.'\'>&laquo; previous</a>';
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
              $pagination.= '<a id="page" href=\'view_pending_requests.php?tab=printed&PRpage='.$counter.'\'>'.$counter.'</a>';
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
                $pagination.= '<a id="page" id"page" href=\'view_pending_requests.php?tab=printed&PRpage='.$counter.'\'>'.$counter.'</a>';
            }
            $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
            $pagination.= '<a id="page" href=\'view_pending_requests.php?tab=printed&PRpage='.$lastpage.'\'>'.$lastpage.'</a>';
          }
          //in middle; hide some front and some back
          elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
          {
            $pagination.= '<a id="page"  href=\'view_pending_requests.php?tab=printed&PRpage=1\'>1</a>';
            $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
            for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
            {
              if ($counter == $page)
                $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
              else
                $pagination.= '<a id="page" id"page" href=\'view_pending_requests.php?tab=printed&PRpage='.$counter.'\'>'.$counter.'</a>';
            }
            $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
            $pagination.= '<a id="page" href=\'view_pending_requests.php?tab=printed&PRpage='.$lastpage.'\'>'.$lastpage.'</a>';
          }
          //close to end; only hide early pages
          else
          {
            $pagination.= '<a id="page" href=\'view_pending_requests.php?tab=printed&PRpage=1.\'>1</a>';
            // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'view_pending_requests.php?tab=printed&PRpage==2\'>2</a>';
            $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
            for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
            {
              if ($counter == $page)
                $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
              else
                $pagination.= '<a id="page"  href=\'view_pending_requests.php?tab=printed&PRpage='.$counter.'\'>'.$counter.'</a>';
            }
          }
        }
        if ($page < $counter - 1)
          $pagination.= '<a id="pageN" id"page" href=\'view_pending_requests.php?tab=printed&PRpage='.$next.'\'>next &raquo;</a>';
        else
          $pagination.=  '<span id="spanD" class=\'disabled\'>next &raquo;</span>';
        $pagination.= "</div>\n";
      }
      echo $pagination;
  }

  public function paginationForRelease($total_pages,$page){
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
          $pagination.= '<a id="page" id"page" href=\'view_pending_requests.php?tab=forrelease1&V2page='.$prev.'\'>&laquo; previous</a>';
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
              $pagination.= '<a id="page" href=\'view_pending_requests.php?tab=forrelease1&V2page='.$counter.'\'>'.$counter.'</a>';
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
                $pagination.= '<a id="page" id"page" href=\'view_pending_requests.php?tab=forrelease1&V2page='.$counter.'\'>'.$counter.'</a>';
            }
            $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
            $pagination.= '<a id="page" href=\'view_pending_requests.php?tab=forrelease1&V2page='.$lastpage.'\'>'.$lastpage.'</a>';
          }
          //in middle; hide some front and some back
          elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
          {
            $pagination.= '<a id="page"  href=\'view_pending_requests.php?tab=forrelease1&V2page=1\'>1</a>';
            $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
            for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
            {
              if ($counter == $page)
                $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
              else
                $pagination.= '<a id="page" id"page" href=\'view_pending_requests.php?tab=forrelease1&V2page='.$counter.'\'>'.$counter.'</a>';
            }
            $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
            $pagination.= '<a id="page" href=\'view_pending_requests.php?tab=forrelease1&V2page='.$lastpage.'\'>'.$lastpage.'</a>';
          }
          //close to end; only hide early pages
          else
          {
            $pagination.= '<a id="page" href=\'view_pending_requests.php?tab=forrelease1&V2page=1.\'>1</a>';
            // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'view_pending_requests.php?tab=forrelease1&V2page==2\'>2</a>';
            $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
            for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
            {
              if ($counter == $page)
                $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
              else
                $pagination.= '<a id="page"  href=\'view_pending_requests.php?tab=forrelease1&V2page='.$counter.'\'>'.$counter.'</a>';
            }
          }
        }
        if ($page < $counter - 1)
          $pagination.= '<a id="pageN" href=\'view_pending_requests.php?tab=forrelease1&V2page='.$next.'\'>next &raquo;</a>';
        else
          $pagination.=  '<span id="spanD" class=\'disabled\'>next &raquo;</span>';
        $pagination.= "</div>\n";
      }
      echo $pagination;
  }


  public function paginationForRelease2($total_pages,$page){
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
          $pagination.= '<a id="page" id"page" href=\'view_pending_requests.php?tab=forrelease2&V1page='.$prev.'\'>&laquo; previous</a>';
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
              $pagination.= '<a id="page" href=\'view_pending_requests.php?tab=forrelease2&V1page='.$counter.'\'>'.$counter.'</a>';
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
                $pagination.= '<a id="page" id"page" href=\'view_pending_requests.php?tab=forrelease2&V1page='.$counter.'\'>'.$counter.'</a>';
            }
            $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
            $pagination.= '<a id="page" href=\'view_pending_requests.php?tab=forrelease2&V1page='.$lastpage.'\'>'.$lastpage.'</a>';
          }
          //in middle; hide some front and some back
          elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
          {
            $pagination.= '<a id="page"  href=\'view_pending_requests.php?tab=forrelease2&V1page=1\'>1</a>';
            $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
            for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
            {
              if ($counter == $page)
                $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
              else
                $pagination.= '<a id="page" id"page" href=\'view_pending_requests.php?tab=forrelease2&V1page='.$counter.'\'>'.$counter.'</a>';
            }
            $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
            $pagination.= '<a id="page" href=\'view_pending_requests.php?tab=forrelease2&V1page='.$lastpage.'\'>'.$lastpage.'</a>';
          }
          //close to end; only hide early pages
          else
          {
            $pagination.= '<a id="page" href=\'view_pending_requests.php?tab=forrelease2&V1page=1.\'>1</a>';
            // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'view_pending_requests.php?tab=forrelease2&V1page==2\'>2</a>';
            $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
            for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
            {
              if ($counter == $page)
                $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
              else
                $pagination.= '<a id="page"  href=\'view_pending_requests.php?tab=forrelease2&V1page='.$counter.'\'>'.$counter.'</a>';
            }
          }
        }
        if ($page < $counter - 1)
          $pagination.= '<a id="pageN" href=\'view_pending_requests.php?tab=forrelease2&V1page='.$next.'\'>next &raquo;</a>';
        else
          $pagination.=  '<span id="spanD" class=\'disabled\'>next &raquo;</span>';
        $pagination.= "</div>\n";
      }
      echo $pagination;
  }

  public function paginationReleased($total_pages,$page){
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
          $pagination.= '<a id="page" id"page" href=\'view_pending_requests.php?tab=released&Rpage='.$prev.'\'>&laquo; previous</a>';
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
              $pagination.= '<a id="page" id"page" href=\'view_pending_requests.php?tab=released&Rpage='.$counter.'\'>'.$counter.'</a>';
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
                $pagination.= '<a id="page" id"page" href=\'view_pending_requests.php?tab=released&Rpage='.$counter.'\'>'.$counter.'</a>';
            }
            $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
            $pagination.= '<a id="page" id"page" href=\'view_pending_requests.php?tab=released&Rpage='.$lastpage.'\'>'.$lastpage.'</a>';
          }
          //in middle; hide some front and some back
          elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
          {
            $pagination.= '<a id="page" id"page" href=\'view_pending_requests.php?tab=released&Rpage=1\'>1</a>';
            $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
            for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
            {
              if ($counter == $page)
                $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
              else
                $pagination.= '<a id="page" id"page" href=\'view_pending_requests.php?tab=released&Rpage='.$counter.'\'>'.$counter.'</a>';
            }
            $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
            $pagination.= '<a id="page" id"page" href=\'view_pending_requests.php?tab=released&Rpage='.$lastpage.'\'>'.$lastpage.'</a>';
          }
          //close to end; only hide early pages
          else
          {
            $pagination.= '<a id="page" id"page" href=\'view_pending_requests.php?tab=released&Rpage=1.\'>1</a>';
            // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'view_pending_requests.php?tab=released&Rpage==2\'>2</a>';
            $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
            for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
            {
              if ($counter == $page)
                $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
              else
                $pagination.= '<a id="page" id"page" href=\'view_pending_requests.php?tab=released&Rpage='.$counter.'\'>'.$counter.'</a>';
            }
          }
        }
        if ($page < $counter - 1)
          $pagination.= '<a id="pageN" id"page" href=\'view_pending_requests.php?tab=released&Rpage='.$next.'\'>next &raquo;</a>';
        else
          $pagination.=  '<span id="spanD" class=\'disabled\'>next &raquo;</span>';
        $pagination.= "</div>\n";
      }
      echo $pagination;
  }


  public function paginationVerification($total_pages,$page){
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
          $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?tab=view&Verpage='.$prev.'\'>&laquo; previous</a>';
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
              $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?tab=view&Verpage='.$counter.'\'>'.$counter.'</a>';
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
                $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?tab=view&Verpage='.$counter.'\'>'.$counter.'</a>';
            }
            $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
            $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?tab=view&Verpage='.$lastpage.'\'>'.$lastpage.'</a>';
          }
          //in middle; hide some front and some back
          elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
          {
            $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?tab=view&Verpage=1\'>1</a>';
            $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
            for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
            {
              if ($counter == $page)
                $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
              else
                $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?tab=view&Verpage='.$counter.'\'>'.$counter.'</a>';
            }
            $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
            $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?tab=view&Verpage='.$lastpage.'\'>'.$lastpage.'</a>';
          }
          //close to end; only hide early pages
          else
          {
            $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?tab=view&Verpage=1.\'>1</a>';
            // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'verificationAdmin.php?tab=view&Verpage==2\'>2</a>';
            $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
            for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
            {
              if ($counter == $page)
                $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
              else
                $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?tab=view&Verpage='.$counter.'\'>'.$counter.'</a>';
            }
          }
        }
        if ($page < $counter - 1)
          $pagination.= '<a id="pageN" id"page" href=\'verificationAdmin.php?tab=view&Verpage='.$next.'\'>next &raquo;</a>';
        else
          $pagination.=  '<span id="spanD" class=\'disabled\'>next &raquo;</span>';
        $pagination.= "</div>\n";
      }
      echo $pagination;
  }
  public function paginationVerificationVerified($total_pages,$page){
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
          $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?tab=verified&Vrpage='.$prev.'\'>&laquo; previous</a>';
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
              $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?tab=verified&Vrpage='.$counter.'\'>'.$counter.'</a>';
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
                $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?tab=verified&Vrpage='.$counter.'\'>'.$counter.'</a>';
            }
            $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
            $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?tab=verified&Vrpage='.$lastpage.'\'>'.$lastpage.'</a>';
          }
          //in middle; hide some front and some back
          elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
          {
            $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?tab=verified&Vrpage=1\'>1</a>';
            $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
            for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
            {
              if ($counter == $page)
                $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
              else
                $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?tab=verified&Vrpage='.$counter.'\'>'.$counter.'</a>';
            }
            $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
            $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?tab=verified&Vrpage='.$lastpage.'\'>'.$lastpage.'</a>';
          }
          //close to end; only hide early pages
          else
          {
            $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?tab=verified&Vrpage=1.\'>1</a>';
            // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'verificationAdmin.php?tab=verified&Vrpage==2\'>2</a>';
            $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
            for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
            {
              if ($counter == $page)
                $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
              else
                $pagination.= '<a id="page" id"page" href=\'verificationAdmin.php?tab=verified&Vrpage='.$counter.'\'>'.$counter.'</a>';
            }
          }
        }
        if ($page < $counter - 1)
          $pagination.= '<a id="pageN" id"page" href=\'verificationAdmin.php?tab=verified&Vrpage='.$next.'\'>next &raquo;</a>';
        else
          $pagination.=  '<span id="spanD" class=\'disabled\'>next &raquo;</span>';
        $pagination.= "</div>\n";
      }
      echo $pagination;
  }

  public function paginationAlumni($total_pages,$page){
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
          $pagination.= '<a id="page" id"page" href=\'viewAlumniAdmin.php?page='.$prev.'\'>&laquo; previous</a>';
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
              $pagination.= '<a id="page" id"page" href=\'viewAlumniAdmin.php?page='.$counter.'\'>'.$counter.'</a>';
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
                $pagination.= '<a id="page" id"page" href=\'viewAlumniAdmin.php?page='.$counter.'\'>'.$counter.'</a>';
            }
            $pagination .= '<span  class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
            $pagination.= '<a id="page" id"page" href=\'viewAlumniAdmin.php?page='.$lastpage.'\'>'.$lastpage.'</a>';
          }
          //in middle; hide some front and some back
          elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
          {
            $pagination.= '<a id="page" id"page" href=\'viewAlumniAdmin.php?page=1\'>1</a>';
            $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
            for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
            {
              if ($counter == $page)
                $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
              else
                $pagination.= '<a id="page" id"page" href=\'viewAlumniAdmin.php?page='.$counter.'\'>'.$counter.'</a>';
            }
            $pagination .= '<span class=\'elipses\'>&nbsp; . . . &nbsp;</span>';
            $pagination.= '<a id="page" id"page" href=\'viewAlumniAdmin.php?page='.$lastpage.'\'>'.$lastpage.'</a>';
          }
          //close to end; only hide early pages
          else
          {
            $pagination.= '<a id="page" id"page" href=\'viewAlumniAdmin.php?page=1.\'>1</a>';
            // $pagination.= '<a id="page" id"page" style="background-color:white; border: 1px solid #d1d1d1; padding-left:10px;padding-right:10px;  text-decoration: none; padding-top:2px;" href=\'viewAlumniAdmin.php?page==2\'>2</a>';
            $pagination .= '<span class=\'elipses\'> &nbsp; . . . . &nbsp;</span>';
            for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
            {
              if ($counter == $page)
                $pagination.= '<span id="spanC" class=\'current\'>'.$counter.'</span>';
              else
                $pagination.= '<a id="page" id"page" href=\'viewAlumniAdmin.php?page='.$counter.'\'>'.$counter.'</a>';
            }
          }
        }
        if ($page < $counter - 1)
          $pagination.= '<a id="pageN" id"page" href=\'viewAlumniAdmin.php?page='.$next.'\'>next &raquo;</a>';
        else
          $pagination.=  '<span id="spanD" class=\'disabled\'>next &raquo;</span>';
        $pagination.= "</div>\n";
      }
      echo $pagination;
  }

}
 ?>
