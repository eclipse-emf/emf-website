 <?php
        # Sample PHP code to issue a Downloads query.
        # Logic, DB and Presentation lumped here for simplicity.
        # Load up the classfile
        # You need to tell the WebMaster from which URL you are loading this class from, 
        # otherwise the connect() will fail.
        require_once "/home/data/httpd/eclipse-php-classes/system/dbconnection_downloads_ro.class.php";
        
        # Connect to database
        $dbc    = new DBConnectionDownloads();
        $dbh    = $dbc->connect();

        # There are usually in excess of 30 million records.. watch your queries!!
        $sql_info = "SELECT 
						DOW.file, 
                        COUNT(*) AS RecordCount
                     FROM 
                     	downloads AS DOW
			         WHERE
                        DOW.file LIKE \"%emf-sdo-xsd-SDK-2.2.0M%\"";
        
        $rs     = mysql_query($sql_info, $dbh);
        
        if(mysql_errno($dbh) > 0) {
			echo "There was an error processing this request";
			# For debugging purposes - don't display this stuff in a production page.
			# echo mysql_error($dbh);
			# Mysql disconnects automatically, but I like my disconnects to be explicit.
			$dbc->disconnect();
			exit;
        }
                
        while($myrow = mysql_fetch_assoc($rs)) {
           echo "File: " . $myrow['file'] . " Count: " . $myrow['RecordCount'] . "<br>\n";
        }
        
        $dbc->disconnect();

        $rs             = null;
        $dbh            = null;
        $dbc            = null;
?>