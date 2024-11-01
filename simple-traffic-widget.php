<?php
/*
Plugin Name: Simple Traffic Widget
Version: 1.0
Description: Counts the visitors and display traffic stats like pages views, hits or unique in a widget.
Author: Simon Waxie
*/

function hit_counter_control() {

  $options = get_stw_options();

  if ($_POST['wp_stw_Submit']){

    $options['wp_stw_WidgetTitle'] = htmlspecialchars($_POST['wp_stw_WidgetTitle']);
    $options['wp_stw_WidgetText_Visitors'] = htmlspecialchars($_POST['wp_stw_WidgetText_Visitors']);
    $options['wp_stw_WidgetText_LastDay'] = htmlspecialchars($_POST['wp_stw_WidgetText_LastDay']);
    $options['wp_stw_WidgetText_LastWeek'] = htmlspecialchars($_POST['wp_stw_WidgetText_LastWeek']);
    $options['wp_stw_WidgetText_LastMonth'] = htmlspecialchars($_POST['wp_stw_WidgetText_LastMonth']);
    $options['wp_stw_WidgetText_Online'] = htmlspecialchars($_POST['wp_stw_WidgetText_Online']);
    $options['wp_stw_WidgetText_log_opt'] = htmlspecialchars($_POST['wp_stw_WidgetText_log_opt']);
    $options['wp_stw_WidgetText_bots_filter'] = htmlspecialchars($_POST['wp_stw_WidgetText_bots_filter']);
    $options['wp_stw_WidgetText_Hits'] = htmlspecialchars($_POST['wp_stw_WidgetText_Hits']);
    $options['wp_stw_WidgetText_Unique'] = htmlspecialchars($_POST['wp_stw_WidgetText_Unique']);
    $options['wp_stw_WidgetText_Default_Tab'] = htmlspecialchars($_POST['wp_stw_WidgetText_Default_Tab']);
    $options['wp_stw_WidgetText_wlink'] = htmlspecialchars($_POST['wp_stw_WidgetText_wlink']);

    update_option("widget_hit_counter", $options);
  }

?>
  <p><strong>Change labels from english to any language</strong></p>
  <p>
    <label for="wp_stw_WidgetTitle">Text Title: </label>
    <input type="text" id="wp_stw_WidgetTitle" name="wp_stw_WidgetTitle" value="<?php echo ($options['wp_stw_WidgetTitle'] =="" ? "Counter Traffic" : $options['wp_stw_WidgetTitle']); ?>" />
  </p>
 
  <p>
    <label for="wp_stw_WidgetText_LastDay">Text Last 24 Hours: </label>
    <input type="text" id="wp_stw_WidgetText_LastDay" name="wp_stw_WidgetText_LastDay" value="<?php echo ($options['wp_stw_WidgetText_LastDay'] =="" ? "Last 24 hours" : $options['wp_stw_WidgetText_LastDay']); ?>" />
  </p>
  <p>
    <label for="wp_stw_WidgetText_LastWeek">Text Last 7 Days: </label>
    <input type="text" id="wp_stw_WidgetText_LastWeek" name="wp_stw_WidgetText_LastWeek" value="<?php echo ($options['wp_stw_WidgetText_LastWeek'] =="" ? "Last 7 days" : $options['wp_stw_WidgetText_LastWeek']); ?>" />
  </p>
  <p>
    <label for="wp_stw_WidgetText_LastMonth">Text Last 30 Days: </label>
    <input type="text" id="wp_stw_WidgetText_LastMonth" name="wp_stw_WidgetText_LastMonth" value="<?php echo ($options['wp_stw_WidgetText_LastMonth'] =="" ? "Last 30 days" : $options['wp_stw_WidgetText_LastMonth']); ?>" />
  </p>
  <p>
    <label for="wp_stw_WidgetText_Online">Text Online Now: </label>
    <input type="text" id="wp_stw_WidgetText_Online" name="wp_stw_WidgetText_Online" value="<?php echo ($options['wp_stw_WidgetText_Online'] =="" ? "Online now" : $options['wp_stw_WidgetText_Online']); ?>" />
  </p>
  <p>
    <label for="wp_stw_WidgetText_Default_Tab">Show: </label>
    <select id="wp_stw_WidgetText_Default_Tab" name="wp_stw_WidgetText_Default_Tab">
      <option value="1" <?php echo ($options['wp_stw_WidgetText_Default_Tab'] == "1" ? "selected" : "" ); ?> >Page Views</option>
      <option value="2" <?php echo ($options['wp_stw_WidgetText_Default_Tab'] == "2" ? "selected" : "" ); ?> >Hits</option>
      <option value="3" <?php echo ($options['wp_stw_WidgetText_Default_Tab'] == "3" ? "selected" : "" ); ?> >Unique Visitors</option>
    </select>
  </p>
  <p> 
	<input type="checkbox" id="wp_stw_WidgetText_wlink" name="wp_stw_WidgetText_wlink" <?php echo ($options['wp_stw_WidgetText_wlink'] == "on" ? "checked" : "" ); ?> />
    <label for="wp_stw_WidgetText_wlink"><small>Support this plugin by showing a small link under the stats. Any donation will be apreciated!</small></label>

  </p>
  <p>
    <input type="hidden" id="wp_stw_Submit" name="wp_stw_Submit" value="1" />
  </p>

<?php
}

