<?php
$report_content = '';
xinjiang_report_get_children(0, 0, 0, 0, 0, $report_content);

echo xinjiang_footnotes($report_content);
?>