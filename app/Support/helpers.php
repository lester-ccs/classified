<?php
/**
 * Created by PhpStorm.
 * User: Lester Hurtado
 * Date: 7/1/17
 * Time: 10:20 AM
 */

if (! function_exists('parseTree')) {
    function parseTree($tree, $root = null) {
        $return = array();
        # Traverse the tree and search for direct children of the root
        foreach($tree as $child => $parent) {
            # A direct child is found
            if($parent == $root) {
                # Remove item from tree (we don't need to traverse this again)
                unset($tree[$child]);
                # Append the child into result array and parse its children
                $return[] = array(
                    'name' => $child,
                    'children' => parseTree($tree, $child)
                );
            }
        }
        return empty($return) ? null : $return;
    }
}