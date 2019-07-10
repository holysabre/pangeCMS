<?php
/**
 * Created by PhpStorm.
 * User: yingwenjie
 * Date: 2019/6/25
 * Time: 10:46 AM
 */


/**
 * @param $type
 * @param $name
 * @param $key
 * @param $value
 * @param bool $required
 * @param array $options
 * @param $default
 * @return string
 * admin 表单通用输入框
 */
function form_html($type, $name, $key, $value, $required = false, $options = ['0'=>'隐藏','1'=>'显示'], $default = 1)
{
    $required = $required ? 'required' : '';
    $html = '<div class="form-group"><label for="'.$key.'" class="col-md-2 col-sm-2 control-label '.$required.'">'.$name.'</label><div class="col-md-5 col-sm-10">';
    switch ($type){
        case 'text':
            $html .= '<input type="text" name="'.$key.'" '.$required.' class="form-control" value="'.old($key,$value).'" >';
            break;
        case 'textarea':
            $html .= '<textarea name="'.$key.'" class="form-control">'.old($key,$value).'</textarea>';
            break;
        case 'radio':
            $html .= '<div class="radio">';
            foreach ($options as $option_key => $option_value){
                $checked = $option_key == (empty($value) ? $default : $value) ? 'checked' : '';
                $html .= '<label class="radio-inline"><input type="radio" name="'.$key.'" value="'.$option_key.'" '.$checked.'> '.$option_value.'</label>';
            }
            $html .= '</div>';
            break;
        case 'checkbox':
            $html .= '<div class="checkbox">';
            foreach ($options as $option_key => $option_value){
                $checked = $option_key == (empty($value) ? $default : $value) ? 'checked' : '';
                $html .= '<label class="checkbox-inline"><input type="checkbox" name="'.$key.'" value="'.$option_key.'" '.$checked.'> '.$option_value.'</label>';
            }
            $html .= '</div>';
            break;
        case 'select':
            $html .= '<select name="'.$key.'" class="form-control">';
            $html .= '<option value="0">/</option>';
            foreach ($options as $option_key => $option_value) {
                $selected = $option_key == $value ? 'selected' : '';
                $html .= '<option value="'.$option_key.'" '.$selected.'>'.$option_value.'</option>';
            }
            $html .= '</select>';
            break;
        case 'image':
            break;
        default:
            break;
    }
    $html .= '</div></div>';

    return $html;
}

function image_uploader($name,$id,$images = [],$folder = 'default')
{
    $html = '<div class="form-group">
                <label for="title" class="col-md-2 col-sm-2 control-label">'.$name.'</label>
                <div class="col-md-5 col-sm-10">
                    <div id="uploader-'.$id.'">
                        <div id="fileList-'.$id.'" class="uploader-list">';
    if(!empty($images)){
        foreach ($images as $key=>$image){
            $html .= '<div id="'.$key.'" class="file-item img-thumbnail">
                        <img src="'.$image.'"/>
                        <input type="hidden" name="thumb['.$key.']" value="'.$image.'">
                        <button type="button" class="btn btn-danger btn-sm btn-delete-file"><i class="icon icon-trash"></i></button>
                    </div>';
        }
    }
    $html .= '
                        </div>
                        <div id="filePicker-'.$id.'">选择图片</div>
                    </div>
                    <script>
                        $list = $("#fileList-'.$id.'");
                        ratio = window.devicePixelRatio || 1,
                            thumbnailWidth = 100 * ratio,
                            thumbnailHeight = 100 * ratio,
                            uploader;
                        // 初始化Web Uploader
                        var uploader = WebUploader.create({
                            // 选完文件后，是否自动上传。
                            auto: true,
                            // swf文件路径
                            swf: BASE_URL + "Uploader.swf",
                            // 文件接收服务端。
                            server: "'.route('common.upload').'",
                            // 选择文件的按钮。可选。
                            // 内部根据当前运行是创建，可能是input元素，也可能是flash.
                            pick: "#filePicker-'.$id.'",
                            // 只允许选择图片文件。
                            accept: {
                                title: "Images",
                                extensions: "gif,jpg,jpeg,bmp,png",
                                mimeTypes: "image/*"
                            },
                            // csrf_token
                            formData: {
                                _token: "'.csrf_token().'",
                                folder: "'.$folder.'",
                            },
                            // 每次上传图片数量限制
                            threads: "'.config("admin.uploader.threads").'",
                            fileNumLimit: "'.config("admin.uploader.fileNumLimit").'",
                        });
                        // 当有文件添加进来的时候
                        uploader.on( "uploadSuccess", function( file, response ) {
                            var $li = $(
                                \'<div id="\' + response.id + \'" class="file-item img-thumbnail">\' +
                                \'<img  src="\'+response.url+\'"/>\' + \'<input name="thumb[\'+response.id+\']" type="hidden" value="\'+response.url+\'"/>\' +
                                \'<button type="button" class="btn btn-danger btn-sm btn-delete-file"><i class="icon icon-trash"></i></button>\' +
                                \'</div>\'
                                );

                            // $list为容器jQuery实例
                            $list.append( $li );
                        });
                    </script>
                </div>
            </div>';
    return $html;
}


/**
 * @param $length
 * @return string
 * 获取指定长度的随机数
 */
function gen_rand_number($length)
{
    $number = '';
    for ($i=1;$i<$length;$i++) {         //通过循环指定长度
        $rand_number = mt_rand(0,9);     //指定为数字
        $number .= $rand_number;
    }

    return $number;
}

/**
 * @param $message
 * @param int $status
 * @param array $data
 * @param string $url
 * @return array
 * 异步数据整合
 */
function ajax_response($message, $status = 0, $data = [], $url = '')
{
    $arr = [
        'msg' => $message,
        'status' => $status,
        'data' => $data,
        'url' => $url,
    ];
    return $arr;
}