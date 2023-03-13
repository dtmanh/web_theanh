<?php
/*
 * Class Menu Recursive
 */
class Recursive{
    public function buildRecursive($data,$parents = 0){
        $resourceArr = array();
        $this->getMenu($data,$parents,1,$resourceArr);
        return $resourceArr;
    }
    public function getMenu($data, $parents= 0,$level = 1,&$resourceArr) {
        if(count($data) > 0)
        {
            foreach($data as $key => $value)
            {
                if($value['parent_id'] == $parents)
                {
                    $value['level'] = $level;
                    $resourceArr[] = $value;
                    $newParent = $value['id'];
                    unset($data[$key]);
                    $this->getMenu($data,$newParent,$level + 1,$resourceArr);
                }
            }
        }
    }


}
?>
