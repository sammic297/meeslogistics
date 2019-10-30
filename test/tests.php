<!doctype html>

<html>

<head>

</head>

<body>

<?php include('test.php'); ?> <!-- Include default language -->

  <!-- Process select with jQuery/AJAX to include file in your index.php based upon selection -->

  <form id="select-lang">
    <select id="language">
      <option value="en">English</option>
      <option value="de">Deutsch</option>
      <option value="es">Espanol</option>
    </select>
  </form>

  <form>
    <label for="name"><?php echo $name; ?></label>
    <input name="name" type="text" id="name"/>
  </form>

</body>

</html>