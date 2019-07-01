<?php
/**
 * Created by PhpStorm.
 * User: yingwenjie
 * Date: 2019/6/27
 * Time: 10:29 AM
 */
namespace App\Models\Traits;

trait TreeTrait
{

    /**
     * 获取分类树
     *
     * @param array     $list    数组
     * @param integer   $id      父级ID
     * @param integer   $level   等级
     * @param string    $adds    字符串
     * @param array     $type_arr 集合数组
     * @return array
     */
    public function treeList($list, $id = 0, $level = 0, $nbsp = '&nbsp;', $adds = '', &$type_arr = array()) {
        $number = 1;
        $icon  = array('│ ', '├─ ', '└─ ');
        $child = $this->treeCate($list, $id);
        if (is_array($child)) {
            $total = count($child);
            foreach ($child as $val) {
                $j = $k = '';
                if ($number == $total) {
                    $j .= $icon[2];
                    $k = $adds ? $nbsp : '';
                } else {
                    $j .= $icon[1];
                    $k = $adds ? $icon[0] : '';
                }
                $spacer = $adds ? $adds . $j : '';
                $nbsp1 = $nbsp;
                $val['level']      = $level;
                $val['number']     = $number;
                $val['total']      = $total;
                $val['title_show'] = $spacer;
                $type_arr[$val['id']] = $val;
                $this->treeList($list, $val['id'], $level+1, $nbsp, ($adds . $k . $nbsp1), $type_arr);
                $number++;
            }
        }
        return $type_arr;
    }

    /**
     * 获取分类某类别
     *
     * @param integer   $id      分类ID
     * @param array     $list    数组
     * @return array|mixed
     */
    public function treeCate($list, $id = 0, $pid = 'parent_id') {
        $child = array();
        if (is_array($list)) {
            foreach ($list as $key => $val) {
                if ($val[$pid] == $id) $child[$key] = $val;
            }
        }
        return $child ? $child : false;
    }

    /**
     * @param $list
     * @param string $pk
     * @param string $pid
     * @param string $child
     * @param int $root
     * @return array
     * 把返回的数据集转换成Tree
     */
    public function listToTree($list, $pk = 'id', $pid = 'parent_id', $child = 'children', $root = 0) {
        $tree = array();
        static $level = array();
        if (is_array($list)) {
            // 创建基于主键的数组引用
            $refer = array();
            foreach ($list as $key => $data) {
                $refer[$data[$pk]] = &$list[$key];
            }
            foreach ($list as $key => $data) {
                // 判断是否存在parent
                $parentId = $data[$pid];
                if ($root == $parentId) {
                    $list[$key]['level'] = 0;
                    $tree[] = &$list[$key];
                } else {
                    if (isset($refer[$parentId])) {
                        $parent = & $refer[$parentId];
                        $level[$data[$pk]] = $level[$parentId]+1;
                        $list[$key]['level'] = $level[$data[$pk]];
                        $parent[$child][] = &$list[$key];
                    }
                }
            }
        }
        return $tree;
    }

}