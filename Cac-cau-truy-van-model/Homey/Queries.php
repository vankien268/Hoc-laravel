<?php
// thực hiện trong model
// 1. Đếm tất cả sinh viên đang ở lớp học thử và lớp chính thức

$ownStudents = Student::with(['parents:id,name, phone,email,'])
                        ->where('id', auth()->user()->pluck('id'))
                        // nếu học thử
                        ->when(request()->type=='trial', function($query){
                            $query->where('code', '');
                        })
                        // lấy tất cả k null
                        ->when(request()->type=='trial-to-official', function($query){
                            $query->wherNotNull('trial-to-official');
                        })
                        // mặc định
                        ->when(!request()->type, function($query){
                            $query->where('code', '<>', '');
                        })->get()
                        // bây giờ thực hiện lặp để tính điểm trung bình của từng sinh viên
                        //transform dùng lặp qua collection và truyền từng giá trị vào callback. Từng phần tử sẽ bị thay thế bởi giá 
                        // trị của callback và trả về phần tử bị thay đổi.
                        ->transform(function($student){
                            $pointTest = '';
                            $totalAveragePoint = '';
                            // gọi đến bảng điểm not null thì mới tính được điểm
                            if($student->testResults->isNotEmpty()){
                                // do có nhiều điểm của nhiều kiểm tra học trong bảng kết quả lên lặp tiếp, chỉ lấy id của của lesson đó và thời gian
                                $dataTest = $student->testResults->map(function($query){
                                     $item['lesson_start'] = $query->lesson->start->format('Y-m-d H:i');
                                     $item['lesson_id'] = $query->lesson_id;
                                     return $item;
                                })->sortByDesc('lesson_start')->first();

                                if(isset($dataTest['lesson_id'])){
                                    $pointTest = $student->testResults->filter(function($query) use ($dataTest){
                                        if($dataTest['lesson_id'] == $query->lesson_id){
                                            return $query;
                                        }
                                    })->pluck('point')->average();
                                    $pointTest = round($pointTest, 2);
                                }
                                $totalAveragePoint = $student->testResults->pluck('point')->average();
                                $totalAveragePoint = round($totalAveragePoint, 2);
                            }
                            $student->averagePoint = $pointTest;
                            $student->totalAveragePoint = $totalAveragePoint;
            
                            return $student;
                        });


?>