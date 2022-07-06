<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Seo extends BaseModel
{
    protected $table = 'seo';

    public static function getSeo($models = [], $description = null, $image = null){
        $systemSetting = \App\SystemSetting::withDescription()->first();
        if(!is_array($models)){
            $models = [$models];
        }
        $mainModel = $models[0] ?? null;
        $seo['title'] = self::getPageTitle($models, $systemSetting);

        if(!empty($description)){
            $seo['description'] = $description;
        }else{
            $seo['description'] = (isset($mainModel->seo->language->description) && $mainModel->seo->language->description) ? $mainModel->seo->language->description : $systemSetting->page_description;
        }

        if(!empty($image)){
            $seo['og_image'] = $image;
        }else{
            $seo_model = $mainModel->seo ?? $systemSetting;
            $seo['og_image'] = $seo_model->getMedia('og_image')->path ?? $systemSetting->getMedia('og_image')->path ?? null;
        }

        return $seo;
    }

    public static function getPageTitle($models, $systemSetting){
        $modelsTitle = [];

        foreach ($models as $model) {
            if(is_string($model)){
                array_push($modelsTitle, $model);
            }else{
                if(!$model){
                    continue;
                }
                if(isset($model->seo->language->title) && !empty($model->seo->language->title)){
                    array_push($modelsTitle, $model->seo->language->title);
                }
                $parent = $model->parent;
                while ($parent) {
                    if(isset($parent->seo->language->title) && !empty($parent->seo->language->title)){
                        array_push($modelsTitle, $parent->seo->language->title);
                    }
                    $parent = $parent->parent;
                }
            }
        }
    
        array_push($modelsTitle, $systemSetting->page_title);

        return implode(' - ', $modelsTitle);
    }

}
