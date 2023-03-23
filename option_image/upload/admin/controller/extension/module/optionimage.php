<?php
class ControllerExtensionModuleOptionImage extends Controller {
    private $error = array();
	const DEFAULT_MODULE_SETTINGS = [
		'name' => 'Opção por imagem',
		'status' => 1 /* Enabled by default*/
	];

    public function install() {
		$this->load->model('setting/setting');
		$this->model_setting_setting->editSetting('module_optionimage', ['module_optionimage_status'=>1]);

		$this->db->query("ALTER TABLE `". DB_PREFIX ."product_option_value`
		ADD COLUMN `option_image` varchar(255) after `weight_prefix`;");
		
	}
 
    public function uninstall() {
		$this->load->model('setting/setting');
 		$this->model_setting_setting->deleteSetting('module_optionimage');

		$this->db->query("ALTER TABLE `". DB_PREFIX ."product_option_value`
		DROP COLUMN `option_image`;");
	}
}