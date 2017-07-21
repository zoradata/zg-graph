<?php
include_once '../Class/ZgGraph.php';
?>

<html>
   <head>
      <?php
         $graph = new \Zoradata\ZgGraph();

         echo $graph->loader();
         
         $data = array(array((string)'Year', (string)'Sales', (string)'Expenses'),
                 array((string)'2013', (int)1000, (int)400),
                 array((string)'2014', (int)1170, (int)460),
                 array((string)'2015', (int)660, (int)1120),
                 array((string)'2016', (int)1030, (int)540));

         $options = array('title' => 'Company Performance',
                          'hAxis' => array('title' => 'Year', 'titleTextStyle' => array('color' => '#333')),
                          'vAxis' => array('minValue' => 0));

         $packages = array('corechart');

         echo $graph->draw('AreaChart', 'chart', $data, $options, $packages);
         echo $graph->draw('AreaChart', 'chartimg', $data, $options, $packages, TRUE);
      ?>
   </head>

   <body>
      <div id="chart" style="width: 900px; height: 500px"></div>
      <div id="chartimg" style="width: 900px; height: 500px"></div>
   </body>

</html>
