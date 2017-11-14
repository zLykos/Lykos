<?php
namespace app\home\model;
use think\Model;
use think\Db;
class ThingModel extends Model
{
    public function Thing($data1, $data2, $data3, $data4)
    {
//        $sql1 = Db::table("mq_user_message")->insert($data1);
//        $sql2 = Db::table("mq_user_study")->insert($data2);
//        $sql3 = Db::table("mq_user_work")->insert($data3);
//         $sql4 =  Db::table('mq_user_resume')->insert($data4);
//            var_dump($sql4);
        Db::startTrans();//开启事物
        try{
            //基本信息
           Db::table("mq_user_message")->insert($data1);
            //教育经历
            Db::table("mq_user_study")->insert($data2);
            //工作经历
            Db::table("mq_user_work")->insert($data3);
            //自我评价
            Db::table('mq_user_resume')->insert($data4);
            Db::commit(); //事物提交
            return true;
        }catch (\Exception $e){
            Db::rollback(); //事物回滚
            return false;
        }
    }
    public function ThingJoin($id){
//        $res = Db::table('mq_user_message')
//                ->alias('a')
//                ->join('mq_user_study b','a.user_id = b.user_id')
//                ->join('mq_user_work c','a.user_id = c.user_id')
//                ->join('mq_user_resume d','a.user_id = d.user_id')
//                ->where($id)
//                ->select();
        $sql1 =Db::table('mq_user_message')->where('user_id',$id)->select();
        $sql2 =Db::table('mq_user_study')->where('user_id',$id)->select();
        $sql3 =Db::table('mq_user_work')->where('user_id',$id)->select();
        $sql4 =Db::table('mq_user_resume')->where('user_id',$id)->select();
        $res= array($sql1,$sql2,$sql3,$sql4);
        return $res;

    }
}

