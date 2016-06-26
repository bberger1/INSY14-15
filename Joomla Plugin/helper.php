<?php
  /**
   * Helper class for Hello World! module
   *
   * @package    Joomla.Tutorials
   * @subpackage Modules
   * @link http://docs.joomla.org/J3.x:Creating_a_simple_module/Developing_a_Basic_Module
   * @license        GNU/GPL, see LICENSE.php
   * mod_helloworld is free software. This version may have been modified pursuant
   * to the GNU General Public License, and as distributed it includes or
   * is derivative of works licensed under the GNU General Public License or
   * other free or open source software licenses.
   */
  class ModHelloWorldHelper
  {
      /**
       * Retrieves the hello message
       *
       * @param   array  $params An object containing the module parameters
       *
       * @access public
       */
      public static function getHello($params)
      {
        echo 'hi';

        $option = array(); //prevent problems

        $option['driver']   = 'mysql';            // Database driver name
        $option['host']     = 'mysqlsvr46.world4you.com';    // Database host name
        $option['user']     = 'sql5052624';       // User for database authentication
        $option['password'] = 'ia75wwg';   // Password for database authentication
        $option['database'] = '5052624db3';      // Database name
        //$option['prefix']   = '';             // Database prefix (may be empty)

        $db = JDatabaseDriver::getInstance( $option );


        $query = $db->getQuery(true);
        $query->select('*');
        $query->from('Produkt');

        echo "<h4>billige Kunstwerke: </h4>";
    		echo "<table>";
    		echo "<tr><td><b>Bezeichnung</b></td><td><b>Gewicht</b></td></tr>";

        // sets up a database query for later execution
        $db->setQuery($query);

        // fetch result as an object list
        $result = $db->loadObjectList();

        foreach ( $result as $row ) {
          echo "<tr><td>";
    			echo $row->bezeichnung;
    			echo "</td><td>";
    			echo $row->gewicht;
    			echo "</td>";
        }
        echo "</table>";

        return ob_get_clean();
      }
  }
?>