function get_stw_options() {

  $options = get_option("widget_hit_counter");
  if (!is_array( $options )) {
    $options = array(
                     'wp_stw_WidgetTitle' => 'Counter Traffic',
                     'wp_stw_WidgetText_Visitors' => 'Pages',
                     'wp_stw_WidgetText_Hits' => 'Hits',
                     'wp_stw_WidgetText_Unique' => 'Unique',
                     'wp_stw_WidgetText_LastDay' => 'Last 24 hours',
                     'wp_stw_WidgetText_LastWeek' => 'Last 7 days',
                     'wp_stw_WidgetText_LastMonth' => 'Last 30 days',
                     'wp_stw_WidgetText_Online' => 'Online now',
                     'wp_stw_WidgetText_log_opt' => 'on',
                     'wp_stw_WidgetText_Default_Tab' => '1',
                     'wp_stw_WidgetText_bots_filter' => '1',
                     'wp_stw_WidgetText_wlink' => 'on'
                    );
  }
  return $options;
}
$wLink = 'http://www.fastemailsender.com';
function add_or_update_option($option_name, $new_value, $force_new_val=false){
    $val=get_option($option_name, false);
    if($val){
        if($force_new_val){
            update_option($option_name, $new_value);
        }
    } else {
        add_option($option_name, $new_value);
    }
}
add_or_update_option('wp_stw_label_wlink', 'Free plugin by <a href="'.$wLink.'">'.$wLink.'</a>');

function get_traffic ($sex, $unique, $hit=false) {

  global $wpdb;
  $table_name = $wpdb->prefix . "stw_log";
  $options = get_stw_options();
  $sql = '';
  $stime = time()-$sex;
  $sql = "SELECT COUNT(".($unique ? "DISTINCT IP" : "*").") FROM $table_name where Time > ".$stime;

  if ($hit)
   $sql .= ' AND IS_HIT = 1 ';

  if ($options['wp_stw_WidgetText_bots_filter'] > 1)
      $sql .= ' AND IS_BOT <> 1';

  return number_format_i18n($wpdb->get_var($wpdb->prepare($sql)));
}



