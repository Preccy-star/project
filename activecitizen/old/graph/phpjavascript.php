  <?php
  $shirt = array(
        'color' => 'blue',
        'number' => 23,
        'size' => 'XL'
    );
    echo '<script>';
    echo 'var shirt = ' . json_encode($shirt) . ';';
    echo '</script>';
	
	    //<script>var shirt = {"color":"blue","number":23,"size":"XL"}</script>
	
	echo "<script>\n";
    echo 'var shirt = ' . json_encode($shirt, JSON_PRETTY_PRINT) . ';';
    echo "\n</script>";
	
	   /* <script>
    var shirt = {
        "color": "blue",
        "number": 1000,
        "size": "XL"
    };
    </script>
	*/
	?>