<?php

$dbconnection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$activeplugins = get_option('active_plugins');
$uptimedata = shell_exec('uptime');
$uptime = explode(' up ', $uptimedata);
$uptime = explode(',', $uptime[1]);
$uptime = $uptime[0].', '.$uptime[1];
$tcb_debug = WP_DEBUG;

if ($tcb_debug = 1) {$wpdebug = 'True';} else {$wpdebug == 'False';}
if (get_option('users_can_register') == 1) {$tcbregister = 'True';} else { $tcbregister = 'False';}
if (ini_get('display_errors') == 1 ) {$tcberrors = 'True';} else { $tcberrors = 'False';}
if (ini_get('allow_url_fopen') == 1 ) {$tcbfopen = 'True';} else { $tcbfopen = 'False';}
if (ini_get('allow_url_include') == 1 ) {$tcbinclude = 'True';} else { $tcbinclude = 'False';}

?>
<div id="tcb-content">
        <div class="tcb-status">
            <h3> <?php echo __('WordPress','tcb-shopware'); ?> </h3>
            <div class="tcb-system-info">
                <?php $tcbtheme = wp_get_theme();
                    
                echo '
                <table class="tcb-table">
                <thead>
                    <tr>
                        <th>'.__('Info','tcb-shopware').'</td>
                        <th>'.__('Data','tcb-shopware').'</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><em>'.__('WordPress Version','tcb-shopware').'</em></td>
                        <td>'. get_bloginfo('version').'</td>
                    </tr>                
                    <tr>
                        <td><em>'.__('Administrator','tcb-shopware').'</em></td>
                        <td>'. get_bloginfo('admin_email').'</td>
                    </tr>
                    <tr>
                        <td><em>'.__('Active Plugins','tcb-shopware').'</em></td>
                        <td>'; ?> <?php foreach($activeplugins as $key => $value) { 
        $string = explode('/',$value);
        echo '<a>'.$string[0] .'</a></br>';
        } ?><?php echo '</td>
                    </tr>
                    <tr>
                        <td><em>'.__('WP Debug','tcb-shopware').'</em></td>
                        <td>'. $wpdebug.'</td>
                    </tr>
                    <tr>
                        <td><em>'.__('WP Memory Limit','tcb-shopware').'</em></td>
                        <td>'. WP_MEMORY_LIMIT.'</td>
                    </tr>
                    <tr>
                        <td><em>'.__('Site open to register?','tcb-shopware').'</em></td>
                        <td>'. $tcbregister .'</td>
                    </tr>
                </tbody>
                </table>
                '; ?>
            </div>
            <h3> <?php echo __('Theme','tcb-shopware'); ?> </h3>
            <div class="tcb-theme-info">
                <?php $tcbtheme = wp_get_theme();
                    
                echo '
                <table class="tcb-table">
                <thead>
                    <tr>
                        <th>'.__('Info','tcb-shopware').'</td>
                        <th>'.__('Data','tcb-shopware').'</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><em>'.__('Theme','tcb-shopware').'</em></td>
                        <td>'. $tcbtheme->get('Name').'</td>
                    </tr>
                    <tr>
                        <td><em>'.__('Theme URI','tcb-shopware').'</em></td>
                        <td>'. $tcbtheme->get('ThemeURI').'</td>
                    </tr>
                    <tr>
                        <td><em>'.__('Theme Description','tcb-shopware').'</em></td>
                        <td>'. $tcbtheme->get('Description').'</td>
                    </tr>
                    <tr>
                        <td><em>'.__('Theme Author','tcb-shopware').'</em></td>
                        <td>'. $tcbtheme->get('Author').'</td>
                    </tr>
                    <tr>
                        <td><em>'.__('Template','tcb-shopware').'</em></td>
                        <td>'. $tcbtheme->get('Template').'</td>
                    </tr>
                    <tr>
                        <td><em>'.__('Theme Version','tcb-shopware').'</em></td>
                        <td>'. $tcbtheme->get('Version').'</td>
                    </tr>
                    <tr>
                        <td><em>'.__('Theme Support','tcb-shopware').'</em></td>
                        <td>'.__('Theme Description','tcb-shopware').'</td>
                    </tr>
                </tbody>
                </table>
                '; ?>
            </div>                       
            <h3> <?php echo __('Current Server Load','tcb-shopware'); ?> </h3>
            <div class="tcb-server">
                <?php
                $numCpus = 1;
                if (is_file('/proc/cpuinfo'))
                {
                  $cpuinfo = file_get_contents('/proc/cpuinfo');
                  preg_match_all('/^processor/m', $cpuinfo, $matches);
                  $numCpus = count($matches[0]);
                }
                else if ('WIN' == strtoupper(substr(PHP_OS, 0, 3)))
                {
                  $process = @popen('wmic cpu get NumberOfCores', 'rb');
                  if (false !== $process)
                  {
                    fgets($process);
                    $numCpus = intval(fgets($process));
                    pclose($process);
                  }
                }
                else
                {
                  $process = @popen('sysctl -a', 'rb');
                  if (false !== $process)
                  {
                    $output = stream_get_contents($process);
                    preg_match('/hw.ncpu: (\d+)/', $output, $matches);
                    if ($matches)
                    {
                      $numCpus = intval($matches[1][0]);
                    }
                    pclose($process);
                  }
                }
                $coreCount = $numCpus;
                $interval = '1';
                $free = shell_exec('free');
                $free = (string)trim($free);
                $free_arr = explode("\n", $free);
                $mem = explode(" ", $free_arr[1]);
                $mem = array_filter($mem);
                $mem = array_merge($mem);
                $memory_usage = round($mem[2]/$mem[1]*100) .'%';
                $rs = sys_getloadavg();
                $interval = $interval >= 1 && 3 <= $interval ? $interval : 1;
                $load = $rs[$interval];
                $disktotal = disk_total_space ('/');
                $diskfree  = disk_free_space  ('/');
                $diskuse   = round (100 - (($diskfree / $disktotal) * 100)) .'%';
                $proc_count = 0;
                $dh = opendir('/proc');                
                while ($dir = readdir($dh)) {
                    if (is_dir('/proc/' . $dir)) {
                        if (preg_match('/^[0-9]+$/', $dir)) {
                            $proc_count ++;
                        }
                    }
                }
                echo '
                <table class="tcb-table">
                    <thead>
                        <tr>
                            <th>'.__('Attribute','tcb-shopware').'</td>
                            <th>'.__('Current Usage','tcb-shopware').'</td>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><em>'.__('CPU Cores: ','tcb-shopware').'</em></td>
                        <td>'.$numCpus.'</td>
                    </tr>
                        <tr>
                            <td><em>'.__('Memory: ','tcb-shopware').'</em></td>
                            <td>'.$memory_usage.'</td>
                        </tr>
                        <tr>
                            <td><em>'.__('Server Load: ','tcb-shopware').'</em></td>
                            <td>'. round(($load * 100) / $coreCount,2) .'</td>
                        </tr>
                        <tr>
                            <td><em>'.__('Processes Running: ','tcb-shopware').'</em></td>
                            <td>'. $proc_count .'</td>
                        </tr>
                        <tr>
                            <td><em>'.__('Disk Load: ','tcb-shopware').'</em></td>
                            <td>'. $diskuse .'</td>
                        </tr>
                    </tbody>
                </table>';
                ?>
            </div>
            <h3> <?php echo __('PHP','tcb-shopware'); ?> </h3>
            <div class="tcb-system-status">
                <?php
                echo '
                <table class="tcb-table">
                    <thead>
                        <tr>
                            <th>'.__('PHP Directive','tcb-shopware').'</td>
                            <th>'.__('Value','tcb-shopware').'</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><em>'.__('Version: ','tcb-shopware').'</em></td>
                            <td>'. phpversion() .'</td>
                        </tr>
                        <tr>
                            <td><em>'.__('Display Errors: ','tcb-shopware').'</em></td>
                            <td>'. $tcberrors .'</td>
                        </tr>
                        <tr>
                            <td><em>'.__('Allow URL Fopen: ','tcb-shopware').'</em></td>
                            <td>'. $tcbfopen .'</td>
                        </tr>
                        <tr>
                            <td><em>'.__('Allow URL Include: ','tcb-shopware').'</em></td>
                            <td>'. $tcbinclude .'</td>
                        </tr>
                        <tr>
                            <td><em>'.__('Post Max Size: ','tcb-shopware').'</em></td>
                            <td>'. ini_get('post_max_size') .'B</td>
                        </tr>
                        <tr>
                            <td><em>'.__('Upload Max File Size: ','tcb-shopware').'</em></td>
                            <td>'. ini_get('upload_max_filesize') .'B</td>
                        </tr>
                        <tr>
                            <td><em>'.__('Max Execution Time: ','tcb-shopware').'</em></td>
                            <td>'. ini_get('max_execution_time') .' in seconds</td>
                        </tr>
                        <tr>
                            <td><em>'.__('Max Input Time: ','tcb-shopware').'</em></td>
                            <td>'. ini_get('max_input_time') .' in seconds</td>
                        </tr>
                        <tr>
                            <td><em>'.__('PHP Memory Limit: ','tcb-shopware').'</em></td>
                            <td>'. ini_get('memory_limit') .'B</td>
                        </tr>
                        <tr>
                            <td><em>'.__('PHP Extensions: ','tcb-shopware').'</em></td>
                            <td>'; ?> <?php $allextensions = get_loaded_extensions();
                            foreach($allextensions as $extension) { echo '<a>'.$extension .'</a>  |  '; } ?>
                            <?php echo '</td>
                        </tr>
                    </tbody>
                </table>';
                ?>
            </div>
            <h3> <?php echo __('Web Server','tcb-shopware'); ?> </h3>
            <div class="tcb-server">
                <?php echo '
                <table class="tcb-table">
                    <thead>
                        <tr>
                            <th>'.__('Info','tcb-shopware').'</td>
                            <th>'.__('Data','tcb-shopware').'</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><em>'.__('Operating System: ','tcb-shopware').'</em></td>
                            <td>'. php_uname('s') .' | '. php_uname('v') .'</td>
                        </tr>
                        <tr>
                            <td><em>'.__('Your IP: ','tcb-shopware').'</em></td>
                            <td>'.$_SERVER['SERVER_ADDR'] .'</td>
                        </tr>
                        <tr>
                            <td><em>'.__('Host: ','tcb-shopware').'</em></td>
                            <td>'. get_site_url() .'</td>
                        </tr>
                        <tr>
                            <td><em>'.__('Web Server Uptime: ','tcb-shopware').'</em></td>
                            <td>'. $uptime .'</td>
                        </tr>
                        <tr>
                            <td><em>'.__('SMTP Host: ','tcb-shopware').'</em></td>
                            <td>'. ini_get('SMTP') .'</td>
                        </tr>
                        <tr>
                            <td><em>'.__('Web Server Uptime: ','tcb-shopware').'</em></td>
                            <td>'. ini_get('smtp_port') .'</td>
                        </tr>
                    </tbody>
                </table>'; ?>
            </div>  
            <h3> <?php echo __('MySQL Server','tcb-shopware'); ?> </h3>
            <div class="tcb-server">
                <?php echo '
                <table class="tcb-table">
                    <thead>
                        <tr>
                            <th>'.__('Info','tcb-shopware').'</td>
                            <th>'.__('Data','tcb-shopware').'</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><em>'.__('MySQL Version: ','tcb-shopware').'</em></td>
                            <td>'. mysqli_get_server_info($dbconnection) .'</td>
                        </tr>
                        <tr>
                            <td><em>'.__('Database Host: ','tcb-shopware').'</em></td>
                            <td>'. DB_HOST .'</td>
                        </tr>
                        <tr>
                            <td><em>'.__('Database User: ','tcb-shopware').'</em></td>
                            <td>'. DB_USER .'</td>
                        </tr>
                        <tr>
                            <td><em>'.__('Database Name: ','tcb-shopware').'</em></td>
                            <td>'. DB_NAME .'</td>
                        </tr>
                        <tr>
                            <td><em>'.__('Database Charset: ','tcb-shopware').'</em></td>
                            <td>'. DB_CHARSET .'</td>
                        </tr>
                        <tr>
                            <td><em>'.__('Database Collation: ','tcb-shopware').'</em></td>
                            <td>'. DB_COLLATE .'</td>
                        </tr>
                    </tbody>
                </table>'; ?>
            </div>
        </div>
    </div>

 