function view() {

  global $wpdb;
  $options = get_stw_options();
  $table_name = $wpdb->prefix . "stw_log";

  if ($options['wp_stw_WidgetText_log_opt'] == 'on' && date('j') == 1 && date('G') == 23)
     $wpdb->query('DELETE FROM '.$table_name.' WHERE Time < '.(time()-2592000));

  if (stw_is_bot() && ($options ['wp_stw_WidgetText_bots_filter'] == 3 ))
     return;

  if ($_SERVER['HTTP_X_FORWARD_FOR'])
       $ip = $_SERVER['HTTP_X_FORWARD_FOR'];
  else
       $ip = $_SERVER['REMOTE_ADDR'];

  $user_count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $table_name where ".time()." - Time <= 3 and IP = '".$ip."'"));

  if (!$user_count) {
    $data = array (
                 'IP' => $ip,
                 'Time' => time(),
                 'IS_BOT'=> stw_is_bot(),
                 'IS_HIT'=> is_hit($ip)
                );
    $format  = array ('%s','%d', '%b','%b');
    $wpdb->insert( $table_name, $data, $format );
  }
?>

<p id="stw_stats_title" class="stwoption"><?php
$ttl = $options['wp_stw_WidgetText_Visitors'];
if ($options['wp_stw_WidgetText_Default_Tab'] == 2)
  $ttl =$options['wp_stw_WidgetText_Hits'];
else if ($options['wp_stw_WidgetText_Default_Tab'] == 3)
         $ttl = $options['wp_stw_WidgetText_Unique'];
echo $ttl;?></p>

<p id="stwmenu"><a href="javascript:stw_show('pages','<?php echo plugins_url('img/loading.gif', __FILE__); ?>', '<?php echo site_url(); ?>')" target="_self"><?php echo ($options['wp_stw_WidgetText_Visitors'] == '' ? 'Pages' : $options['wp_stw_WidgetText_Visitors']); ?></a>|<a href="javascript:stw_show('hits','<?php echo plugins_url('img/loading.gif', __FILE__); ?>', '<?php echo site_url(); ?>')" target="_self" ><?php echo ($options['wp_stw_WidgetText_Hits'] == '' ? 'Hits' : $options['wp_stw_WidgetText_Hits']); ?> </a>|<a href="javascript:stw_show('unique','<?php echo plugins_url('img/loading.gif', __FILE__); ?>', '<?php echo site_url(); ?>')" target="_self" ><?php echo ($options['wp_stw_WidgetText_Unique'] == '' ? 'Unique' : $options['wp_stw_WidgetText_Unique']); ?></a></p>

  <?php $stwuni = ($options['wp_stw_WidgetText_Default_Tab'] == 3); ?>

  <ul>
  <li><?php echo $options["wp_stw_WidgetText_LastDay"].": <span id='stw_lds'>".get_traffic(86400,$stwuni); ?></span></li>
  <li><?php echo $options["wp_stw_WidgetText_LastWeek"].": <span id='stw_lws'>".get_traffic(604800,$stwuni); ?></span></li>
  <li><?php echo $options["wp_stw_WidgetText_LastMonth"].": <span id='stw_lms'>".get_traffic(2592000,$stwuni); ?></span></li>
  <li><?php echo $options["wp_stw_WidgetText_Online"].": ".get_traffic(600, true); ?></li>
  </ul>
<span class="stwlove <?php if ($options['wp_stw_WidgetText_wlink'] != "on") { echo 'stwoption'; } ?>"><?php echo get_option('wp_stw_label_wlink'); ?></span>
<?php
}

function widget_hit_counter($args) {
  extract($args);

  $options = get_stw_options();

  echo $before_widget;
  echo $before_title.$options["wp_stw_WidgetTitle"];
  echo $after_title;
  view();
  echo $after_widget;
}

function stw_is_bot(){

        if (isset($_SESSION['stwrobot']))
           return true;

	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	$bots = array( 'Google Bot' => 'googlebot', 'Google Bot' => 'google', 'MSN' => 'msnbot', 'Alex' => 'ia_archiver', 'Lycos' => 'lycos', 'Ask Jeeves' => 'jeeves', 'Altavista' => 'scooter', 'AllTheWeb' => 'fast-webcrawler', 'Inktomi' => 'slurp@inktomi', 'Turnitin.com' => 'turnitinbot', 'Technorati' => 'technorati', 'Yahoo' => 'yahoo', 'Findexa' => 'findexa', 'NextLinks' => 'findlinks', 'Gais' => 'gaisbo', 'WiseNut' => 'zyborg', 'WhoisSource' => 'surveybot', 'Bloglines' => 'bloglines', 'BlogSearch' => 'blogsearch', 'PubSub' => 'pubsub', 'Syndic8' => 'syndic8', 'RadioUserland' => 'userland', 'Gigabot' => 'gigabot', 'Become.com' => 'become.com', 'Baidu' => 'baidu', 'Yandex' => 'yandex', 'Amazon' => 'amazonaws.com', 'crawl' => 'crawl', 'spider' => 'spider', 'slurp' => 'slurp', 'ebot' => 'ebot' );

	foreach ( $bots as $name => $lookfor )
		if ( stristr( $user_agent, $lookfor ) !== false )
			return true;

        return false;
}

