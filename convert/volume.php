<?php

function convertToGallons($value, $from_unit) {
  switch($from_unit) {
    case 'bucket':
      return $value * 4;
      break;
    case 'butt':
      return $value * 108;
      break;
    case 'firkin':
      return $value * 9;
      break;
    case 'hogshead':
      return $value * 54;
      break;
    case 'pint':
      return $value * 0.125;
      break;
    default:
      return "Unsupported unit.";
  }
}
  
function convertFromGallons($value, $to_unit) {
  switch($to_unit) {
    case 'bucket':
      return $value / 4;
      break;
    case 'butt':
      return $value / 108;
      break;
    case 'firkin':
      return $value / 9;
      break;
    case 'hogshead':
      return $value / 54;
      break;
    case 'pint':
      return $value / 0.125;
      break;
    default:
      return "Unsupported unit.";
  }
}

function convertVolume($value, $fromUnit, $toUnit) {
  $gallonValue = convertToGallons($value, $fromUnit);
  $newValue = convertFromGallons($gallonValue, $toUnit);
  return $newValue;
}

$fromValue = '';
$fromUnit = '';
$toUnit = '';
$toValue = '';

if(!isset($_POST['submit'])) {
  $_POST['submit'] ='';
}
if($_POST['submit']) {

  $fromValue = $_POST['fromValue'];
  $fromUnit = $_POST['fromUnit'];
  $toUnit = $_POST['toUnit'];
  
  $toValue = convertVolume($fromValue, $fromUnit, $toUnit);
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Convert Volume</title>
    <link href="styles.css" rel="stylesheet" type="text/css">
  </head>
  <body>

    <div id="main-content">

      <h1>Convert Volume</h1>
  
      <form action="" method="post">
        
        <div class="entry">
          <label>From:</label>&nbsp;
          <input type="text" name="fromValue" value="<?php echo number_format($fromValue, 3); ?>" />&nbsp;
          <select name="fromUnit">
            <option value="bucket"<?php if($fromUnit == 'bucket') { echo " selected"; } ?>>Bucket</option>
            <option value="butt"<?php if($fromUnit == 'butt') { echo " selected"; } ?>>Butt</option>
            <option value="firkin"<?php if($fromUnit == 'firkin') { echo " selected"; } ?>>Firkin</option>
            <option value="hogshead"<?php if($fromUnit == 'hogshead') { echo " selected"; } ?>>Hogshead</option>
            <option value="pint"<?php if($fromUnit == 'pint') { echo " selected"; } ?>>Pint</option>
          </select>
        </div>
        
        <div class="entry">
          <label>To:</label>&nbsp;
          <input type="text" name="toValue" value="<?php echo number_format($toValue, 3); ?>" />&nbsp;
          <select name="toUnit">
            <option value="bucket"<?php if($toUnit == 'bucket') { echo " selected"; } ?>>Bucket</option>
            <option value="butt"<?php if($toUnit == 'butt') { echo " selected"; } ?>>Butt</option>
            <option value="firkin"<?php if($toUnit == 'firkin') { echo " selected"; } ?>>Firkin</option>
            <option value="hogshead"<?php if($toUnit == 'hogshead') { echo " selected"; } ?>>Hogshead</option>
            <option value="pint"<?php if($toUnit == 'pint') { echo " selected"; } ?>>Pint</option>
          </select>
          
        </div>
        
        <input type="submit" name="submit" value="Submit" />
      </form>
  
      <br />
      <a href="index.php">Return to menu</a>
      
    </div>
  </body>
</html>
