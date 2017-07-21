<?php
include_once '../Class/ZgGraph.php';
?>

<html>
   <head>
      <?php

         $graph = new \Zoradata\ZgGraph();
         echo $graph->loader();

         $data = array(array((string)'Year', (string)'Sales', (string)'Expenses'),
                       array((string)'2004', (float)1000, (float)400),
                       array((string)'2005', (float)1170, (float)460),
                       array((string)'2006', (float)660, (float)1120),
                       array((string)'2007', (float)1030, (float)540));

         $options = array('title' => 'Company Performance',
                          'curveType' => 'function',
                          'legend' => array('position' => 'bottom'));

         $packages = array('corechart');

         echo $graph->draw('LineChart', 'chart', $data, $options, $packages);
         echo $graph->draw('LineChart', 'chartimg', $data, $options, $packages, TRUE);

      ?>

     
</head>
  <body>
    <div id="chart" style="width: 900px; height: 500px"></div>
    <div id="chartimg" style="width: 900px; height: 500px"></div>
  </body>
</html>
