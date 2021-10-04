<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php

/**
 * Created by PhpStorm.
 * User: jyde
 * Date: 5/5/2017
 * Time: 3:41 PM
 */
class User_tree_model extends CI_Model
{


    public function userDownlines($generation = 1, $plan_order_no, $user_id){
        $query = $this->db->query($this->downlinesSQL($generation, $plan_order_no, $user_id));
        return $query->result_array();
    }
    private function downlinesSQL($generation, $plan_order_no, $user_id){
        switch($generation){
            case 4:
                return "
                select user_tree.*,
                user_plans.user_id,
                plans.name as user_plan
                from user_tree
                LEFT JOIN user_plans ON user_plans.id = user_tree.user_plan_id
                LEFT JOIN plans ON user_plans.plan_id = plans.id
                WHERE upline_id IN (
                select
                    user_plans.user_id
                from user_tree
                    LEFT JOIN user_plans ON user_plans.id = user_tree.user_plan_id
                    LEFT JOIN plans ON user_plans.plan_id = plans.id
                WHERE upline_id IN (
                    select
                    user_plans.user_id
                    from user_tree
                    LEFT JOIN user_plans ON user_plans.id = user_tree.user_plan_id
                    LEFT JOIN plans ON user_plans.plan_id = plans.id
                    WHERE upline_id IN (
                    SELECT user_plans.user_id
                    from user_tree
                        LEFT JOIN user_plans ON user_plans.id = user_tree.user_plan_id
                        LEFT JOIN plans ON user_plans.plan_id = plans.id
                    WHERE upline_id = (
                        select user_plans.user_id
                        from user_plans
                        left join plans on plans.id = user_plans.plan_id
                        where user_plans.user_id = {$user_id} and plans.order = {$plan_order_no}
                        /*change for certain user and plan*/
                    )
                            AND  plans.id = (
                        select user_plans.plan_id
                        from user_plans
                        left join plans on plans.id = user_plans.plan_id
                        where user_plans.user_id = {$user_id} and plans.order = {$plan_order_no}
                        /*change for certain user and plan*/
                    )
                    )
                        and plans.order = {$plan_order_no}
                ) and plans.order = {$plan_order_no}
                ) and plans.order = {$plan_order_no}
                ";
            case 3:
                return "
                select user_tree.*,
                user_plans.user_id,
                plans.name as user_plan
                from user_tree
                LEFT JOIN user_plans ON user_plans.id = user_tree.user_plan_id
                LEFT JOIN plans ON user_plans.plan_id = plans.id
                WHERE upline_id IN (
                select
                    user_plans.user_id
                from user_tree
                    LEFT JOIN user_plans ON user_plans.id = user_tree.user_plan_id
                    LEFT JOIN plans ON user_plans.plan_id = plans.id
                WHERE upline_id IN (
                    SELECT user_plans.user_id
                    from user_tree
                    LEFT JOIN user_plans ON user_plans.id = user_tree.user_plan_id
                    LEFT JOIN plans ON user_plans.plan_id = plans.id
                    WHERE upline_id = (
                        select user_plans.user_id
                        from user_plans
                            left join plans on plans.id = user_plans.plan_id
                        where user_plans.user_id = {$uesr_id} and plans.order = {$plan_order_no}
                        /*change for certain user and plan*/
                    )
                        AND  plans.id = (
                    select user_plans.plan_id
                    from user_plans
                    left join plans on plans.id = user_plans.plan_id
                    where user_plans.user_id = {$uesr_id} and plans.order = {$plan_order_no}
                    /*change for certain user and plan*/
                    )
                )
                        and plans.order = {$plan_order_no}
                ) and plans.order = {$plan_order_no}
                ";
            case 2:
                return "select user_tree.*,
                user_plans.user_id,
                plans.name as user_plan
                from user_tree
                LEFT JOIN user_plans ON user_plans.id = user_tree.user_plan_id
                LEFT JOIN plans ON user_plans.plan_id = plans.id
                WHERE upline_id IN (
                SELECT user_plans.user_id
                from user_tree
                    LEFT JOIN user_plans ON user_plans.id = user_tree.user_plan_id
                    LEFT JOIN plans ON user_plans.plan_id = plans.id
                WHERE upline_id = (
                    select user_plans.user_id
                    from user_plans
                    left join plans on plans.id = user_plans.plan_id
                    where user_plans.user_id = {$user_id} and plans.order = {$plan_order_no}
                    /*change for certain user and plan*/
                )
                        AND  plans.id = (
                    select user_plans.plan_id
                    from user_plans
                    left join plans on plans.id = user_plans.plan_id
                    where user_plans.user_id = {$user_id} and plans.order = {$plan_order_no}
                    /*change for certain user and plan*/
                )
                )
                and plans.order = {$plan_order_no};
                ";
            case 1:;
            default:
                return "
                SELECT 
                    user_tree.*,
                    user_plans.user_id,
                    plans.name as user_plan
                FROM user_tree
                LEFT JOIN user_plans ON user_plans.id = user_tree.user_plan_id
                LEFT JOIN plans ON plans.id = user_plans.plan_id
                WHERE upline_id = (
                    SELECT user_plans.user_id
                    FROM user_plans
                    LEFT JOIN plans ON plans.id = user_plans.plan_id
                    WHERE user_plans.user_id = {$user_id} and plans.order = {$plan_order_no}
                    /*change for certain user and plan*/
                )
                AND  plans.id = (
                    SELECT user_plans.plan_id
                    FROM user_plans
                    LEFT JOIN plans ON plans.id = user_plans.plan_id
                    WHERE user_plans.user_id = {$user_id} and plans.order = {$plan_order_no}
                    /*change for certain user and plan*/
                )";
        }
    }

