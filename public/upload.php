<?php
header('Content-Type: text/html;charset=UTF-8');




//文件后缀=>文件类型
$type = ['.pdf' => 'application/pdf'];

const FILE_DIR = '/usr/share/nginx/html/work/';


//如果非nginx upload module 上传文件
if (count(($file = $_FILES['file'])) > 0) {

    if ($file['error'] == 0) {

        //判断文件类型是否存在,文件后缀是我们自己的key去定义
        if ($fileType = array_search($file['type'], $type)) {

            //以当前的时间命名目录
            $date_dir = date('Y-m-d', time());

            //如果目录没创建,我们就自己创建一个
            if (!is_dir(FILE_DIR . $date_dir)) {

                if (!mkdir(FILE_DIR . $date_dir)) {
                    return header('location:503.html');
                }
            }

            //文件的MD5+当前unix时间戳+一个5位随机数,如果此处需求频繁也可以用微秒时间戳

            $filename = FILE_DIR . $date_dir . '/' . (md5_file($file['tmp_name']) . time() . rand(9999, 99999)) . $fileType;


            //生成新的文件
            if (rename($file['tmp_name'], $filename)) {

                return header('Location: success.html');

            }

        }
    }

    switch ($file['error']) {
        case 1:
            http_response_code(400);
            exit('文件大小超出了服务器的空间大小');
        case 2:
            http_response_code(400);
            exit('要上传的文件大小超出浏览器限制');
        case 3:
            http_response_code(400);
            exit('文件仅部分被上传');
        case 4:
            http_response_code(404);
            exit('没有找到要上传的文件');
        case 5:
            http_response_code(503);
            exit('服务器临时文件夹丢失');
        case 6:
            http_response_code(503);
            exit('文件写入到临时文件夹出错');
    }
}


//如果是nginx upload module
if (count(($file = $_POST)) > 0) {

    //判断文件类型是否存在,文件后缀是我们自己的key去定义
    if ($fileType = array_search($file['file_content_type'], $type)) {

        //以当前的时间命名目录
        $date_dir = date('Y-m-d', time());

        //如果目录没创建,我们就自己创建一个
        if (!is_dir(FILE_DIR . $date_dir)) {

            if (!mkdir(FILE_DIR . $date_dir)) {
                return header('location:503.html');
            }
        }

        //文件的MD5+当前unix时间戳+一个5位随机数,如果此处需求频繁也可以用微秒时间戳

        $filename = FILE_DIR . $date_dir . '/' . (md5_file($file['file_path']) . time() . rand(9999, 99999)) . $fileType;


        //生成新的文件
        if (rename($file['file_path'], $filename)) {

            return header('Location: success.html');

        }
    }
}


http_response_code(400);
exit('错误操作方式!');
