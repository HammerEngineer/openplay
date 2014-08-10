<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    class Catalog{
        public static function GetDepartments(){
            $sql = 'CALL catalog_get_departments_list()';
            return DatabaseHandler::GetAll($sql);
        }
        
        public static function GetDepartmentDetails($departmentId){
                
                $sql = 'CALL catalog_get_department_details(:department_id)';
                //parameters array
                $params = array (':department_id' => $departmentId);
                return DatabaseHandler::GetRow($sql, $params);
        }
        public static function GetCategoriesInDepartment($departmentId){
           
            $sql = 'CALL catalog_get_categories_list(:department_id)';
            $params = array (':department_id' => $departmentId);
            return DatabaseHandler::GetAll($sql, $params);
        }
        public static function GetCategoryDetails($categoryId){
   
            $sql = 'CALL catalog_get_category_details(:category_id)';
            $params = array (':category_id' => $categoryId);
            return DatabaseHandler::GetRow($sql, $params);
        }
        private static function HowManyPages($countSql, $countSqlParams){
    
            $queryHashCode = md5($countSql . var_export($countSqlParams, true));

    
            if (isset ($_SESSION['last_count_hash']) && isset ($_SESSION['how_many_pages']) && 
                                    $_SESSION['last_count_hash'] === $queryHashCode)
            {
     
                        $how_many_pages = $_SESSION['how_many_pages'];
            }
            else
            {
      
                $items_count = DatabaseHandler::GetOne($countSql, $countSqlParams);
                $how_many_pages = ceil($items_count / PRODUCTS_PER_PAGE);

      
                $_SESSION['last_count_hash'] = $queryHashCode;
                $_SESSION['how_many_pages'] = $how_many_pages;
            }
            
            

            return $how_many_pages;
        }
        public static function GetProductsInCategory($categoryId, $pageNo, &$rHowManyPages){
                $sql = 'CALL catalog_count_products_in_category(:category_id)';
                $params = array (':category_id' => $categoryId);
                
                $rHowManyPages = Catalog::HowManyPages($sql, $params);
                $start_item = ($pageNo - 1) * PRODUCTS_PER_PAGE;

                $sql = 'CALL catalog_get_products_in_category(
                   :category_id, :short_product_description_length,
                   :products_per_page, :start_item)';

                $params = array (
                        ':category_id' => $categoryId,
                        ':short_product_description_length' => SHORT_PRODUCT_DESCRIPTION_LENGTH,
                        ':products_per_page' => PRODUCTS_PER_PAGE,
                        ':start_item' => $start_item);

    
                return DatabaseHandler::GetAll($sql, $params);
        }
        public static function GetProductsOnDepartment($departmentId, $pageNo, &$rHowManyPages){
    
                $sql = 'CALL catalog_count_products_on_department(:department_id)';
                $params = array (':department_id' => $departmentId);

    
                $rHowManyPages = Catalog::HowManyPages($sql, $params);
    
                $start_item = ($pageNo - 1) * PRODUCTS_PER_PAGE;

   
                $sql = 'CALL catalog_get_products_on_department(
                        :department_id, :short_product_description_length,
                        :products_per_page, :start_item)';

    
                $params = array (
                        ':department_id' => $departmentId,
                        ':short_product_description_length' => SHORT_PRODUCT_DESCRIPTION_LENGTH,
                        ':products_per_page' => PRODUCTS_PER_PAGE,
                        ':start_item' => $start_item);

    
                return DatabaseHandler::GetAll($sql, $params);
        }
        public static function GetProductsOnCatalog($pageNo, &$rHowManyPages){
    
                $sql = 'CALL catalog_count_products_on_catalog()';

    
                $rHowManyPages = Catalog::HowManyPages($sql, null);
    
                $start_item = ($pageNo - 1) * PRODUCTS_PER_PAGE;

   
                $sql = 'CALL catalog_get_products_on_catalog(
                                :short_product_description_length,
                                :products_per_page, :start_item)';

    
                $params = array (
                        ':short_product_description_length' => SHORT_PRODUCT_DESCRIPTION_LENGTH,
                        ':products_per_page' => PRODUCTS_PER_PAGE,
                        ':start_item' => $start_item);

    
                return DatabaseHandler::GetAll($sql, $params);
        }
        
        public static function GetProductDetails($productId){
    
            $sql = 'CALL catalog_get_product_details(:product_id)';
            $params = array (':product_id' => $productId);
            return DatabaseHandler::GetRow($sql, $params);
        }
        public static function GetProductLocations($productId){
    
                $sql = 'CALL catalog_get_product_locations(:product_id)';
                $params = array (':product_id' => $productId);
                return DatabaseHandler::GetAll($sql, $params);
        }




    }
?>