    public function userUplines($generation = 1, $plan_order_no, $user_id){
        $query = $this->db->query($this->downlinesSQL($generation, $plan_order_no, $user_id));
        return $query->result_array();
    }
    private function uplinesSQL($generation, $plan_order_no, $user_id){
        switch($generation){
            case 4:
                return "
                    SELECT upline_id, plans.name AS user_plan
                    FROM user_tree
                    LEFT JOIN user_plans ON user_plans.id = user_tree.user_plan_id
                    left join plans on plans.id = user_plans.plan_id
                    WHERE user_plans.user_id = (
                    SELECT upline_id
                    FROM user_tree
                        LEFT JOIN user_plans ON user_plans.id = user_tree.user_plan_id
                        left join plans on plans.id = user_plans.plan_id
                    WHERE user_plans.user_id = (
                        SELECT upline_id
                        FROM user_tree
                        LEFT JOIN user_plans ON user_plans.id = user_tree.user_plan_id
                        left join plans on plans.id = user_plans.plan_id
                        WHERE user_plans.user_id = (
                        SELECT upline_id
                        FROM user_tree
                            LEFT JOIN user_plans ON user_plans.id = user_tree.user_plan_id
                            left join plans on plans.id = user_plans.plan_id
                        WHERE user_plans.user_id = {$user_id} AND  plans.`order` = {$plan_order_no}
                        ) AND  plans.`order` = {$plan_order_no}
                    ) AND  plans.`order` = {$plan_order_no}
                    ) AND  plans.`order` = {$plan_order_no}
                ";
            case 3:
                return "
                    SELECT upline_id, plans.name AS user_plan
                    FROM user_tree
                    LEFT JOIN user_plans ON user_plans.id = user_tree.user_plan_id
                    left join plans on plans.id = user_plans.plan_id
                    WHERE user_plans.user_id = (
                    SELECT upline_id
                    FROM user_tree
                        LEFT JOIN user_plans ON user_plans.id = user_tree.user_plan_id
                        left join plans on plans.id = user_plans.plan_id
                    WHERE user_plans.user_id = (
                        SELECT upline_id
                        FROM user_tree
                        LEFT JOIN user_plans ON user_plans.id = user_tree.user_plan_id
                        left join plans on plans.id = user_plans.plan_id
                        WHERE user_plans.user_id = {$user_id} AND  plans.`order` = {$plan_order_no}
                    ) AND  plans.`order` = {$plan_order_no}
                    ) AND  plans.`order` = {$plan_order_no}
                ";
            case 2:
                return "
                    SELECT upline_id, plans.name AS user_plan
                    FROM user_tree
                    LEFT JOIN user_plans ON user_plans.id = user_tree.user_plan_id
                    left join plans on plans.id = user_plans.plan_id
                    WHERE user_plans.user_id = (
                            SELECT upline_id
                            FROM user_tree
                            LEFT JOIN user_plans ON user_plans.id = user_tree.user_plan_id
                            left join plans on plans.id = user_plans.plan_id
                            WHERE user_plans.user_id = {$uesr_id} AND  plans.`order` = {$plan_order_no}
                    ) AND  plans.`order` = {$plan_order_no}
                ";
            case 1:;
            default:
                return "
                    SELECT upline_id, plans.name AS user_plan
                    FROM user_tree
                    LEFT JOIN user_plans ON user_plans.id = user_tree.user_plan_id
                    left join plans on plans.id = user_plans.plan_id
                    WHERE user_plans.user_id = {$user_id} AND  plans.`order` = {$plan_order_no}
                )";
        }
    }
}







