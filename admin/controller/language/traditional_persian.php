<?php
namespace Opencart\Admin\Controller\Extension\PersianLanguage\Language;
class TraditionalPersian extends \Opencart\System\Engine\Controller {
	public function index(): void {
		$this->load->language('extension/persian_language/language/traditional_persian');
		$this->load->language('extension/persian_language/module/websky_version');

		$this->document->setTitle($this->language->get('heading_title'));

		$data['breadcrumbs'] = [];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'])
		];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=language')
		];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/persian_language/language/traditional_persian', 'user_token=' . $this->session->data['user_token'])
		];

		$data['save'] = $this->url->link('extension/persian_language/language/traditional_persian.save', 'user_token=' . $this->session->data['user_token']);
		$data['back'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=language');

		$data['language_traditional_persian_status'] = $this->config->get('language_traditional_persian_status');
         

		
        
		$data['shamsidate_formats'] = array();
		$data['shamsidate_formats'][] = array(
			'code' 	=> $this->language->get('date_format_short'),
			'title' => ($this->language->get('code') == 'fa') ? jdate($this->language->get('date_format_short')) : date($this->language->get('date_format_short'))
		);
		$data['shamsidate_formats'][] = array(
			'code' 	=> $this->language->get('date_format_long'),
			'title' => ($this->language->get('code') == 'fa') ? jdate($this->language->get('date_format_long')) : date($this->language->get('date_format_long'))
		);
		$data['shamsidate_formats'][] = array(
			'code' 	=> $this->language->get('datetime_format'),
			'title' => ($this->language->get('code') == 'fa') ? jdate($this->language->get('datetime_format')) : date($this->language->get('datetime_format'))
		);
		$data['shamsidate_formats'][] = array(
			'code' 	=> $this->language->get('datetime_format_short'),
			'title' => ($this->language->get('code') == 'fa') ? jdate($this->language->get('datetime_format_short')) : date($this->language->get('datetime_format_short'))
		);
		$data['shamsidate_formats'][] = array(
			'code' 	=> $this->language->get('datetime_format_long'),
			'title' => ($this->language->get('code') == 'fa') ? jdate($this->language->get('datetime_format_long')) : date($this->language->get('datetime_format_long'))
		);
		$data['language_traditional_persian_shamsidate_format'] = $this->config->get('language_traditional_persian_shamsidate_format');

$data['user_token']	 = $this->session->data['user_token'];
			$data['current_version'] = "1.0.7";
		$data['upgrade'] = false;

	  $url = 'https://opencart-ir.com/version/index.php?route=extension/websky_lastversion/module/websky_lastversion';
       $feilds=array(
            'extension_name'=>'persian_language'
           );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $feilds);
        // Execute post
        $json = curl_exec($ch);
     //   print_r($json);
        if ($json === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        // Close connection
        curl_close($ch);
        $response_info=json_decode($json, true);
		if ($response_info) {
			$data['latest_version'] = $response_info['version_ext'];
			$data['date_added'] =jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($response_info["date_added"]));
			if (!version_compare($data['current_version'], $response_info['version_ext'], '>=')) {
				$data['upgrade'] = true;
			}
		} else {
			$data['latest_version'] = '';
			$data['date_added'] = '';
			$data['log'] = '';
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/persian_language/language/traditional_persian', $data));
	}

	public function save(): void {
		$this->load->language('extension/persian_language/language/traditional_persian');

		$json = [];

		if (!$this->user->hasPermission('modify', 'extension/persian_language/language/traditional_persian')) {
			$json['error'] = $this->language->get('error_permission');
		}

		if (!$json) {
			$this->load->model('setting/setting');

			$this->model_setting_setting->editSetting('language_traditional_persian', $this->request->post);

			$json['success'] = $this->language->get('text_success');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function install(): void {
		if ($this->user->hasPermission('modify', 'extension/language')) {
		    	$this->load->model('localisation/language');
			$language_info = $this->model_localisation_language->getLanguageByCode('fa-ir');

			if (!$language_info) {

				$language_id = $this->model_localisation_language->getLanguage('2');
                if(!$language_id){
				
				// Add language
				$language_data = [
					'name'       => 'فارسی',
					'code'       => 'fa-ir',
					'locale'     => 'fa-ir,fa',
					'extension'  => 'persian_language',
					'status'     => 1,
					'sort_order' => 2
				];
				
			

				$this->model_localisation_language->addLanguage($language_data);
				
			if (is_dir(DIR_EXTENSION . 'persian_language/extension/opencart/')) {
				$this->copyExtensionTranslations(DIR_EXTENSION . '/persian_language/extension/opencart/', DIR_EXTENSION . '/opencart/');
			}
			
			     $this->db->query("DELETE FROM `" . DB_PREFIX . "stock_status` WHERE `language_id` = '" . (int)$language_info['language_id'] . "'"); 
			   $this->db->query("INSERT INTO `" . DB_PREFIX . "stock_status` (`language_id`, `name`) VALUES
                    ( '" . (int)$language_info['language_id'] . "', 'عدم موجودی در انبار'),
                    ( '" . (int)$language_info['language_id'] . "', '2 تا 3 روز دیگر'),
                    ( '" . (int)$language_info['language_id'] . "', 'در انبار(موجود)'),
                    ( '" . (int)$language_info['language_id'] . "', 'پیش سفارش');");
                   $this->db->query("DELETE FROM `" . DB_PREFIX . "order_status` WHERE `language_id` = '" . (int)$language_info['language_id'] . "'"); 
                   $this->db->query("INSERT INTO `" . DB_PREFIX . "order_status` (`order_status_id`, `language_id`, `name`) VALUES
                        (1, '" . (int)$language_info['language_id'] . "', 'در انتظار'),
                        (2, '" . (int)$language_info['language_id'] . "', 'در حال پردازش'),
                        (3, '" . (int)$language_info['language_id'] . "', 'ارسال شده'),
                        (5, '" . (int)$language_info['language_id'] . "', 'کامل شده'),
                        (7, '" . (int)$language_info['language_id'] . "', 'لغو شده'),
                        (8, '" . (int)$language_info['language_id'] . "', 'امتناع شده'),
                        (9, '" . (int)$language_info['language_id'] . "', 'برگشت لغو شده'),
                        (10, '" . (int)$language_info['language_id'] . "', 'ناموفق'),
                        (11, '" . (int)$language_info['language_id'] . "', 'بازپرداخت شده'),
                        (12, '" . (int)$language_info['language_id'] . "', 'برگشت خورده'),
                        (13, '" . (int)$language_info['language_id'] . "', 'وجه برگشت خورده توسط بانک'),
                        (14, '" . (int)$language_info['language_id'] . "', 'منقضی شده'),
                        (15, '" . (int)$language_info['language_id'] . "', 'اقدام شده'),
                        (16, '" . (int)$language_info['language_id'] . "','باطل شده');");
                        
                        $this->db->query("DELETE FROM `" . DB_PREFIX . "stock_status` WHERE `language_id` = '" . (int)$language_info['language_id'] . "'");
                        $this->db->query("INSERT INTO `" . DB_PREFIX . "stock_status` (`language_id`, `name`) VALUES
                        ( '" . (int)$language_info['language_id'] . "', 'عدم موجودی در انبار'),
                        ( '" . (int)$language_info['language_id'] . "', '2 تا 3 روز دیگر'),
                        ( '" . (int)$language_info['language_id'] . "', 'در انبار(موجود)'),
                        ( '" . (int)$language_info['language_id'] . "', 'پیش سفارش');");
                        
                         $this->db->query("DELETE FROM `" . DB_PREFIX . "length_class_description` WHERE `language_id` = '" . (int)$language_info['language_id'] . "'");
                        $this->db->query("INSERT FROM `" . DB_PREFIX . "length_class_description` (`length_class_id`, `language_id`, `title`, `unit`) VALUES
                            (1,'" . (int)$language_info['language_id'] . "', 'سانتی متر', 'cm'),
                            (2, '" . (int)$language_info['language_id'] . "', 'میلی متر', 'mm'),
                            (3,'" . (int)$language_info['language_id'] . "', 'اینچ', 'in');");
                            
                            
               
               
              
			

		  }else {
			$language_data = [
				'name'       => 'فارسی',
				'code'       => 'fa-ir',
				'locale'     => 'fa-ir,fa',
				'extension'  => 'persian_language',
				'status'     => 1,
				'sort_order' => 2
			];
			$this->model_localisation_language->editLanguage('2',$language_data );
		  }
			} else {
				// Edit language
				$this->load->model('localisation/language');
            
               $language_data = [
				'name'       => 'فارسی',
				'code'       => 'fa-ir',
				'locale'     => 'fa-ir,fa',
				'extension'  => 'persian_language',
				'status'     => 1,
				'sort_order' => 2];
				$this->model_localisation_language->editLanguage($language_info['language_id'], $language_data);
			}
		   
		       	$language_info = $this->model_localisation_language->getLanguageByCode('fa-ir');
	        $this->load->model('design/seo_url');
              $seo_url_info = $this->model_design_seo_url->getSeoUrlByKeyword('fa-ir', '0',$language_info['language_id']);
             if (!$seo_url_info){
               
		    	$this->db->query("INSERT INTO `" . DB_PREFIX . "seo_url` SET `store_id` = '0', `language_id` ='" . (int)$language_info['language_id'] . "', `key` = 'language', `value` = 'fa-ir', `keyword` = 'fa-ir', `sort_order` = '-2'");
				
		     }
               $seo_url_info = $this->model_design_seo_url->getSeoUrlByKeyword('information', 0,$language_info['language_id']);
            
			if (!$seo_url_info){
			  
			    	$this->db->query("INSERT INTO `" . DB_PREFIX . "seo_url` SET `store_id` = '0', `language_id` ='" . (int)$language_info['language_id'] . "', `key` = 'route', `value` = 'information/information', `keyword` = 'information', `sort_order` = '-1'");
				$this->db->query("INSERT INTO `" . DB_PREFIX . "seo_url` SET `store_id` = '0', `language_id` ='" . (int)$language_info['language_id'] . "', `key` = 'route', `value` = 'product/product', `keyword` = 'product', `sort_order` = '-1'");
			
				$this->db->query("INSERT INTO `" . DB_PREFIX . "seo_url` SET `store_id` = '0', `language_id` ='" . (int)$language_info['language_id'] . "', `key` = 'route', `value` = 'product/category', `keyword` = 'catalog', `sort_order` = '-1'");
			
				$this->db->query("INSERT INTO `" . DB_PREFIX . "seo_url` SET `store_id` = '0', `language_id` ='" . (int)$language_info['language_id'] . "', `key` = 'route', `value` = 'product/manufacturer', `keyword` = 'brand', `sort_order` = '-1'");
			
		 
             }
			$this->load->model('setting/startup');
              $startup_data_admin = [
            'code' => 'persian_language_startup',
            'action' => 'admin/extension/persian_language/startup/persian_language',
            'status' => 1,
            'sort_order' => 6,
        ];
		$this->model_setting_startup->deleteStartupByCode('persian_language_startup');
        $this->model_setting_startup->addStartup($startup_data_admin);
			
					
        $startup_data_catalog = [
            'code' => 'persian_language_startup_catalog',
            'action' => 'catalog/extension/persian_language/startup/persian_language',
            'status' => 1,
            'sort_order' => 7,
        ];
		$this->model_setting_startup->deleteStartupByCode('persian_language_startup_catalog');
        $this->model_setting_startup->addStartup($startup_data_catalog);
          $this->load->model('user/user_group');
          $extension ='persian_language';
          $this->model_user_user_group->addPermission($this->user->getGroupId(), 'access', 'extension/' . $extension . '/dashboard/chart');
          $this->model_user_user_group->addPermission($this->user->getGroupId(), 'modify', 'extension/' . $extension . '/dashboard/chart' );
          $this->load->model('localisation/currency');
         if(!$this->model_localisation_currency->getCurrencyByCode('RLS')) {
        $currency_data = [
            'title' => 'ریال',
            'code' => 'RLS',
            'symbol_left' => '',
            'symbol_right' => 'ریال',
            'decimal_place' => '0',
            'value' => 10.00000000,
            'status'=>1
        ];
        
		$this->model_localisation_currency->addCurrency($currency_data);
         }
         if(!$this->model_localisation_currency->getCurrencyByCode('TOM')) {
		  $currency_data = [
            'title' => 'تومان',
            'code' => 'TOM',
            'symbol_left' => '',
            'symbol_right' => 'تومان',
            'decimal_place' => '0',
            'value' => 1.00000000,
            'status'=>1
        ];
		$this->model_localisation_currency->addCurrency($currency_data);
		
		 
          
           }
			
			
         
         
		}
	}

	public function uninstall(): void {
		if ($this->user->hasPermission('modify', 'extension/language')) {
			$this->load->model('localisation/language');

			$language_info = $this->model_localisation_language->getLanguageByCode('fa-ir');
			if ($language_info) {
				$this->model_localisation_language->deleteLanguage($language_info['language_id']);
			}
		}
		
		    $this->load->model('setting/startup');
            $this->model_setting_startup->deleteStartupByCode('persian_language_startup');
             $this->model_setting_startup->deleteStartupByCode('persian_language_startup_catalog'); 
	}
	private function copyExtensionTranslations($src, $dst) : void { 
		$dir = opendir($src); 

		if(!is_dir($dst)) {
			mkdir($dst, 0755);
		}

		while( $file = readdir($dir) ) { 

			if (( $file != '.' ) && ( $file != '..' )) {
				if ( is_dir($src . '/' . $file) ) {
					$this->copyExtensionTranslations($src . '/' . $file, $dst . '/' . $file); 
				} else { 
					copy($src . '/' . $file, $dst . '/' . $file); 
				}
			}
		}

		closedir($dir);
	}
	
		public function download(): void {
		$this->load->language('marketplace/marketplace');

		$json = [];

			if (isset($this->request->get['extension_name'])) {
			$extension_name = $this->request->get['extension_name'];
		} else {
			$json['error']= 'extension name null';
		}
		

	
		if (!$this->user->hasPermission('modify', 'marketplace/marketplace')) {
			$json['error'] = $this->language->get('error_permission');
		}

		if (!$json) {
		    


		    	$handle = fopen(DIR_STORAGE . 'marketplace/'.$extension_name.'.ocmod.zip' , 'w');

					$download = $this->get_data('https://opencart-ir.com/dl/'.$extension_name.'.ocmod.zip');

					fwrite($handle, $download);

					fclose($handle);
					
					$this->load->language('marketplace/installer');

	     	$json = [];

		if (!$this->user->hasPermission('modify', 'marketplace/installer')) {
			$json['error'] = $this->language->get('error_permission');
		}

		$this->load->model('setting/extension');

			$file = DIR_STORAGE . 'marketplace/' . $extension_name . '.ocmod.zip';

			if (!is_file($file)) {
				$json['error'] = sprintf($this->language->get('error_file'), $extension_name . '.ocmod.zip');
			}


		if (!$json) {
		  
			// Unzip the files
			$zip = new \ZipArchive();

			if ($zip->open($file)) {
				$total = $zip->numFiles;
				$limit = 200;

				$start = 0;
				$end = $start > ($total - $limit) ? $total : ($start + $limit);

				// Check if any of the files already exist.
				for ($i = $start; $i < $end; $i++) {
					$source = $zip->getNameIndex($i);

					$destination = str_replace('\\', '/', $source);

					// Only extract the contents of the upload folder
					$path = $extension_name . '/' . $destination;
					$base = DIR_EXTENSION;
					$prefix = '';

					// image > image
					if (substr($destination, 0, 6) == 'image/') {
						$path = $destination;
						$base = substr(DIR_IMAGE, 0, -6);
					}

					// We need to store the path differently for vendor folders.
					if (substr($destination, 0, 15) == 'system/storage/') {
						$path = substr($destination, 15);
						$base = DIR_STORAGE;
						$prefix = 'system/storage/';
					}

					// Must not have a path before files and directories can be moved
					$path_new = '';

					$directories = explode('/', dirname($path));

					foreach ($directories as $directory) {
						if (!$path_new) {
							$path_new = $directory;
						} else {
							$path_new = $path_new . '/' . $directory;
						}

						// To fix storage location
						if (!is_dir($base . $path_new . '/') && mkdir($base . $path_new . '/', 0777)) {
						    echo 2;
						//	$this->model_setting_extension->addPath($extension_install_id, $prefix . $path_new);
						}
					}
				//	echo $base . $path;

					// If check if the path is not directory and check there is no existing file
					if (substr($source, -1) != '/') {
					   // echo 'zip://' . $file . '#' . $source, $base . $path;
					    copy('zip://' . $file . '#' . $source, $base . $path);
						if (!is_file($base . $path) && copy('zip://' . $file . '#' . $source, $base . $path)) {
						    echo 1;
						//	$this->model_setting_extension->addPath($extension_install_id, $prefix . $path);
						}
					}
				}

				$zip->close();
				$json['success'] = $this->language->get('text_success');
				$json['text'] = $this->language->get('text_install');

		    	$json['next'] = $this->url->link('extension/persian_language/language/traditional_persian.update', 'user_token=' . $this->session->data['user_token'] . '&extension_name=persian_language', true);
		
					
			//	$this->model_setting_extension->editStatus($extension_install_id, 1);
			} else {
				$json['error'] = $this->language->get('error_unzip');
			}
		}

	
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
		public function update(): void {
		$this->load->language('marketplace/marketplace');

		$json = [];

			if (isset($this->request->get['extension_name'])) {
			$extension_name = $this->request->get['extension_name'];
		} else {
			$json['error']= 'extension name null';
		}
		

	
		if (!$this->user->hasPermission('modify', 'marketplace/marketplace')) {
			$json['error'] = $this->language->get('error_permission');
		}

		if (!$json) {
		    
	     $json['success']= 'extension name null';
		
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
	private	function get_data($url)
{
  $ch = curl_init();
  $timeout = 15;
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}

	 
	
	
}