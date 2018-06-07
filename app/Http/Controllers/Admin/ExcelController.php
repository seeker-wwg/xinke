<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    //Excel文件导出功能
    public function export()
    {
        $cjData = [

                ["16计师1班", "16429102", "王春波", "军事理论", "公共基础", 75, ""],
                [ "16计师1班", "16429103", "李林峰", "军事理论", "公共基础", 73, ""],

        ];
        Excel::create('订单统计'.date('Y-m-d H_i_s'),function($excel) use ($cjData){
            $excel->sheet('score', function($sheet) use ($cjData){
                $sheet->rows($cjData);
                ob_end_clean();
            });

        })->export('xls');//csv

    }

//附上自己使用laravel-admin封装的通用导出方法：针对页面的显示导出对应数据

    public function export1()
    {
        $file_name = date("Y-m-d") .'-'. $this->grid->model()->eloquent()->getTable();
        Excel::create($file_name, function($excel) use ($file_name) {
            $model_name = get_class($this->grid->model()->eloquent());
            $excel->sheet($file_name, function($sheet) use ($model_name) {
                $name = [];
                $label = [];
                foreach ($this->grid->columns() as $k => $v) {
                    $name[] = $v->getName();
                    $label[] = $v->getLabel();
                }
                $data =$this->getData();
                $rows = [];
                foreach ($data as $k => $v) {
                    $rows[] = array_dot($this->sanitize($v));
                }
                $rows = collect($rows)->map(function($item) use ($name) {
                    return array_only($item, $name);
                });
                $rows = $this->sort_arr($rows, $name, $model_name);
                //dump($name);
                //dd($rows);
                $sheet->row(1, $label);
                $sheet->rows($rows);
                ob_end_clean();
            });
        })->export('xls');//csv
    }

    /**
     * Remove indexed array.
     *
     * @param array $row
     *
     * @return array
     */
    protected function sanitize(array $row)
    {
        return collect($row)->reject(function ($val) {
            return is_array($val) && !Arr::isAssoc($val);
        })->toArray();
    }

    /**
     * @param $arr
     * @param $keys
     * @param $model_name
     * @return array
     */
    public function sort_arr($arr, $keys, $model_name)
    {
        $new_arr = [];
        foreach ($arr as $k => $v) {
            foreach ($v as $kk => $vv) {
                if (stripos($kk, '.')) {
                    list($l1, $l2) = explode('.', $kk);
                    if(method_exists($l1,'_gird_'.$l2)) {
                        $v[$kk] = call_user_func_array([ucwords($l1), '_gird_'.$l2], [$vv]);
                    }
                } else {
                    if(method_exists($model_name,'_gird_'.$kk)) {
                        $v[$kk] = call_user_func_array([$model_name, '_gird_'.$kk], [$vv]);
                    }
                }
            }
            foreach ($keys as $kk => $vv) {
                $new_arr[$k][$vv] = $v[$vv];
            }
        }
        //dd($new_arr);
        return $new_arr;
    }

}
