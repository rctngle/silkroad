<?php
$report_content = '';
silkroad_report_get_children(0, 0, 0, 0, 0, $report_content);
echo silkroad_footnotes('sr', $report_content);
?>