<?php
/**
 * Zg Graph
 *
 * Last revison: 31.7.2017
 * @copyright Copyright (c) 2017 ZoraData sdružení <http://www.zoradata.cz>
 * @author Jaroslav Šourek <jaroslav.sourek@zoradata.cz>
 * @version 1.0.5
 * 
 * Simple wrapper for Google Graphs
 * 
 */


namespace Zoradata;


class ZgGraph
{

    /** @var string Google Graph version */
    protected $version;
    
    
    /**
     * Class initialization
     * @param string $version Google Graphs version
     */
    public function __construct($version = 'current')
    {
       $this->version = $version;
    }

    
    /**
     * Loading Javascript loader
     * @return string Javascript to load the Google Graphs loader
     */
    public function loader()
    {
       $output = '<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>' . "\n";
       return $output;
    }
    
    
    /**
     * Draw a graph
     * @param string $type Graph type
     * @param string $element Element HTML element to display a graph
     * @param array $data Data for a graph
     * @param array $options Optional graph parameters
     * @param array $packages Optional packages required for a given graph type
     * @param boolean $asImage View a graph as an image
     * @param boolean $isResponsive Response graph
     * @return string Javascript string 
     */
   public function draw($type, $element, $data, $options = NULL, $packages = array('corechart'), $asImage = FALSE, $isResponsive = TRUE)
   {
      $output = '<script type="text/javascript">' . "\n";
      $output .= 'google.charts.load(\'' . $this->version . '\', {packages: ' . json_encode($packages, JSON_UNESCAPED_UNICODE) . '});' . "\n";
      $output .= 'google.charts.setOnLoadCallback(drawChart' . $element . ');' . "\n";
      $output .= ' ' . "\n";
      $output .= 'function drawChart' . $element . '()' . "\n";
      $output .= '{' . "\n";
      $output .= 'var data = google.visualization.arrayToDataTable' . "\n";
      $output .= '( ';
      $output .= json_encode($data, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
      $output .= ');' . "\n";
       
      if ($options != NULL)
      {
         $output .= '   var options = ';
         $output .= json_encode($options, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
         $output .= "\n";
      }
      else
      {
         $output .= '   var options = {}' . "\n";
      }

      $output .= 'var chart = new google.visualization.' . $type . '(document.getElementById(\'' . $element. '\'));' . "\n";

      if ($asImage)
      {
         $output .= "google.visualization.events.addListener(chart, 'ready', function()" . "\n";
         $output .= '{' . "\n";
         $output .= "document.getElementById('" . $element. "').innerHTML = '<img src=\"' + chart.getImageURI() + '\">';" . "\n";
         $output .= '});' . "\n";
      }
      $output .= 'chart.draw(data, options);' . "\n";
      $output .= '}' . "\n";
       
      if ($isResponsive)
      {
         $output .= '$(window).resize(function()' . "\n";
         $output .= '{' . "\n";
         $output .= 'drawChart' . $element . '()';
         $output .= '});' . "\n";
      }
      
      $output .= '</script>' . "\n";
      return $output;
    }

}
