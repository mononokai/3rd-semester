<?php
function list_to_nums($list_str) {

  $list_nums = explode(",", $list_str);

  foreach ($list_nums as $list_num) {
    if (!is_numeric($list_num)) {
      return false;
    }
  }

  for ($i = 0; $i < count($list_nums); $i++) {
    $list_nums[$i] = (int)$list_nums[$i];
  }

  return $list_nums;
}


function check_values($start_pos, $list_nums, $sector_size) {
  if ($start_pos > $sector_size) {
    return false;
  }

  foreach ($list_nums as $list_num) {
    if ($list_num > $sector_size) {
      return false;
    }
  }

  return true;
}


/* ---------------------------------- FCFS ---------------------------------- */
function fcfs($start_pos, $list_nums) {
  $movements = abs($start_pos - $list_nums[0]);

  for ($i = 0; $i < count($list_nums) - 1; $i++) {
    $movements += abs($list_nums[$i] - $list_nums[$i + 1]);
  }

  return $movements;
}


/* ---------------------------------- SSTF ---------------------------------- */
function sstf($start_pos, $list_nums) {
  $movements = 0;

  $buffer = array_splice($list_nums, 0, 3);
  $pos = $start_pos;

  while ($list_nums or $buffer) {
    $shortest = 0;

    if ($buffer[1] and abs($buffer[1] - $pos) < abs($buffer[$shortest] - $pos)) {
      $shortest = 1;
    }
    if ($buffer[2] and abs($buffer[2] - $pos) < abs($buffer[$shortest] - $pos)) {
      $shortest = 2;
    }

    $movements += abs($buffer[$shortest] - $pos);
    $pos = $buffer[$shortest];
    array_splice($buffer, $shortest, 1);
    if ($list_nums) {
      array_push($buffer, array_shift($list_nums));
    }
  }

  return $movements;
}


/* ---------------------------------- SCAN ---------------------------------- */
function scan($start_pos, $list_nums) {
  $movements = 0;
  $buffer = array_splice($list_nums, 0, 3);
  $pos = $start_pos;
  $right = null;

  while ($list_nums or $buffer) {
    $shortest = 0;

    # test if direction is set
    if ($right === null) {
      if ($buffer[1] and abs($buffer[1] - $pos) < abs($buffer[$shortest] - $pos)) {
        $shortest = 1;
      }
      if ($buffer[2] and abs($buffer[2] - $pos) < abs($buffer[$shortest] - $pos)) {
        $shortest = 2;
      }
      if ($buffer[$shortest] > 1) {
        $right = true;
      }
      else {
        $right = false;
      }
      continue;
    }

    if ($right) {
      if ($buffer[1] and $buffer[1] > $pos and abs($buffer[1] - $pos) < abs($buffer[$shortest] - $pos)) {
        $shortest = 1;
      }
      if ($buffer[2] and $buffer[2] > $pos and abs($buffer[2] - $pos) < abs($buffer[$shortest] - $pos)) {
        $shortest = 2;
      }
      if ($buffer[$shortest] < $pos) {
        $right = false;
        continue;
      }
    }

    if (!$right) {
      if ($buffer[1] and $buffer[1] < $pos and abs($buffer[1] - $pos) < abs($buffer[$shortest] - $pos)) {
        $shortest = 1;
      }
      if ($buffer[2] and $buffer[2] < $pos and abs($buffer[2] - $pos) < abs($buffer[$shortest] - $pos)) {
        $shortest = 2;
      }
      if ($buffer[$shortest] > $pos) {
        $right = true;
        continue;
      }
    }

    $movements += abs($buffer[$shortest] - $pos);
    $pos = $buffer[$shortest];
    array_splice($buffer, $shortest, 1);
    if ($list_nums) {
      array_push($buffer, array_shift($list_nums));
    }
  }
  
  return $movements;
}


