<?php
include_once '../Class/ZgGraph.php';
?>

<html>
   <head>
      <?php
         $graph = new \Zoradata\ZgGraph();

         echo $graph->loader();
         
         $data = array(array((string)'President', (string)'Start', (string)'End'),
                       array('Washington', (int)strtotime('30-03-1989')*1000, (int)strtotime('04-02-1997')*1000),
                       array('Adams', (int)strtotime('02-04-1997')*1000, (int)strtotime('04-02-2001')*1000),
                       array('Jefferson', (int)strtotime('04-02-2001')*1000, (int)strtotime('04-02-2009')*1000));         
         
         $packages = array('timeline');

         echo $graph->draw('Timeline', 'chart', $data, NULL, $packages);
      ?>
   </head>

   <body>
      <div id="chart" style="width: 900px"></div>
   </body>

</html>
