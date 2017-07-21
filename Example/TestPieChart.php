<?php
include_once '../Class/ZgGraph.php';
?>

<html>
   <head>
      <?php
         $graph = new \Zoradata\ZgGraph();

         echo $graph->loader();
         
         $data = array(array((string)'Task', (string)'Hours per Day'),
                       array((string)'Work', (int)11),
                       array((string)'Eat', (int)2),
                       array((string)'Commute', (int)2),
                       array((string)'Watch TV', (int)2),
                       array((string)'Sleep', (int)7));
         
         $options = array('title' => 'My Daily Activities');

         $packages = array('corechart');

         echo $graph->draw('PieChart', 'chart', $data, $options, $packages);
         echo $graph->draw('PieChart', 'chartimg', $data, $options, $packages, TRUE);
      ?>
   </head>

   <body>
      <div id="chart" style="width: 900px; height: 500px"></div>
      <div id="chartimg" style="width: 900px; height: 500px"></div>
   </body>

</html>
