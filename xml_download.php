<?php

header("Content-disposition: attachment; filename=report.xml");
header("Content-type: application/xml");
readfile("report.xml");
exit();

?>