function is_hit ($ip) {

   global $wpdb;
   $table_name = $wpdb->prefix . "stw_log";

   $user_count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $table_name where ".time()." - Time <= 1000 and IP = '".$ip."'"));

   return $user_count == 0;
}

function wp_stw_install_db () {
   global $wpdb;

   $table_name = $wpdb->prefix . "stw_log";
   $gTable = $wpdb->get_var("show tables like '$table_name'");
   $gColumn = $wpdb->get_results("SHOW COLUMNS FROM ".$table_name." LIKE 'IS_BOT'");
   $hColumn = $wpdb->get_results("SHOW COLUMNS FROM ".$table_name." LIKE 'IS_HIT'");

   if($gTable != $table_name) {

      $sql = "CREATE TABLE " . $table_name . " (
           IP VARCHAR( 17 ) NOT NULL ,
           Time INT( 11 ) NOT NULL ,
           IS_BOT BOOLEAN NOT NULL,
           IS_HIT BOOLEAN NOT NULL,
           PRIMARY KEY ( IP , Time )
           );";

      require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
      dbDelta($sql);

   } else {
     if (empty($gColumn)) {  //old table version update

       $sql = "ALTER TABLE ".$table_name." ADD IS_BOT BOOLEAN NOT NULL";
       $wpdb->query($sql);
     }

     if (empty($hColumn)) {  //old table version update

       $sql = "ALTER TABLE ".$table_name." ADD IS_HIT BOOLEAN NOT NULL";
       $wpdb->query($sql);
     }
   }
}

function hit_counter_init() {

  wp_stw_install_db ();
  register_sidebar_widget(__('Simple Traffic Widget'), 'widget_hit_counter');
  register_widget_control(__('Simple Traffic Widget'), 'hit_counter_control', 300, 200 );
}

function uninstall_stw(){

  global $wpdb;
  $table_name = $wpdb->prefix . "stw_log";
  delete_option("widget_hit_counter");
  delete_option("wp_stw_WidgetTitle");
  delete_option("wp_stw_WidgetText_Visitors");
  delete_option("wp_stw_WidgetText_LastDay");
  delete_option("wp_stw_WidgetText_LastWeek");
  delete_option("wp_stw_WidgetText_LastMonth");
  delete_option("wp_stw_WidgetText_Online");
  delete_option("wp_stw_WidgetText_log_opt");
  delete_option("wp_stw_WidgetText_bots_filter");
  delete_option("wp_stw_WidgetText_Hits");
  delete_option("wp_stw_WidgetText_Unique");
  delete_option("wp_stw_WidgetText_Default_Tab");
  $wpdb->query("DROP TABLE IF EXISTS $table_name");
}

function add_stw_stylesheet() {
            wp_register_style('stwStyleSheets', plugins_url('css/stw_styles.css',__FILE__));
            wp_enqueue_style( 'stwStyleSheets');
}

function add_stw_ajax () {
  wp_enqueue_script('stwScripts', plugins_url('js/stw_ajax.js',__FILE__));
}

function stw_ajax_response () {

 $options = get_stw_options();
 $stat = $_REQUEST['reqstats'];

 if ($stat == 'pages')
   echo $options['wp_stw_WidgetText_Visitors'].'~'.get_traffic(86400,false).'~'.get_traffic(604800,false).'~'.get_traffic(2592000,false);
 if ($stat == 'hits')
   echo $options['wp_stw_WidgetText_Hits'].'~'.get_traffic(86400, false ,true).'~'.get_traffic(604800, false, true). '~' . get_traffic(2592000, false, true);
 if ($stat == 'unique')
   echo $options['wp_stw_WidgetText_Unique'].'~'.get_traffic(86400, true).'~'.get_traffic(604800,true).'~'.get_traffic(2592000,true);
die();
}

add_action("plugins_loaded", "hit_counter_init");
add_action('wp_print_styles', 'add_stw_stylesheet');
add_action('init', 'add_stw_ajax');

add_action('wp_ajax_stwstats', 'stw_ajax_response');
add_action('wp_ajax_nopriv_stwstats', 'stw_ajax_response');

register_deactivation_hook( __FILE__, 'uninstall_stw' );

?>
