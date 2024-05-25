<?php

namespace App\Enums\Admin;

use App\Support\Enum;

enum AdminRoles: int
{
    use Enum;

    case SuperAdmin = 1;
    case Admin = 2;
    case Employee = 3;

    public function listRolesAdminAfterCase(){
        $case = [];
        $flag = false;
        $currentCase = $this;
        
        if($currentCase == self::SuperAdmin){
            $flag = true;
            $case = self::cases();
        }

        if(!$flag){
            foreach(self::cases() as $item){
                if($this == $item){
                    $flag = true;   
                }
    
                if($flag){
                    $case[] = $item;
                }
            }
        }
        return $case;
    }

    public function asArraySelectListRolesAdminAfterCase(){
        $case = [];
        $flag = false;
        $currentCase = $this;
        
        if($currentCase == self::SuperAdmin){
            $flag = true;
            $case = self::asSelectArray();
        }

        if(!$flag){
            foreach(self::asSelectArray() as $key => $value){
                if($this->name == $value){
                    $flag = true;   
                }
    
                if($flag){
                    $case[$key] = $value;
                }
            }
        }
        return $case;
    }
}
