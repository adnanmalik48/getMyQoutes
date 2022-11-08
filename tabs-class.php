<?php

// Block direct access to file
defined( 'ABSPATH' ) or die( 'Not Authorized!' );

class Getmyqoute_main_class {

    public function __construct() {

        // Plugin uninstall hook
        register_uninstall_hook( GMQ_FILE, array('Getmyqoute Plugin', 'plugin_uninstall') );

        // Plugin activation/deactivation hooks
        register_activation_hook( GMQ_FILE, array($this, 'plugin_activate') );
        register_deactivation_hook( GMQ_FILE, array($this, 'plugin_deactivate') );

        // Plugin Actions
        add_action( 'plugins_loaded', array($this, 'plugin_init') );
  
        add_action( 'admin_menu', array($this, 'plugin_admin_menu_function') );
       //frontend 
       require_once( GMQ_DIRECTORY . '/frontend/frontend-class.php' );
       //admin-settings
       require_once( GMQ_DIRECTORY . '/admin-settings/admin-class.php' );
       
    }

    public static function plugin_uninstall() { }

    /**
     * Plugin activation function
     * called when the plugin is activated
     * @method plugin_activate
     */
    public function plugin_activate() {  }

    /**
     * Plugin deactivate function
     * is called during plugin deactivation
     * @method plugin_deactivate
     */
    public function plugin_deactivate() { }

    /**
     * Plugin init function
     * init the polugin textDomain
     * @method plugin_init
     */
    function plugin_init() {
        // before all load plugin text domain
        load_plugin_textDomain( GMQ_TEXT_DOMAIN, false, dirname(GMQ_DIRECTORY_BASENAME) . '/languages' );
    }

    function plugin_admin_menu_function() {
        //Admin Main menu
        add_menu_page( 'Get My Qoute', 'Get My Qoute', 'manage_options', 'getmyqoute_plugin', 'admin_page_tabs', 'dashicons-calculator', 110 );

        //label setting Menu
        add_submenu_page( 'getmyqoute_plugin', 'Label Settings', 'Label Settings', 'manage_options', 'label_settings', 'admin_page_tabs' );

         //rate setting Menu
         add_submenu_page( 'getmyqoute_plugin', 'Rate Settings', 'Rate Settings', 'manage_options', 'rate_settings', 'admin_page_tabs' );
         
         //User Guide setting Menu
         add_submenu_page( 'getmyqoute_plugin', 'User Guide', 'User Guide', 'manage_options', 'user_guide', 'admin_page_tabs' );

         //User Guide setting Menu
         add_submenu_page( 'getmyqoute_plugin', 'Dropdown Settings', 'Dropdown Settings', 'manage_options', 'dropdown_settings', 'admin_page_tabs' );

    }
 


}
//Tabs Function
function admin_page_tabs() {
    // check user capabilities
    if ( ! current_user_can( 'manage_options' ) ) {
      return;
    }
    //Get the active tab from the $_GET param
    $default_tab = null;
    $tab = isset($_GET['tab']) ? $_GET['tab'] : $default_tab;
    ?>
    <div class="wrap">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
      <!-- Here are our tabs -->
      <nav class="nav-tab-wrapper">
        <!-- Connection tab -->
        <a href="?page=getmyqoute_plugin" class="nav-tab <?php if($tab===null):?>nav-tab-active<?php endif; ?>">Connection</a>

        <!-- Label setting tab -->
        <a href="?page=label_settings&tab=label_settings" class="nav-tab <?php if($tab==='label_settings'):?>nav-tab-active<?php endif; ?>">Label Settings</a>

        <!-- Rate setting tab -->
        <a href="?page=rate_settings&tab=rate_settings" class="nav-tab <?php if($tab==='rate_settings'):?>nav-tab-active<?php endif; ?>">Rate settings</a>

        <!-- Dropdown Setting tab -->
        <a href="?page=dropdown_settings&tab=dropdown_settings" class="nav-tab <?php if($tab==='dropdown_settings'):?>nav-tab-active<?php endif; ?>">Dropdown Settings</a>

        <!-- User Guide tab -->
        <a href="?page=user_guide&tab=user_guide" class="nav-tab <?php if($tab==='user_guide'):?>nav-tab-active<?php endif; ?>">User Guide</a>

    
      </nav>
  
      <div class="tab-content">
      <?php switch($tab) :
        case 'label_settings':
        require_once( GMQ_DIRECTORY . '/admin-settings/includes/gmq-label-settings.php' );
          break;
        case 'rate_settings':
            require_once( GMQ_DIRECTORY . '/admin-settings/includes/gmq-rate-settings.php' );
          break;
          case 'dropdown_settings':
            require_once( GMQ_DIRECTORY . '/admin-settings/includes/gmq-dropdown-settings.php' );
          break; 
        case 'user_guide':
            require_once( GMQ_DIRECTORY . '/admin-settings/includes/gmq-user-guide.php' );
          break; 
        
        default:
        require_once( GMQ_DIRECTORY . '/admin-settings/includes/gmq-connection-settings.php' );
          break;
      endswitch; ?>
      </div>
    </div>
    <?php
  }
new Getmyqoute_main_class;
    