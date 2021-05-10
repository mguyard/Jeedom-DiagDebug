<?php

require_once ('DiagDebug.class.php');

try {
    $diag = new DiagDebug('Diagral_eOne');
    $diag->addPluginLogs();
    $diag->addJeedomLog('update');
    $diag->addJeedomLogs(array('openvpn', 'starting'));
    $diag->addCmd('ifconfig -a');
    $diag->addCmd('cat /etc/passwd', NULL, TRUE);
    $diag->addCmd('ip route', NULL, TRUE);
    $arrayTest = array(
        'ls -l /tmp',
        'ls -l /root',
        'cat /var/www/html/plugins/Diagral_eOne/3rparty/DiagDebug/DiagDebug.class.php',
        'cat /var/www/html/plugins/Diagral_eOne/3rparty/DiagDebug/test.php'
    );
    $diag->addCmds($arrayTest, 'GroupedCmds');
    $diag->addPluginConf();
    $diag->addAllPluginEqlogic();
    $diag->addFile('/etc/passwd');
    $diag->addFile('/var/www/html/plugins/Diagral_eOne/d*/p*');
    $diag->addFiles(array(
        '/var/www/html/robots.txt',
        '/var/www/html/mobile.manifest.php',
    ));
    $diag->download();
} catch (Exception $e) {
    echo 'Exception reçue : '.  $e->getMessage();
}