/* --------------------------------- C-SCAN --------------------------------- */
function c_scan($start_pos, $list_nums, $sector_size) {
  $movements = 0;
  $buffer = array_splice($list_nums, 0, 3);
  $pos = $start_pos;
  $right = null;

  while ($list_nums or $buffer) {
    $shortest = 0;

    # test if direction is set
    if ($right === null) {
      if ($buffer[1] and abs($buffer[1] - $pos) < abs($buffer[$shortest] - $pos)) {
        $shortest = 1;
      }
      if ($buffer[2] and abs($buffer[2] - $pos) < abs($buffer[$shortest] - $pos)) {
        $shortest = 2;
      }
      if ($buffer[$shortest] > 1) {
        $right = true;
      }
      else {
        $right = false;
      }
      continue;
    }

    if ($right) {
      if ($buffer[1] and $buffer[1] > $pos and abs($buffer[1] - $pos) < abs($buffer[$shortest] - $pos)) {
        $shortest = 1;
      }
      if ($buffer[2] and $buffer[2] > $pos and abs($buffer[2] - $pos) < abs($buffer[$shortest] - $pos)) {
        $shortest = 2;
      }
      if ($buffer[$shortest] < $pos) {
        $shortest = array_search(min($buffer), $buffer);
        $movements += $sector_size - $pos;
        $movements += $buffer[$shortest];
        $pos = $buffer[$shortest];
        array_splice($buffer, $shortest, 1);
        if ($list_nums) {
          array_push($buffer, array_shift($list_nums));
        }
        continue;
      }
    }

    if (!$right) {
      if ($buffer[1] and $buffer[1] < $pos and abs($buffer[1] - $pos) < abs($buffer[$shortest] - $pos)) {
        $shortest = 1;
      }
      if ($buffer[2] and $buffer[2] < $pos and abs($buffer[2] - $pos) < abs($buffer[$shortest] - $pos)) {
        $shortest = 2;
      }
      if (!$buffer[$shortest] or $buffer[$shortest] > $pos) {
        $shortest = array_search(max($buffer), $buffer);
        $movements += $pos;
        $movements += $sector_size - $buffer[$shortest];
        $pos = $buffer[$shortest];
        array_splice($buffer, $shortest, 1);
        if ($list_nums) {
          array_push($buffer, array_shift($list_nums));
        }
        continue;
      }
    }

    $movements += abs($buffer[$shortest] - $pos);
    $pos = $buffer[$shortest];
    array_splice($buffer, $shortest, 1);
    if ($list_nums) {
      array_push($buffer, array_shift($list_nums));
    }
  }
  
  return $movements;
}


function validator($start, $list, $size) {
  $nums = list_to_nums($list);

  if (!check_values($start, $nums, $size) or !$nums) {
    header('Location: index.php?error=1');
  }

  return $nums;
}


// 32,17,68,12,24,8,17,88,53,72
$start_input = $_POST['start'];
$list_input = $_POST['list'];
$sector_size = $_POST['sector'];
$list_nums = validator($start_input, $list_input, $sector_size);
$fcfs_moves = fcfs($start_input, $list_nums);
$sstf_moves = sstf($start_input, $list_nums);
$scan_moves = scan($start_input, $list_nums);
$c_scan_moves = c_scan($start_input, $list_nums, $sector_size);
/* ---------------------------------- PHP END ---------------------------------- */
?>



<div id="solutions" style="margin-left: 15px" >
  <div class="animate__animated animate__bounceInUp div1">
    <h3>FCFS</h3>
    <p>Head movement: <?="{$fcfs_moves}"?></p>
  </div>

  <div class="animate__animated animate__bounceInUp div2">
    <h3>SSTF</h3>
    <p>Head movement: <?="{$sstf_moves}"?></p>
  </div>

  <div class="animate__animated animate__bounceInUp div3">
    <h3>SCAN</h3>
    <p>Head movement: <?="{$scan_moves}"?></p>
  </div>

  <div class="animate__animated animate__bounceInUp div4">
    <h3>C-SCAN</h3>
    <p>Head movement: <?="{$c_scan_moves}"?></p>
  </div>
</div>