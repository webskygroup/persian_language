<?php

namespace Opencart\Catalog\Controller\Extension\PersianLanguage\Startup;

class PersianLanguage extends \Opencart\System\Engine\Controller
{
    public function index(): void
    {
    require_once(DIR_EXTENSION . '/persian_language/system/library/jdf.php');

        if (!defined('WEBSKY_ROUTE_SEPARATOR')) {
        if (version_compare(VERSION, '4.0.2.0', '>=')) {
            define('WEBSKY_ROUTE_SEPARATOR', '.');
        } else {
            define('WEBSKY_ROUTE_SEPARATOR', '|');
        }
        }
        if ($this->config->get('language_traditional_persian_status')) {
           
            $this->event->register('view/account/order_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language'.WEBSKY_ROUTE_SEPARATOR.'view_account_order'));
            $this->event->register('view/account/order_info/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language'.WEBSKY_ROUTE_SEPARATOR.'view_account_order_info'));
            $this->event->register('view/account/order_history/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language'.WEBSKY_ROUTE_SEPARATOR.'view_account_order_history'));
           
            //$this->event->register('controller/*/before', new \Opencart\System\Engine\Action('extension/websky_default/startup/websky_default'.WEBSKY_ROUTE_SEPARATOR.'eventcontroller'));
             $this->event->register('view/account/download/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language'.WEBSKY_ROUTE_SEPARATOR.'view_account_download'));
             $this->event->register('view/account/returns_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language'.WEBSKY_ROUTE_SEPARATOR.'view_account_return'));
             $this->event->register('view/account/reward/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language'.WEBSKY_ROUTE_SEPARATOR.'view_account_reward'));
             $this->event->register('view/account/transaction/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language'.WEBSKY_ROUTE_SEPARATOR.'view_account_transaction'));
             $this->event->register('view/account/subscription/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language'.WEBSKY_ROUTE_SEPARATOR.'view_account_subscription'));
             $this->event->register('view/cms/blog_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language'.WEBSKY_ROUTE_SEPARATOR.'view_cms_blog_list'));
             $this->event->register('view/cms/blog_info/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language'.WEBSKY_ROUTE_SEPARATOR.'view_cms_blog_info'));
             $this->event->register('view/cms/comment/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language'.WEBSKY_ROUTE_SEPARATOR.'view_cms_blog_comment'));
             $this->event->register('view/product/review_list/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language'.WEBSKY_ROUTE_SEPARATOR.'view_product_review'));

             $this->event->register('view/account/returns_info/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_account_returns_info'));                
             $this->event->register('view/account/returns_form/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'view_account_returns_form'));
             $this->event->register('model/account/returns/addReturn/before', new \Opencart\System\Engine\Action('extension/persian_language/startup/persian_language' . WEBSKY_ROUTE_SEPARATOR . 'model_account_returns_addReturn'));

          

        }
    }

  
    
       public function view_account_order(string &$route, array &$args): void
    {
        // print_r($args);
      
        foreach($args['orders'] as $key=>$value){
           $args['orders'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value['date_added'];
        }
                // print_r($args);

        
    }
    
           public function view_account_order_info(string &$route, array &$args): void
    {
     
 
           $args["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($args["date_added"])) : $args['date_added'];
      
                // print_r($args);

        
    }
    public function view_account_order_history(string &$route, array &$args): void
    {
    
      foreach($args['histories'] as $key=>$value){
         $args['histories'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value['date_added'];
      }

        
    }
    public function view_account_download(string &$route, array &$args): void
    {
        // print_r($args);
      
        foreach($args['downloads'] as $key=>$value){
           $args['downloads'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value['date_added'];
        }
                // print_r($args);

        
    }
    
    public function view_account_return(string &$route, array &$args): void
    {
        // print_r($args);
      
        foreach($args['returns'] as $key=>$value){
           $args['returns'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value['date_added'];
        }
                // print_r($args);

        
    }
    
    public function view_account_reward(string &$route, array &$args): void
    {
        // print_r($args);
      
        foreach($args['rewards'] as $key=>$value){
           $args['rewards'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value['date_added'];
        }
                // print_r($args);

        
    }
        
    public function view_account_transaction(string &$route, array &$args): void
    {
        // print_r($args);
      
        foreach($args['transactions'] as $key=>$value){
           $args['transactions'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value['date_added'];
        }
                // print_r($args);

        
    }
    
        public function view_account_subscription(string &$route, array &$args): void
    {
        // print_r($args);
      
        foreach($args['subscriptions'] as $key=>$value){
           $args['subscriptions'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value['date_added'];
        }
        
         foreach($args['subscriptions'] as $key=>$value){
           $args['subscriptions'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value['date_added'];
        }
        
         foreach($args['orders'] as $key=>$value){
           $args['orders'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value['date_added'];
        }
        
         $args["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($args["date_added"])) : $args["date_added"];

        
                // print_r($args);

        
    }
    
         public function view_cms_blog_list(string &$route, array &$args): void
    {
        // print_r($args);
      
        foreach($args['articles'] as $key=>$value){
           $args['articles'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value['date_added'];
        }

         // print_r($args);

        
    }
    
    public function view_cms_blog_info(string &$route, array &$args): void
    {
        // print_r($args);
      
        foreach($args['articles'] as $key=>$value){
           $args['articles'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value['date_added'];
        }
        
         $args["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($args["date_added"])) : $args["date_added"];


         // print_r($args);

        
    }


   public function view_cms_blog_comment(string &$route, array &$args): void
    {
        // print_r($args);
      
        foreach($args['articles'] as $key=>$value){
           $args['articles'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value['date_added'];
        }
        


         // print_r($args);

        
    }
    
       public function view_product_review(string &$route, array &$args): void
    {
        // print_r($args);
      
        foreach($args['reviews'] as $key=>$value){
           $args['reviews'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value['date_added'];
        }
        
}

   public function view_account_returns_info(string &$route, array &$args): void
    {
            //           echo '<pre>'; 

            //     print_r($args);
            //   echo '<pre>'; 

                

         foreach($args['histories'] as $key=>$value){
           $args['histories'][$key]["date_added"] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($value["date_added"])) : $value['date_added'];
        }
    
           $args['date_ordered'] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($args['date_ordered'])) : $args['date_ordered'];
           $args['date_added'] = ($this->language->get('code') == 'fa') ? jdate($this->config->get('language_traditional_persian_shamsidate_format'), strtotime($args['date_added'])) : $args['date_added'];


        //   echo '<pre>';
        // print_r( $args);
        // // print_r( $output);
        // echo '</pre>'; 
        
    }
    

       public function view_account_returns_form(string &$route, array &$args): void
    {
        //print_r($args);
         //  $args['date_ordered'] = ($this->language->get('code') == 'fa') ? gtj($args['date_ordered']) : $args['date_ordered'];


        //   echo '<pre>';
        // print_r( $args);
        // // print_r( $output);
        // echo '</pre>'; 
        
    }

    public function model_account_returns_addReturn(string &$route, array &$args): void
    {
        // print_r($args);

             $args[0]['date_ordered'] =($this->language->get('code') == 'fa') ? jtg($args[0]['date_ordered']) :  $args[0]['date_ordered'] ;

        

        
    }


    
   
}
