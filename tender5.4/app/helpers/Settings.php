<?php

function getSetting($name){
    return App\setting::where('name' , $name)->first()->body;
}
function contu(){
    return App\users::where(['active' => 0])->where('users_type','<>','1')->get()->count();
}
function contm(){
    return App\contact::count();;
}
function getdayarb($day){
    $days_name=[
        'Saturday'=>'السبت',
        'Sunday'=>'الاحد',
        'Monday'=>'الاثنين',
        'Tuesday'=>'الثلاثاء',
        'Wednesday'=>'الاربعاء',
        'Thursday'=>'الخميس',
        'Friday'=>'الجمعه'];
    return $days_name[$day];
}



 function create_item($item)
{
    $item_all[]=[
        'item.id'=>$item[0]->id
        ,'item.title'=>$item[0]->title
        ,'item.decs'=>$item[0]->decs
        ,'item.image_url'=>$item[0]->image_url
        ,'item.company_name'=>$item[0]->company_name
        ,'item.category'=>array($item[0]->category)
        ,'item.newspaper'=>$item[0]->newspaper
        ,'item.date'=>$item[0]->date
        ,'item.newspaper_id'=>$item[0]->newspaper_id
    ];
    for ($ii = 1; $ii < count($item); $ii++)
    {
        $i=0;
        $flag=0;
        foreach($item_all as $id)
        {if ($id['item.id'] === $item[$ii]->id)
        {$item_all[$i]['item.category'][]=$item[$ii]->category;$flag=1;}$i++;}
        if($flag===0)
        {
            $item_all[]=[
                'item.id'=>$item[$ii]->id
                ,'item.title'=>$item[$ii]->title
                ,'item.decs'=>$item[$ii]->decs
                ,'item.image_url'=>$item[$ii]->image_url
                ,'item.company_name'=>$item[$ii]->company_name
                ,'item.category'=>array($item[$ii]->category)
                ,'item.newspaper'=>$item[$ii]->newspaper
                ,'item.date'=>$item[$ii]->date
                ,'item.newspaper_id'=>$item[$ii]->newspaper_id];
        }
    }
    return $item_all;
}
?>