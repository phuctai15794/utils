<!DOCTYPE html>
<html>
<head>
    <title>Chuỗi JSON</title>
</head>
<body>
    <?php
        /* Check UTF-8 JSON */
        function raw_json_encode($input, $flags = 0)
        {
            $fails = implode('|', array_filter(array(
                '\\\\',
                $flags & JSON_HEX_TAG ? 'u003[CE]' : '',
                $flags & JSON_HEX_AMP ? 'u0026' : '',
                $flags & JSON_HEX_APOS ? 'u0027' : '',
                $flags & JSON_HEX_QUOT ? 'u0022' : '',
            )));
            $pattern = "/\\\\(?:(?:$fails)(*SKIP)(*FAIL)|u([0-9a-fA-F]{4}))/";
            $callback = function ($m) {
                return html_entity_decode("&#x$m[1];", ENT_QUOTES, 'UTF-8');
            };
            return preg_replace_callback($pattern, $callback, json_encode($input, $flags));
        }

        /* Lưu CSDL */
        $data_attr_temp['trongluongbanthan']=magic_quote($_POST['trongluongbanthan']);
        $data_attr_temp['thetich']=magic_quote($_POST['thetich']);
        $data_attr_temp['khoangcachtrucbanhxe']=magic_quote($_POST['khoangcachtrucbanhxe']);
        $data_attr_temp['docaoyen']=magic_quote($_POST['docaoyen']);

        /* Kiểm tra UTF-8 để lưu chuỗi JSON */
        $data_attr['thuoctinh']=raw_json_encode($data_attr_temp,0);

        $data_attr['id_pro']=$id;
        $data_attr['type']=$type;
        $d->setTable('product_thuoctinh');
        $d->insert($data_attr);

        /* Lấy cột chuỗi đã lưu dưới dạng JSON */
        $sql = "select thuoctinh from #_product_thuoctinh where id_pro='".$item['id']."' and type='san-pham'";
        $d->query($sql);
        $attr = $d->fetch_array();  

        $arr_json=json_decode($attr['thuoctinh'],true);
        // true: Dành cho mảng + foreach
        echo $arr_json['trongluongbanthan'];
        foreach ($arr_json as $key => $value)
        {
            echo $key.": ".$value."<br/>";
        }

        // false: Dành cho đối tượng:
        echo $arr_json['trongluongbanthan'];
    ?>
</body>
</html>