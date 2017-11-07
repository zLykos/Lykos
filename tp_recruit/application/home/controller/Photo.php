<?php
namespace app\home\controller;
use app\home\controller\Basd;
class Photo extends Basd
{
    public function verificationCode()
    {
        if ((($_FILES["file"]["type"] == "image/gif")
                || ($_FILES["file"]["type"] == "image/jpeg")
                || ($_FILES["file"]["type"] == "imagepeg"))
            && ($_FILES["file"]["size"] < 2000000)
        ) {
            if ($_FILES["file"]["error"] > 0) {
                $data = array(
                    'error' => $_FILES["file"]["error"],
                    'msg' => 'some error happend',
                    'imgurl' => null,
                );
                $url = 'http://www.lykos.com/pages/Photo.php';
                $data = json_encode($data);
                header('Location:' . $url . '?data=' . $data);

            } else {
                $typeName = explode('.', $_FILES["file"]["name"]);
                $img = time() . '.' . $typeName[1];
                Session::set('imgName', $img);

                if (file_exists("upload/" . $img)) {
                    $data = array(
                        'error' => null,
                        'msg' => 'file already exists',
                        'imgurl' => null,
                    );
                    $url = 'http://www.lykos.com/pages/Photo.php';
                    $data = json_encode($data);
                    header('Location:' . $url . '?data=' . $data);

                } else {
                    move_uploaded_file($_FILES["file"]["tmp_name"],
                        "static/img/" . $img);

                    $data = array(
                        'error' => null,
                        'msg' => 'upload success',
                        'imgurl' => 'http://www.text.com/static/img/'.$img,
                    );
                    $imgurl = 'http://www.text.com/static/img/' . $img;
                    Session::set('timeImg', $imgurl);
                    $url = 'http://www.lykos.com/pages/Photo.php';
                    $data = json_encode($data);
                    header('Location:' . $url . '?data=' . $data);
                    //ÎÒ

                    exit;
                }
                exit;
            }
        } else {

            $data = array(
                'error' => null,
                'msg' => 'file type not allowed',
                'imgurl' => null,
            );
            $url = 'http://www.lykos.com/pages/Photo.php';
            $data = json_encode($data);
            header('Location:' . $url . '?data=' . $data);

        }
    }
}


