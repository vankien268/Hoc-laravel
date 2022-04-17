<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Str;

trait Filterable
{
    public function scopeFilter($query, $request)
    {
        $param = $request->all();
        $result = [];
        foreach ($param as $field => $value) {
            $method = 'filter' . Str::studly($field);
            // vì là 1 mảng lên không cần kiểm tra $request->has(''), chỉ cần kiểm tra khác rỗng là đc
            if ($value != '') {
//                $checkMethod = new User();
//                dd(method_exists($this, $method));
                //method_exists kiểm tra xem tên phương thức có trong đối tượng object này không
                if (method_exists($this, $method)) {
                    // gọi đến phương thức đó và truyền tham số $value vào
                    $this->{$method}($query, $value);
                }
                // ý tưởng hàm là filter sẽ tự động thực hiện query các field luôn mà không cần khai báo các hàm filter trong model nữa
                //Nhưng model cần có cái gì đó để hàm filter biết các field đó bằng cách :
                //Khai báo protected filterable =['column1', 'column2']
                else {
                    if (!empty($this->filterable)) {
                        if (in_array($field, $this->filterable)) {
                            $result = $query->where($this->table . '.' . $field, $value)->get();
                        }
                    }
                }
            }
        }

        return $result;
    }
// model nào muốn dùng Filterable chỉ cần use Filterable;    
// bên controller gọi filter bằng cách   $users_filter = User::filter(request());

}
