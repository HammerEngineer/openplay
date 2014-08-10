<?php
// Manages the categories list
class CategoriesList
{
// Public variables for the smarty template
public $mSelectedCategory = 0;
public $mSelectedDepartment = 0;
public $mCategories;

public function __construct(){
        if (isset ($_GET['DepartmentId'])){
                $this->mSelectedDepartment = (int)$_GET['DepartmentId'];
        }
        else{
            trigger_error('DepartmentId not set');
        }
        if (isset ($_GET['CategoryId'])){
            $this->mSelectedCategory = (int)$_GET['CategoryId'];
        }
        
}

public function init(){
    $this->mCategories = Catalog::GetCategoriesInDepartment($this->mSelectedDepartment);

        for ($i = 0; $i < count($this->mCategories); $i++)
                $this->mCategories[$i]['link_to_category'] = Link::ToCategory($this->mSelectedDepartment,
                                                                $this->mCategories[$i]['category_id']);
}

}
?>