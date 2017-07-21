<?php
include_once '../Class/ZgGraph.php';
?>

<html>
   <head>
      <?php
         $graph = new \Zoradata\ZgGraph();

         echo $graph->loader();

         $data = array(array((string)'City', (string)'2010 Population', (string)'2000 Population'),
                       array((string)'New York City, NY', (int)8175000, (int)8008000),
                       array((string)'Los Angeles, CA', (int)3792000, (int)3694000),
                       array((string)'Chicago, IL', (int)2695000, (int)2896000),
                       array((string)'Houston, TX', (int)2099000, (int)1953000),
                       array((string)'Philadelphia, PA', (int)1526000, (int)1517000));

         $options = array('title' => 'Population of Largest U.S. Cities',
                          'chartArea' => array('width' => '50%'),
                          'isStacked' => true,
                          'hAxis' => array('title' => 'Total Population',
                                           'minValue' => 0),
                          'vAxis' => array('title' => 'City'));

         $packages = array('corechart', 'bar');

         echo $graph->draw('ColumnChart', 'chart', $data, $options, $packages);
         echo $graph->draw('ColumnChart', 'chartimg', $data, $options, $packages, TRUE);
      ?>
   </head>

   <body>
      <div id="chart" style="width: 900px; height: 500px"></div>
      <div id="chartimg" style="width: 900px; height: 500px"></div>
   </body>

</html>
