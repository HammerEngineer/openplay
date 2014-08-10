<?php
class StoreFront
{
  public $mSiteUrl;
  public $mContentsCell = 'blank.tpl';
  public $mCategoriesCell = 'blank.tpl';
  // Class constructor
  public function __construct()
  {
    $this->mSiteUrl = Link::Build('');
  }
  
  public function init()
  {
        // Load department details if visiting a department
        if (isset ($_GET['DepartmentId']))
        {
            $this->mContentsCell = 'department.tpl';
            $this->mCategoriesCell = 'categories_list.tpl';
        }
  }
}
?>