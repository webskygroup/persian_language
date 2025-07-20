<?php

namespace Opencart\Admin\Controller\Extension\PersianLanguage\Startup;

class PersianLanguage extends \Opencart\System\Engine\Controller
{
    public function index(): void
    {  
        if(!defined('WEBSKY_ROUTE_SEPARATOR')){
        if (version_compare(VERSION, '4.0.2.0', '>=')) {
            define('WEBSKY_ROUTE_SEPARATOR', '.');
        } else {
            define('WEBSKY_ROUTE_SEPARATOR', '|');
        }
        }
        require_once(DIR_EXTENSION . '/persian_language/system/library/jdf.php');
        if ($this->config->get('language_traditional_persian_status') && $this->language->get('code') == 'fa') {

            $this->event->register('controller/common/header/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'controller_common_header'));
            $this->event->register('view/common/header/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_common_header'));
          
            $this->event->register('view/common/header/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'common_header'));

            //download
            $this->event->register('view/catalog/download_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_catalog_download'));
            $this->event->register('view/catalog/download_report/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_catalog_download_report'));
            
            //product
            $this->event->register('view/catalog/product_report/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_catalog_product_report'));

            //review
             $this->event->register('view/catalog/review_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_catalog_review'));
            
            //article
            $this->event->register('view/cms/article_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_cms_article_list'));

            //marketplace
             $this->event->register('view/marketplace/cron_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_marketplace_cron'));
             $this->event->register('view/marketplace/installer_extension/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_marketplace_installer_extension'));
             $this->event->register('view/marketplace/marketplace_info/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_marketplace_info'));
             $this->event->register('view/marketplace/marketplace_extension/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_marketplace_extension'));
             $this->event->register('view/marketplace/marketplace_comment/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_marketplace_comment'));
             $this->event->register('view/marketplace/marketplace_reply/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_marketplace_reply'));

            //design
             $this->event->register('view/design/theme_history/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_design_theme'));
            
            //sale
            $this->event->register('controller/sale/order/after', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'controller_sale_order'));
            $this->event->register('view/sale/order_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_sale_order'));
            $this->event->register('view/sale/order_info/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_sale_order_form'));
            $this->event->register('view/sale/returns_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_sale_return'));    
            $this->event->register('view/sale/returns_history/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_sale_returns_history'));    
            $this->event->register('view/sale/returns_form/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_sale_return_form'));    
            $this->event->register('view/sale/voucher_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_sale_voucher'));    
            $this->event->register('view/sale/order_invoice/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_sale_order_invoice'));    
            $this->event->register('view/sale/order_shipping/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_sale_order_shipping'));    
            $this->event->register('view/sale/order_history/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_sale_order_history'));    
            $this->event->register('view/sale/subscription_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_sale_subscription_list'));    
            $this->event->register('view/sale/subscription_info/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_sale_subscription_info'));    
            $this->event->register('view/sale/subscription_history/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_sale_subscription_history'));    
            $this->event->register('view/sale/subscription_order/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_sale_subscription_order'));    
            $this->event->register('view/sale/voucher_history/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_sale_voucher_history'));    


            //customer
            $this->event->register('view/customer/customer_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_customer_customer'));                
            $this->event->register('view/customer/customer_approval_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_customer_approval'));                
            $this->event->register('view/customer/gdpr_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_customer_gdpr'));                
            
            //marketing
            $this->event->register('view/marketing/affiliate_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_marketing_affiliate'));                
            $this->event->register('view/marketing/marketing_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_marketing_marketings'));                
            $this->event->register('view/marketing/coupon_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_marketing_coupon'));                
            
            //user
            $this->event->register('view/user/user_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_user_user'));                
            $this->event->register('view/user/api_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_user_api'));                
            $this->event->register('view/user/api_form/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_user_api_form'));                
            $this->event->register('view/user/user_authorize/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_user_user_authorize'));                

            //localisation
            $this->event->register('view/localisation/currency_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_localisation_currency'));                
            $this->event->register('view/localisation/tax_rate_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_localisation_tax_rata'));                
            
            //comment
            $this->event->register('view/cms/comment_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_cms_comment_list'));                

            
            //tool
            $this->event->register('view/tool/upload_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_tool_upload'));                
            $this->event->register('view/tool/backup_history/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_tool_backup_history'));                
            $this->event->register('view/tool/notification_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_tool_notification_list'));                
            $this->event->register('view/tool/upgrade/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_tool_upgrade'));                

            //report
            $this->event->register('view/report/online_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_report_online'));                
            $this->event->register('view/extension/opencart/report/customer_activity_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_report_customer_activity_list'));                
            $this->event->register('view/extension/opencart/report/customer_search_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_report_customer_search_list'));                
            $this->event->register('view/extension/opencart/report/customer_subscription_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_report_customer_subscription_list'));                
            $this->event->register('view/extension/opencart/report/sale_order_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_report_sale_order_list'));                
            $this->event->register('view/extension/opencart/report/sale_return_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_report_sale_return_list'));                
            $this->event->register('view/extension/opencart/report/sale_shipping_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_report_sale_shipping_list'));                
            $this->event->register('view/extension/opencart/report/sale_tax_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_report_sale_tax_list'));                
            $this->event->register('view/extension/opencart/report/customer_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_report_customer_list'));                
             
            //dashboard
            $this->event->register('view/extension/opencart/dashboard/activity_info/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_dashboard_activity_info'));                
            $this->event->register('view/extension/opencart/dashboard/recent_info/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_dashboard_recent_info'));                

            //fraud
            $this->event->register('view/extension/opencart/fraud/ip_ip/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_fraud_ip'));                
  
              
            //model_report
          
             $this->event->register('model/extension/opencart/report/*/*/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_extension_opencart_report'));                
  
            //model_review
            $this->event->register('model/catalog/review/getTotalReviews/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_catalog_review_getTotalReviews'));                
            $this->event->register('model/catalog/review/getReviews/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_catalog_review_getReviews'));                
            
            //model_subscription
            $this->event->register('model/sale/subscription/getSubscriptions/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_sale_subscription_getSubscriptions'));                
            $this->event->register('model/sale/subscription/getTotalSubscriptions/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_sale_subscription_getTotalSubscriptions'));                

            //model_returns
            $this->event->register('model/sale/returns/getTotalReturns/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_sale_returns_getTotalReturns'));                
            $this->event->register('model/sale/returns/getReturns/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_sale_returns_getReturns'));                
            
            //model_customer
            $this->event->register('model/customer/customer/getCustomers/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_customer_customer_getCustomers'));                
            $this->event->register('model/customer/customer/getTotalCustomers/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_customer_customer_getTotalCustomers'));                
            $this->event->register('model/customer/customer_approval/getCustomerApprovals/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_customer_customer_approval_getCustomerApprovals'));                
            $this->event->register('model/customer/customer_approval/getTotalCustomerApprovals/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_customer_customer_approval_getTotalCustomerApprovals'));                
            $this->event->register('model/customer/gdpr/getTotalGdprs/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_customer_gdpr_getTotalGdprs'));                
            $this->event->register('model/customer/gdpr/getGdprs/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_customer_gdpr_getGdprs'));                
            
            //model_marketing
            $this->event->register('model/marketing/affiliate/getAffiliates/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_marketing_affiliate_getAffiliates'));                
            $this->event->register('model/marketing/affiliate/getTotalAffiliates/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_marketing_affiliate_getTotalAffiliates'));                
            $this->event->register('model/marketing/marketing/getMarketings/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_marketing_marketing_getMarketings'));                
            $this->event->register('model/marketing/marketing/getTotalMarketings/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_marketing_marketing_getTotalMarketings'));                
            
            //model_tool
            $this->event->register('model/tool/upload/getTotalUploads/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_tool_upload_getTotalUploads'));                
            $this->event->register('model/tool/upload/getUploads/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_tool_upload_getUploads'));                


          //order model
           $this->event->register('model/sale/order/getOrders/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_sale_order'));                
           $this->event->register('model/sale/order/getTotalOrders/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_sale_order_getTotalOrders'));                

          //
            $this->event->register('model/catalog/product/getSpecials/after', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_catalog_product_getSpecials'));                
           $this->event->register('model/catalog/product/getDiscounts/after', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_catalog_product_getDiscounts'));                
         
          $this->event->register('model/catalog/product/editProduct/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_catalog_product_editProduct'));                
          $this->event->register('model/catalog/product/addProduct/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_catalog_product_addProduct'));                

            $this->event->register('model/catalog/product/addDiscount/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_catalog_product_addDiscount'));                

          //model_review
         $this->event->register('model/catalog/review/getReview/after', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_catalog_review_getReview'));                
         $this->event->register('model/catalog/review/addReview/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_catalog_review_addReview'));                
         $this->event->register('model/catalog/review/editReview/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_catalog_review_editReview'));                
        
        
          //model_coupon
         $this->event->register('model/marketing/coupon/getCoupon/after', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_marketing_coupon_getCoupon'));                
         $this->event->register('model/marketing/coupon/addCoupon/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_marketing_coupon_add_Coupon'));                
        $this->event->register('model/marketing/coupon/editCoupon/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_marketing_coupon_edit_Coupon'));                

            
        $this->event->register('view/common/dashboard/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_common_dashboard'));                

         $this->event->register('view/common/dashboard/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_dashboard_chart_info'));                
                   
            
        
             
        }

    }
    
    public function common_header(string &$route, array &$args, mixed &$output): void
    {
        $override = [
            'common/header',
        ];

        if (in_array($route, $override)) {
       // echo 1;

           // $route = 'extension/persian_language/' . $route;
        }
    }

    public function controller_common_header(string &$route, array &$args): void
    {

        $this->document->addStyle('../extension/persian_language/admin/view/javascript/jquery/datetimepicker/persian-datepicker.min.css');
        $this->document->addScript('../extension/persian_language/admin/view/javascript/jquery/datetimepicker/persian-date.min.js');
        $this->document->addScript('../extension/persian_language/admin/view/javascript/jquery/datetimepicker/persian-datepicker.min.js');
        $this->document->addScript('../extension/persian_language/admin/view/javascript/jquery/datetimepicker/persian.min.js');
       $this->document->addScript('../extension/persian_language/admin/view/javascript/jquery/datetimepicker/opencart-date.js');

    }
    
    public function view_dashboard_activity_info(string &$route, array &$args): void
    {
    
        foreach($args['activities'] as $key=>$value){
            $args['activities'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];

        }
        
    }
    
    public function view_dashboard_recent_info(string &$route, array &$args): void
    {
    
        foreach($args['orders'] as $key=>$value){
            $args['orders'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];

        }
        
    }
    
     public function view_fraud_ip(string &$route, array &$args): void
    {
    
        foreach($args['ips'] as $key=>$value){
            $args['ips'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];

        }
        
    }

    public function controller_sale_order(string &$route, array &$args,mixed &$output): void
    {
      // echo 1;
      //  print_r($args);
    }

    public function view_sale_order(string &$route, array &$args): void
    {
        //echo '<pre>';
       //  print_r( $args['orders']);
        // echo '</pre>';
        foreach($args['orders'] as $key=>$value){
            $args['orders'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];
           $args['orders'][$key]["date_modified"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_modified"])) : $value["date_modified"];
       
        }
        
    }
    
    public function view_sale_order_form(string &$route, array &$args): void
    {
      // echo '<pre>';
        // print_r( $args);
      //  echo '</pre>'; 
     
            $args["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($args["date_added"])) : $args["date_added"];
          $args["date_modified"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($args["date_modified"])) : $args["date_modified"];
       
        
        
    }
    
     public function view_sale_subscription_history(string &$route, array &$args): void
    {
      // echo '<pre>';
        // print_r( $args);
      //  echo '</pre>'; 
        foreach($args['histories'] as $key=>$value){
            $args['histories'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];

        }

        
    }
    
      public function view_sale_subscription_order(string &$route, array &$args): void
    {
      // echo '<pre>';
        // print_r( $args);
      //  echo '</pre>'; 
        foreach($args['orders'] as $key=>$value){
            $args['orders'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];

        }

        
    }
   
     public function view_catalog_download(string &$route, array &$args): void
    {
        
       foreach($args['downloads'] as $key=>$value){
            $args['downloads'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];
       
        }
        

    }
    
     public function view_catalog_download_report(string &$route, array &$args): void
    {
        
       foreach($args['reports'] as $key=>$value){
            $args['reports'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];
       
        }
        

    }
    
      public function view_catalog_product_report(string &$route, array &$args): void
    {
        //print_r($args);
       foreach($args['reports'] as $key=>$value){
            $args['reports'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];
       
        }
        

    }
    
      public function view_catalog_review(string &$route, array &$args): void
    {

        foreach($args['reviews'] as $key=>$value){
            $args['reviews'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];

        }
        

    }

   public function view_marketplace_cron(string &$route, array &$args): void
    {

        foreach($args['crons'] as $key=>$value){
            $args['crons'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];
            $args['crons'][$key]["date_modified"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_modified"])) : $value["date_modified"];
 
        }
        

    }
    
     public function view_marketplace_installer_extension(string &$route, array &$args): void
    {

        foreach($args['extensions'] as $key=>$value){
            $args['extensions'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];

        }
        

    }
    
    public function view_marketplace_info(string &$route, array &$args): void
    {
        // echo "<pre>";
        // print_r($args);
        // echo "</pre>";
            $args["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($args["date_added"])) : $args["date_added"];
            $args["date_modified"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($args["date_modified"])) : $args["date_modified"];
            $args["member_date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime( $args["member_date_added"])) :  $args["member_date_added"];

    }
    
    public function view_marketplace_extension(string &$route, array &$args): void
    {

        foreach($args['downloads'] as $key=>$value){
            $args['downloads'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];

        }
        

    }
    
     public function view_marketplace_comment(string &$route, array &$args): void
    {

        foreach($args['comments'] as $key=>$value){
            $args['comments'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];

        }
        

    }
    
     public function view_marketplace_reply(string &$route, array &$args): void
    {

        foreach($args['replies'] as $key=>$value){
            $args['replies'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];

        }
        

    }
    
    public function view_design_theme(string &$route, array &$args): void
    {
  
        foreach($args['histories'] as $key=>$value){
            $args['histories'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];

        }
        

    }
    
    public function view_sale_subscription(string &$route, array &$args): void
    {
 
        foreach($args['subscriptions'] as $key=>$value){
            $args['subscriptions'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];

        }
        
    }
 
    public function view_sale_return(string &$route, array &$args): void
    {
        // echo '<pre>';
        //  print_r( $args['returns']);
        // echo '</pre>';
        foreach($args['returns'] as $key=>$value){
            $args['returns'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];
           $args['returns'][$key]["date_modified"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_modified"])) : $value["date_modified"];
       
        }
        
    }
    
    public function view_sale_returns_history(string &$route, array &$args): void
    {
        // echo '<pre>';
        //  print_r( $args['returns']);
        // echo '</pre>';
        foreach($args['histories'] as $key=>$value){
            $args['histories'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];

        }
        
    }
    
        public function view_sale_return_form(string &$route, array &$args): void
    {
       
        
    }
    
    public function view_sale_subscription_list(string &$route, array &$args): void
    {
        // echo '<pre>';
        //  print_r( $args['returns']);
        // echo '</pre>';
        foreach($args['subscriptions'] as $key=>$value){
            $args['subscriptions'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];

        }
        
    }
    
      public function view_sale_subscription_info(string &$route, array &$args): void
    {
        // echo '<pre>';
        //  print_r( $args);
        // echo '</pre>';
        
            $args["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($args["date_added"])) : $args["date_added"];

    }
    
    public function view_sale_voucher(string &$route, array &$args): void
    {
     
        foreach($args['vouchers'] as $key=>$value){
            $args['vouchers'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];

        }
        
    }
    
        public function view_sale_voucher_history(string &$route, array &$args): void
    {
     
        foreach($args['histories'] as $key=>$value){
            $args['histories'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];

        }
        
    }
    
    public function view_sale_order_invoice(string &$route, array &$args): void
    {
     
        foreach($args['orders'] as $key=>$value){
            $args['orders'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];

        }
        
    }
    
       public function view_sale_order_shipping(string &$route, array &$args): void
    {
     
        foreach($args['orders'] as $key=>$value){
            $args['orders'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];

        }
        
    }
    
    public function view_sale_order_history(string &$route, array &$args): void
    {
     
        foreach($args['histories'] as $key=>$value){
            $args['histories'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];

        }
        
    }
    
     public function view_customer_customer(string &$route, array &$args): void
    {

        foreach($args['customers'] as $key=>$value){
            $args['customers'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];

        }
        
    }
    
         public function view_customer_approval(string &$route, array &$args): void
    {

        foreach($args['customer_approvals'] as $key=>$value){
            $args['customer_approvals'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];

        }
        
    }
    
         public function view_customer_gdpr(string &$route, array &$args): void
    {

        foreach($args['gdprs'] as $key=>$value){
            $args['gdprs'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];

        }
        
    }
    
          public function view_marketing_affiliate(string &$route, array &$args): void
    {

        foreach($args['affiliates'] as $key=>$value){
            $args['affiliates'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];

        }
        
    }
    
          public function view_marketing_marketings(string &$route, array &$args): void
    {

        foreach($args['marketings'] as $key=>$value){
            $args['marketings'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];

        }
        
    }
          public function view_marketing_coupon(string &$route, array &$args): void
    {

        foreach($args['coupons'] as $key=>$value){
            $args['coupons'][$key]["date_start"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_start"])) : date($this->language->get('date_format_short'), strtotime($value["date_start"]));
            $args['coupons'][$key]["date_end"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_end"])) : date($this->language->get('date_format_short'), strtotime($value["date_end"]));

        }
        
    }
    
    public function view_user_user(string &$route, array &$args): void
    {

        foreach($args['users'] as $key=>$value){
            $args['users'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];

        }
        
    }
    
    public function view_user_api_form(string &$route, array &$args): void
    {

        foreach($args['api_sessions'] as $key=>$value){
            $args['api_sessions'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];
            $args['api_sessions'][$key]["date_modified"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_modified"])) : $value["date_modified"];
        }
        
    }
    
     public function view_user_api(string &$route, array &$args): void
    {

        foreach($args['apis'] as $key=>$value){
            $args['apis'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];
            $args['apis'][$key]["date_modified"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_modified"])) : $value["date_modified"];


        }
        
    }
    
     public function view_user_user_authorize(string &$route, array &$args): void
    {

        foreach($args['authorizes'] as $key=>$value){
            $args['apis'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];


        }
        
    }

    public function view_localisation_currency(string &$route, array &$args): void
    {

        foreach($args['currencies'] as $key=>$value){
            $args['currencies'][$key]["date_modified"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_modified"])) : $value["date_modified"];


        }
        
    }
    
    public function view_localisation_tax_rata(string &$route, array &$args): void
    {

        foreach($args['tax_rates'] as $key=>$value){
            $args['tax_rates'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];
            $args['tax_rates'][$key]["date_modified"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_modified"])) : $value["date_modified"];


        }
        
    }
    
    public function view_tool_upload(string &$route, array &$args): void
    {

        foreach($args['uploads'] as $key=>$value){
        $args['uploads'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];


        }
        
    }
    
     public function view_tool_upgrade(string &$route, array &$args): void
    {

      //  $args["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($args["date_added"])) : $args["date_added"];

        
    }
    
     public function view_tool_notification_list(string &$route, array &$args): void
    {

        foreach($args['notifications'] as $key=>$value){
        $args['notifications'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];

        }
        
    }
    
    public function view_tool_backup_history(string &$route, array &$args): void
    {

        foreach($args['histories'] as $key=>$value){
        $args['histories'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];

        }
        
    }
    
     public function view_report_online(string &$route, array &$args): void
    {

        foreach($args['customers'] as $key=>$value){
        $args['customers'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];
 

        }
        
    }
    
     public function view_report_customer_activity_list(string &$route, array &$args): void
    {
// print_r($args);
        foreach($args['activities'] as $key=>$value){
        $args['activities'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];


        }
        
    }

    public function view_report_customer_search_list(string &$route, array &$args): void
    {
// print_r($args);
        foreach($args['searches'] as $key=>$value){
        $args['searches'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];


        }
        
    }  
    
    public function view_cms_article_list(string &$route, array &$args): void
    {
// print_r($args);
        foreach($args['articles'] as $key=>$value){
        $args['articles'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];


        }
        
    } 
    
    public function view_cms_comment_list(string &$route, array &$args): void
    {
// print_r($args);
        foreach($args['comments'] as $key=>$value){
        $args['comments'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];


        }
        
    }
    
    public function view_report_customer_list(string &$route, array &$args): void
    {
       // echo "<pre>";
       // print_r($args);
       // echo "</pre>";  
 
        // foreach($args['list'] as $key=>$value){
        // $args['list'][$key]["date_start"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_start"])) : $value["date_start"];


        // }
        
    }
    
    public function view_report_customer_subscription_list(string &$route, array &$args): void
    {
     //print_r($args);
        // foreach($args['customers'] as $key=>$value){
        // $args['customers'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value["date_added"];


        // }
        
    }    

    public function view_report_sale_order_list(string &$route, array &$args): void
    {
// print_r($args);
        foreach($args['orders'] as $key=>$value){
        $args['orders'][$key]["date_start"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_start"])) : $value["date_start"];
        $args['orders'][$key]["date_end"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_end"])) : $value["date_end"];

        }
        
    }  
    
    public function view_report_sale_return_list(string &$route, array &$args): void
    {
// print_r($args);
          foreach($args['returns'] as $key=>$value){
        $args['returns'][$key]["date_start"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_start"])) : $value["date_start"];
        $args['returns'][$key]["date_end"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_end"])) : $value["date_end"];

        }
        
    }  
    
    public function view_report_sale_shipping_list(string &$route, array &$args): void
    {
// print_r($args);
        foreach($args['orders'] as $key=>$value){
        $args['orders'][$key]["date_start"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_start"])) : $value["date_start"];
        $args['orders'][$key]["date_end"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_end"])) : $value["date_end"];

        }
        
    } 
    
    public function view_report_sale_tax_list(string &$route, array &$args): void
    {
// print_r($args);
        foreach($args['orders'] as $key=>$value){
        $args['orders'][$key]["date_start"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_start"])) : $value["date_start"];
        $args['orders'][$key]["date_end"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_end"])) : $value["date_end"];


        }
        
    }
    
    public function model_sale_order(string &$route, array &$args): void
    {
        
        foreach($args as $key=>$value){
            if(isset($args[$key]["filter_date_from"])){
            $args[$key]["filter_date_from"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_from"]) : $value["filter_date_from"] ;
            }
            if(isset($args[$key]["filter_date_to"])){
           $args[$key]["filter_date_to"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_to"]) : $value["filter_date_to"] ;
            }
        }
      
        
    }
    
    public function model_sale_order_getTotalOrders(string &$route, array &$args): void
    {
//  print_r($args);
       foreach($args as $key=>$value){
            if(isset($args[$key]["filter_date_to"])){
            $args[$key]["filter_date_to"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_to"]) : $value["filter_date_to"] ;
            }
            if(isset($args[$key]["filter_date_from"])){
           $args[$key]["filter_date_from"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_from"]) : $value["filter_date_from"] ;
            }
        }
  
        
    }
    
    public function model_extension_opencart_report(string &$route, array &$args): void
    {
        // print_r($args);
        
         foreach($args as $key=>$value){
            if(isset($args[$key]["filter_date_start"])){
            $args[$key]["filter_date_start"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_start"]) : $value["filter_date_start"] ;
            }
            if(isset($args[$key]["filter_date_end"])){
           $args[$key]["filter_date_end"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_end"]) : $value["filter_date_end"] ;
            }
                    // print_r($args);

        }
        
         // echo '<pre>';
        // print_r( $args);
       
        // echo '</pre>'; 
        
        
    }

    public function model_catalog_product_getSpecials(string &$route, array &$args,mixed &$output): void
    {
       
        foreach($output as $key=>$value){
            if(isset($output[$key]["date_start"])){
            $output[$key]["date_start"] =($this->language->get('code') == 'fa') ? gtj($value["date_start"]) : $value["date_start"] ;
            }
            if(isset($output[$key]["date_end"])){
           $output[$key]["date_end"] =($this->language->get('code') == 'fa') ? gtj($value["date_end"]) : $value["date_end"] ;
            }
        }
           //echo '<pre>';
        // print_r( $args);
        // print_r( $output);
        // echo '</pre>'; 
        
    }
    
     public function model_catalog_product_getDiscounts(string &$route, array &$args,mixed &$output): void
    {
       
        foreach($output as $key=>$value){
            if(isset($output[$key]["date_start"])){
            $output[$key]["date_start"] =($this->language->get('code') == 'fa') ? gtj($value["date_start"]) : $value["date_start"] ;
            }
            if(isset($output[$key]["date_end"])){
           $output[$key]["date_end"] =($this->language->get('code') == 'fa') ? gtj($value["date_end"]) : $value["date_end"] ;
            }
        }
           //echo '<pre>';
        // print_r( $args);
        // print_r( $output);
        // echo '</pre>'; 
        
    }
    
    public function model_catalog_review_getTotalReviews(string &$route, array &$args): void
    {
 
       foreach($args as $key=>$value){
            if(isset($args[$key]["filter_date_to"])){
            $args[$key]["filter_date_to"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_to"]) : $value["filter_date_to"] ;
            }
            if(isset($args[$key]["filter_date_from"])){
           $args[$key]["filter_date_from"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_from"]) : $value["filter_date_from"] ;
            }
        }
  
        
    }
    
    public function model_catalog_review_getReviews(string &$route, array &$args): void
    {
 
       foreach($args as $key=>$value){
            if(isset($args[$key]["filter_date_to"])){
            $args[$key]["filter_date_to"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_to"]) : $value["filter_date_to"] ;
            }
            if(isset($args[$key]["filter_date_from"])){
           $args[$key]["filter_date_from"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_from"]) : $value["filter_date_from"] ;
            }
        }
  
        
    }
    
    public function model_sale_subscription_getSubscriptions(string &$route, array &$args): void
    {
 
       foreach($args as $key=>$value){
            if(isset($args[$key]["filter_date_to"])){
            $args[$key]["filter_date_to"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_to"]) : $value["filter_date_to"] ;
            }
            if(isset($args[$key]["filter_date_from"])){
           $args[$key]["filter_date_from"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_from"]) : $value["filter_date_from"] ;
            }
        }
  
        
    }
    
    public function model_sale_subscription_getTotalSubscriptions(string &$route, array &$args): void
    {
 
       foreach($args as $key=>$value){
            if(isset($args[$key]["filter_date_to"])){
            $args[$key]["filter_date_to"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_to"]) : $value["filter_date_to"] ;
            }
            if(isset($args[$key]["filter_date_from"])){
           $args[$key]["filter_date_from"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_from"]) : $value["filter_date_from"] ;
            }
        }
  
        
    }
    
    public function model_sale_returns_getReturns(string &$route, array &$args): void
    {
//   print_r($args);

       foreach($args as $key=>$value){
            if(isset($args[$key]["filter_date_to"])){
            $args[$key]["filter_date_to"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_to"]) : $value["filter_date_to"] ;
            }
            if(isset($args[$key]["filter_date_from"])){
           $args[$key]["filter_date_from"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_from"]) : $value["filter_date_from"] ;
            }
        }
  
        
    }
    
    public function model_sale_returns_getTotalReturns(string &$route, array &$args): void
    {
//  print_r($args);
       foreach($args as $key=>$value){
            if(isset($args[$key]["filter_date_to"])){
            $args[$key]["filter_date_to"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_to"]) : $value["filter_date_to"] ;
            }
            if(isset($args[$key]["filter_date_from"])){
           $args[$key]["filter_date_from"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_from"]) : $value["filter_date_from"] ;
            }
        }
  
        
    }
    
    public function model_customer_customer_getCustomers(string &$route, array &$args): void
    {
//   print_r($args);

       foreach($args as $key=>$value){
            if(isset($args[$key]["filter_date_to"])){
            $args[$key]["filter_date_to"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_to"]) : $value["filter_date_to"] ;
            }
            if(isset($args[$key]["filter_date_from"])){
           $args[$key]["filter_date_from"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_from"]) : $value["filter_date_from"] ;
            }
        }
  
        
    }
    
    public function model_customer_customer_getTotalCustomers(string &$route, array &$args): void
    {
//  print_r($args);
       foreach($args as $key=>$value){
            if(isset($args[$key]["filter_date_to"])){
            $args[$key]["filter_date_to"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_to"]) : $value["filter_date_to"] ;
            }
            if(isset($args[$key]["filter_date_from"])){
           $args[$key]["filter_date_from"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_from"]) : $value["filter_date_from"] ;
            }
        }
  
        
    }
    
    public function model_customer_customer_approval_getCustomerApprovals(string &$route, array &$args): void
    {
//   print_r($args);

       foreach($args as $key=>$value){
            if(isset($args[$key]["filter_date_to"])){
            $args[$key]["filter_date_to"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_to"]) : $value["filter_date_to"] ;
            }
            if(isset($args[$key]["filter_date_from"])){
           $args[$key]["filter_date_from"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_from"]) : $value["filter_date_from"] ;
            }
        }
  
        
    }
    
    public function model_customer_customer_approval_getTotalCustomerApprovals(string &$route, array &$args): void
    {
//  print_r($args);
       foreach($args as $key=>$value){
            if(isset($args[$key]["filter_date_to"])){
            $args[$key]["filter_date_to"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_to"]) : $value["filter_date_to"] ;
            }
            if(isset($args[$key]["filter_date_from"])){
           $args[$key]["filter_date_from"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_from"]) : $value["filter_date_from"] ;
            }
        }
  
        
    }
    
     public function model_customer_gdpr_getGdprs(string &$route, array &$args): void
    {
//   print_r(111);

       foreach($args as $key=>$value){
            if(isset($args[$key]["filter_date_to"])){
            $args[$key]["filter_date_to"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_to"]) : $value["filter_date_to"] ;
            }
            if(isset($args[$key]["filter_date_from"])){
           $args[$key]["filter_date_from"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_from"]) : $value["filter_date_from"] ;
            }
        }
  
        
    }
    
    public function model_customer_gdpr_getTotalGdprs(string &$route, array &$args): void
    {
//  print_r($args);
       foreach($args as $key=>$value){
            if(isset($args[$key]["filter_date_to"])){
            $args[$key]["filter_date_to"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_to"]) : $value["filter_date_to"] ;
            }
            if(isset($args[$key]["filter_date_from"])){
           $args[$key]["filter_date_from"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_from"]) : $value["filter_date_from"] ;
            }
        }
  
        
    }
    
    public function model_marketing_affiliate_getAffiliates(string &$route, array &$args): void
    {
//  print_r($args);

       foreach($args as $key=>$value){
            if(isset($args[$key]["filter_date_to"])){
            $args[$key]["filter_date_to"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_to"]) : $value["filter_date_to"] ;
            }
            if(isset($args[$key]["filter_date_from"])){
           $args[$key]["filter_date_from"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_from"]) : $value["filter_date_from"] ;
            }
        }
        // print_r($args);

  
        
    }
    
    public function model_marketing_affiliate_getTotalAffiliates(string &$route, array &$args): void
    {
//  print_r($args);
       foreach($args as $key=>$value){
            if(isset($args[$key]["filter_date_to"])){
            $args[$key]["filter_date_to"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_to"]) : $value["filter_date_to"] ;
            }
            if(isset($args[$key]["filter_date_from"])){
           $args[$key]["filter_date_from"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_from"]) : $value["filter_date_from"] ;
            }
        }
  
        
    }
    
    public function model_marketing_marketing_getMarketings(string &$route, array &$args): void
    {
//  print_r($args);

       foreach($args as $key=>$value){
            if(isset($args[$key]["filter_date_to"])){
            $args[$key]["filter_date_to"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_to"]) : $value["filter_date_to"] ;
            }
            if(isset($args[$key]["filter_date_from"])){
           $args[$key]["filter_date_from"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_from"]) : $value["filter_date_from"] ;
            }
        }
  
        
    }
    
    public function model_marketing_marketing_getTotalMarketings(string &$route, array &$args): void
    {
//  print_r($args);
       foreach($args as $key=>$value){
            if(isset($args[$key]["filter_date_to"])){
            $args[$key]["filter_date_to"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_to"]) : $value["filter_date_to"] ;
            }
            if(isset($args[$key]["filter_date_from"])){
           $args[$key]["filter_date_from"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_from"]) : $value["filter_date_from"] ;
            }
        }
  
        
    }
    
    public function model_tool_upload_getUploads(string &$route, array &$args): void
    {
//  print_r($args);

       foreach($args as $key=>$value){
            if(isset($args[$key]["filter_date_to"])){
            $args[$key]["filter_date_to"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_to"]) : $value["filter_date_to"] ;
            }
            if(isset($args[$key]["filter_date_from"])){
           $args[$key]["filter_date_from"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_from"]) : $value["filter_date_from"] ;
            }
        }
  
        
    }
    
    public function model_tool_upload_getTotalUploads(string &$route, array &$args): void
    {
//  print_r($args);
       foreach($args as $key=>$value){
            if(isset($args[$key]["filter_date_to"])){
            $args[$key]["filter_date_to"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_to"]) : $value["filter_date_to"] ;
            }
            if(isset($args[$key]["filter_date_from"])){
           $args[$key]["filter_date_from"] =($this->language->get('code') == 'fa') ? jtg($value["filter_date_from"]) : $value["filter_date_from"] ;
            }
        }
  
        
    }
    
    
     public function model_catalog_product_editProduct(string &$route, array &$args): void
    {
      echo 1; 
       if(isset($args[1]['product_discount'] )){
        foreach($args[1]['product_discount'] as $key=>$value){
             $args[1]['product_discount'][$key]['date_start'] =($this->language->get('code') == 'fa') ? jtg($value['date_start']) : $value['date_start'] ;
              $args[1]['product_discount'][$key]['date_end'] =($this->language->get('code') == 'fa') ? jtg($value['date_end']) : $value['date_end'] ;
           
        }
        echo 3;
            
        }
        if(isset($args[1]['product_special'] )){
           foreach($args[1]['product_special'] as $key=>$value){
             $args[1]['product_special'][$key]['date_start'] =($this->language->get('code') == 'fa') ? jtg($value['date_start']) : $value['date_start'] ;
              $args[1]['product_special'][$key]['date_end'] =($this->language->get('code') == 'fa') ? jtg($value['date_end']) : $value['date_end'] ;
           
        }
      }
      //   print_r($args[1]['product_discount']);
  
        
    }
    
   public function model_catalog_product_addProduct(string &$route, array &$args): void
    {
       
        if(isset($args[1]['product_discount'] )){ 
        foreach($args[1]['product_discount'] as $key=>$value){
             $args[1]['product_discount'][$key]['date_start'] =($this->language->get('code') == 'fa') ? jtg($value['date_start']) : $value['date_start'] ;
              $args[1]['product_discount'][$key]['date_end'] =($this->language->get('code') == 'fa') ? jtg($value['date_end']) : $value['date_end'] ;
           
        }
       }
       if(isset($args[1]['product_special'] )){
           foreach($args[1]['product_special'] as $key=>$value){
             $args[1]['product_special'][$key]['date_start'] =($this->language->get('code') == 'fa') ? jtg($value['date_start']) : $value['date_start'] ;
              $args[1]['product_special'][$key]['date_end'] =($this->language->get('code') == 'fa') ? jtg($value['date_end']) : $value['date_end'] ;
           
        }
    }
      //   print_r($args[1]['product_discount']);
  
        
    }

    public function model_catalog_product_addDiscount(string &$route, array &$args): void
    {
       
       
         print_r($args);
  
        
    }
 
    public function model_catalog_review_getReview(string &$route, array &$args,mixed &$output): void
    {
        
       
    
            if(isset($output["date_added"])){
          $output["date_added"] =($this->language->get('code') == 'fa') ? gtj($output["date_added"]) : $output["date_added"] ;
            
        }
        //   echo '<pre>';
        // print_r( $args);
        // print_r( $output);
        // echo '</pre>'; 
        
    }
    
     public function model_catalog_review_addReview(string &$route, array &$args): void
    {
    //   print_r($args);
             $args[0]['date_added'] =($this->language->get('code') == 'fa') ? jtg($args[0]['date_added']) :  $args[0]['date_added'] ;


        
    }
    
    public function model_catalog_review_editReview(string &$route, array &$args): void
    {
       
             $args[1]['date_added'] =($this->language->get('code') == 'fa') ? jtg($args[1]['date_added']) :  $args[1]['date_added'] ;
 
        

        
    }
    
    public function model_marketing_coupon_getCoupon(string &$route, array &$args,mixed &$output): void
    {
    
            if(isset($output["date_start"])){
          $output["date_start"] =($this->language->get('code') == 'fa') ? gtj($output["date_start"]) : $output["date_start"] ;
            
        }
        
                if(isset($output["date_end"])){
          $output["date_end"] =($this->language->get('code') == 'fa') ? gtj($output["date_end"]) : $output["date_end"] ;
            
        }
        //   echo '<pre>';
        // print_r( $args);
        // print_r( $output);
        // echo '</pre>'; 
        
    }
    
        
    public function model_marketing_coupon_add_Coupon(string &$route, array &$args): void
    {
        // print_r($args);
       
             $args[0]['date_start'] =($this->language->get('code') == 'fa') ? jtg($args[0]['date_start']) :  $args[0]['date_start'] ;
              $args[0]['date_end'] =($this->language->get('code') == 'fa') ? jtg($args[0]['date_end']) :  $args[0]['date_end'] ;

        

        
    }
    
         
    public function model_marketing_coupon_edit_Coupon(string &$route, array &$args): void
    {
        // print_r($args);
        
             $args[1]['date_start'] =($this->language->get('code') == 'fa') ? jtg($args[1]['date_start']) :  $args[1]['date_start'] ;
              $args[1]['date_end'] =($this->language->get('code') == 'fa') ? jtg($args[1]['date_end']) :  $args[1]['date_end'] ;

     
    }
     public function view_dashboard_chart_info(string &$route, array &$args): void 
    { 
       
          foreach($args['rows'][1] as $key=>$value){
               if($args['rows'][1][$key]['code']=='chart'){
                  $args['rows'][1][$key]['output']=$this->load->controller('extension/persian_language/dashboard/chart.dashboard'); 
               }
          }
           // print_r($output);  
         //  echo '<pre>';
       //  print_r( $args['rows'][1]);
        // echo '</pre>'; 
       // $route="extension/opencart/dashboard/chart_info2";
        //return $this->load->view('extension/opencart/dashboard/chart_info', $data);
        //return $this->load->view('extension/opencart/dashboard/chart_info2', $args);
            // $args[1]['date_start'] =($this->language->get('code') == 'fa') ? jtg($args[1]['date_start']) :  $args[1]['date_start'] ;
        // $args [1]['date_end'] =($this->language->get('code') == 'fa') ? jtg($args[1]['date_end']) :  $args[1]['date_end'] ;
        
        
    }
    
    
}