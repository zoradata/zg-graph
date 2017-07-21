<?php
include_once '../Class/ZgGraph.php';
?>

<html>
   <head>
      <?php
         $graph = new \Zoradata\ZgGraph();

         echo $graph->loader();

         $data = array(array((string)'Month', (string)'Bolivia', (string)'Ecuador', (string)'Madagascar', (string)'Papua New Guinea', (string)'Rwanda', (string)'Average'),
                       array((string)'2004/05', (int)165, (int)938, (int)522, (int)998, (int)450, (float)614.6),
                       array((string)'2005/06', (int)135, (int)1120, (int)599, (int)1268, (int)288, (float)682),
                       array((string)'2006/07', (int)157, (int)1167, (int)587, (int)807, (int)397, (float)623),
                       array((string)'2007/08', (int)139, (int)1110, (int)615, (int)968, (int)215, (float)609.4),
                       array((string)'2008/09', (int)136, (int)691, (int)629, (int)1026, (int)366, (float)569.6));
         
         $options = array('title' => 'Monthly Coffee Production by Country',
                          'vAxis' => array('title' => 'Cups'),
                          'hAxis' => array('title' => 'Month'),
                          'seriesType' => 'bars',
                          'series' => array(5 => array('type' => 'line')));
 
         $packages = array('corechart');

         echo $graph->draw('ComboChart', 'chart', $data, $options, $packages);
         echo $graph->draw('ComboChart', 'chartimg', $data, $options, $packages, TRUE);
      ?>
   </head>

   <body>
      <div id="chart" style="width: 900px; height: 500px"></div>
      <div id="chartimg" style="width: 900px; height: 500px"></div>
   </body>

</html>
