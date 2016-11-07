<?php
/* Kostal Piko measurement for UI version >6
Wenger Florian
*/

// kostal inverter IP
$pikoip = "192.168.1.21";

// IDs (Reverse Engineering)
$id_operation_status = 16780032;

$id_dctot_w = 33556736;
$id_dc1_v = 33555202;
$id_dc1_a = 33555201;
$id_dc1_w = 33555203;
$id_actot_w = 67109120;
$id_actot_Hz = 67110400;
$id_actot_cos = 67110656;
$id_actot_limitation = 67110144;
$id_ac1_v = 67109378;
$id_ac1_a = 67109377;
$id_ac1_w = 67109379;
$id_yield_day = 251658754;
$id_yield_tot = 251658753;
$id_operationtime = 251658496;

$url = "http://".$pikoip."/api/dxs.json".
"?dxsEntries=".$id_operation_status.
"&dxsEntries=".$id_actot_w.
"&dxsEntries=".$id_dctot_w.
"&dxsEntries=".$id_yield_day.
"&dxsEntries=".$id_yield_tot.
"&sessionId=1234567890";

$response = file_get_contents("$url", "r");
$dataObject = json_decode($response);
echo "<table>\n";
echo "<tr><td>piko state</td><td><td>".$dataObject->dxsEntries[0]->value."</td></tr>\n";
echo "<tr><td>AC-Power</td><td><td>".$dataObject->dxsEntries[1]->value."W</td></tr>\n";
echo "<tr><td>DC-Power</td><td><td>".$dataObject->dxsEntries[2]->value."W</td></tr>\n";
echo "<tr><td>Yield today</td><td><td>".$dataObject->dxsEntries[3]->value."Wh</td></tr>\n";
echo "<tr><td>Yield total</td><td><td>".$dataObject->dxsEntries[4]->value."kWh</td></tr>\n";
echo "</table>\n";
?>
