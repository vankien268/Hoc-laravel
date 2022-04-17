@extends('layouts.app')
@section('page_name')
@endsection

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">

            <div class="content-body">
                <!-- users list start -->
                <section class="app-user-list">
                    @if($user->role == 'admin')
                    <form id="form-edit_user" action="" method="POST">
                        @csrf
                        <div class="row mb-1">
                            <div class="col-lg-12">

                                <div class="card card-congratulation-medal mb-0 h-100">
                                    <div class="d-flex" style="font-size: 11px">

                                        <div class="col-md-4">
                                            <div class="card-body d-flex">
<style>
    .file-upload-input {
        position: absolute;
        margin-top:-12.5%;
        padding: 0;
        outline: none;
        width: 100px;
        height: 100px;
        opacity: 0;
        margin-left: 18px;
        cursor: pointer;
    }
</style>
                                               <div>
{{--                                                  chọn icon camera ghi đè ảnh--}}
                                                   <div id="previewAvatar">
                                                       <img src="/app-assets/images/portrait/small/user-default.png" onchange="preview(this);"   alt=""
                                                            style="width: 103.71px; height: 100px; margin-left: 20px; margin-top: 20px;">
                                                   </div>
{{--                                                   chọn ảnh default ghi đè ảnh default--}}

{{--                                                   ảnh ban đầu => ảnh mới --}}
{{--                                                   <div id="previewAvatar" class="d-none">--}}
{{--                                                       <i class="fas fa-angle-double-right fa-lg mx-5"></i>--}}
{{--                                                       <img src="/app-assets/images/portrait/small/user-default.png" class="rounded-circle"--}}
{{--                                                            style="width: 100px;height: 100px;">--}}
{{--                                                   </div>--}}
                                                   <div class=" justify-content-center align-items-center mt-2">
                                                       <label for="studentAvatar" title="Cập nhật ảnh đại diện"
                                                              class="cursor-pointer d-flex justify-content-center align-items-center text-black p-2 rounded-circle bg-light-dark bs-tooltip">
                                                           <i data-feather='camera'></i>
                                                       </label>
{{--                                                       <input type="file" name="studentAvatar" id="studentAvatar" class="d-none"--}}
{{--                                                              onchange="preview(this);" accept="image/png, image/gif, image/jpeg"/>--}}
                                                       <input type="file" name="studentAvatar" id="studentAvatar" class="file-upload-input"
                                                              onchange="preview(this);" accept="image/png, image/gif, image/jpeg"/>
                                                   </div>
                                                   <script>
                                                       function preview(input) {
                                                           if(input.files && input.files[0]){
                                                               var reader = new FileReader();
                                                               reader.onload = function (e){
                                                                   $('#previewAvatar').removeClass('d-none').find('img').attr('src', e.target.result);
                                                               }
                                                               reader.readAsDataURL(input.files[0]);
                                                           }
                                                       }
                                                   </script>
                                               </div>
                                                <div class="card-body row">
                                                    <h5 class="">{{$user->fullname}}</h5>
                                                    <p class="m-0 fs-14" id="created_at">Ngày
                                                        tạo: {{$user->created_at->format('d-m-Y')}}</p><br>
                                                    <p>{{$user->created_at->format('H:i:s')}}</p>
                                                    <p class="m-0 fs-14" id="updated_at">Cập nhật cuối : {{$user->updated_at->format('d-m-Y')}}<br>
                                                    </p>
                                                    <p> {{$user->updated_at->format('H:i:s')}} </p>

                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="card-body">
                                                <div class="mb-2">
                                                    <label class="form-label" for="basic-icon-default-fullname">Họ tên
                                                        <span
                                                                class="required"></span></label>
                                                    <input type="text" class="form-control dt-full-name"
                                                           id="basic-icon-default-fullname" placeholder="Vui lòng nhập"

                                                           name="fullname"/>

                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label" for="basic-icon-default-fullname">Số điện
                                                        thoại<span class="required"></span></label>
                                                    <input type="text" class="form-control dt-full-name"
                                                           id="basic-icon-default-fullname" placeholder=""
                                                           name="phone"/>

                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label" for="user-role">Chức vụ <span
                                                                class="required"></span></label>

                                                    <select id="" name="role" class="select2 form-select">
                                                        <option value="">---Vui lòng chọn---</option>
                                                        <option value="admin">admin</option>
                                                        <option value="sale">sale</option>

                                                    </select>

                                                </div>
                                                <button type="submit" data-bs-target="" id="formSubmitUser"
                                                        data-bs-toggle="modal"
                                                        data-id="{{$user->id}}" class="btn btn-primary btn-sm">Chỉnh sửa
                                                </button>
                                                <button type="button"
                                                        data-id="{{$user->id}}" id="delete-button"
                                                        class="delete-button btn btn-outline-danger btn-sm">Xóa bỏ
                                                </button>
                                                <a href="{{ route('admin.users.index') }}"
                                                        class="btn btn-outline-success btn-sm">Quay lại
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="card-body ">
                                                <div class="mb-2">
                                                    <label class="form-label" for="basic-icon-default-fullname">Username
                                                        <span
                                                                class="required"></span></label>
                                                    <input type="text" class="form-control dt-full-name"
                                                           id="basic-icon-default-fullname" placeholder=""
                                                           name="username" value=""/>

                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label" for="basic-icon-default-fullname">Email
                                                        <span
                                                                class="required"></span></label>
                                                    <input type="text" class="form-control dt-full-name"
                                                           id="basic-icon-default-fullname" placeholder=""
                                                           name="email"/>

                                                </div>

                                                <div class="mb-1">
                                                    <a href="#" style="font-size: 14px;" id="changePassword">Đổi mật khẩu</a>
                                                </div>
                                                <div class="row" id="formShowInputPassword" style="display: none;">
                                                    <div class="col-md-6 ">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="basic-icon-default-fullname">Mật khẩu*</label>
                                                            <input type="password" class="form-control dt-full-name"
                                                                   id="basic-icon-default-fullname"
                                                                   placeholder="Vui lòng nhập" name="password"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="basic-icon-default-fullname">Nhập lại mật khẩu*</label>
                                                            <input type="password" class="form-control dt-full-name"
                                                                   id="basic-icon-default-fullname"
                                                                   placeholder="Vui lòng nhập" name="confirm_password"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </form>
                    @else
                        <div class="row mb-2">
                            <div class="col-lg-9">
                                <div class="card card-congratulation-medal mb-0 h-100">
                                    <div class="d-flex" style="font-size: 11px; margin-left: 20px;">
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <p class="fw-bold text-black" style="font-size: 14px">Họ tên CTV
                                                    : {{$user->fullname}}</p>
                                                <p class="card-text font-small-3">Thông tin liên hệ</p>

                                                <button type="button" data-bs-target="#user-modal" data-bs-toggle="modal"
                                                        data-id="{{ $user->id }}" class="btn btn-primary btn-sm">Chỉnh
                                                    sửa
                                                </button>
                                                <button type="button"
                                                        data-id="{{ $user->id }}"
                                                        class="delete-button btn btn-outline-danger btn-sm">Xóa bỏ
                                                </button>

                                                <div class="d-flex mt-2">
                                                    <div class="me-2 d-flex">
                                                        <div style="width: 32px;height: 32px;justify-content: center;align-items: center"
                                                             class="bg-light-primary d-flex rounded-1 me-1">
                                                            <i data-feather='check'></i>
                                                        </div>

                                                        <div>

                                                            <h3 class="m-0 fs-14"
                                                                style="font-size: 16px">{{ number_format($total_tickets) }}</h3>
                                                            <p class="m-0 text-nowrap">Tổng lượng vé</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div style="width: 32px;height: 32px;justify-content: center;align-items: center"
                                                             class="bg-light-primary d-flex rounded-1 me-1">
                                                            <i data-feather='check'></i>
                                                        </div>
                                                        <div>
                                                            <h3 class="m-0 fs-14"
                                                                style="font-size: 16px">{{ number_format($commission) }}</h3>
                                                            <p class="m-0 text-nowrap">Tổng tiền hoa hồng</p>
                                                        </div>
                                                    </div>
                                                </div>

                                      </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <table class="m-0">
                                                    <tr class="fs-14">
                                                        <th class="col-md-7">
                                                            <svg width="16" height="16" viewBox="0 0 12 12" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M3.43018 2.405V1.375" stroke="#5E5873"
                                                                      stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M8.56982 2.405V1.375" stroke="#5E5873"
                                                                      stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M9.025 1.88989H2.975C2.09 1.88989 1.375 2.60489 1.375 3.48989V9.02989C1.375 9.91489 2.09 10.6299 2.975 10.6299H9.03C9.915 10.6299 10.63 9.91489 10.63 9.02989V3.48989C10.625 2.60489 9.91 1.88989 9.025 1.88989Z"
                                                                      stroke="#5E5873" stroke-linecap="round"
                                                                      stroke-linejoin="round"/>
                                                                <path d="M1.375 3.94995H10.625" stroke="#5E5873"
                                                                      stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M9 6C9.27614 6 9.5 5.77614 9.5 5.5C9.5 5.22386 9.27614 5 9 5C8.72386 5 8.5 5.22386 8.5 5.5C8.5 5.77614 8.72386 6 9 6Z"
                                                                      fill="#5E5873"/>
                                                                <path d="M7 6C7.27614 6 7.5 5.77614 7.5 5.5C7.5 5.22386 7.27614 5 7 5C6.72386 5 6.5 5.22386 6.5 5.5C6.5 5.77614 6.72386 6 7 6Z"
                                                                      fill="#5E5873"/>
                                                                <path d="M5 6C5.27614 6 5.5 5.77614 5.5 5.5C5.5 5.22386 5.27614 5 5 5C4.72386 5 4.5 5.22386 4.5 5.5C4.5 5.77614 4.72386 6 5 6Z"
                                                                      fill="#5E5873"/>
                                                                <path d="M3 6C3.27614 6 3.5 5.77614 3.5 5.5C3.5 5.22386 3.27614 5 3 5C2.72386 5 2.5 5.22386 2.5 5.5C2.5 5.77614 2.72386 6 3 6Z"
                                                                      fill="#5E5873"/>
                                                                <path d="M9 7.74512C9.27614 7.74512 9.5 7.52126 9.5 7.24512C9.5 6.96897 9.27614 6.74512 9 6.74512C8.72386 6.74512 8.5 6.96897 8.5 7.24512C8.5 7.52126 8.72386 7.74512 9 7.74512Z"
                                                                      fill="#5E5873"/>
                                                                <path d="M7 7.74512C7.27614 7.74512 7.5 7.52126 7.5 7.24512C7.5 6.96897 7.27614 6.74512 7 6.74512C6.72386 6.74512 6.5 6.96897 6.5 7.24512C6.5 7.52126 6.72386 7.74512 7 7.74512Z"
                                                                      fill="#5E5873"/>
                                                                <path d="M5 7.74512C5.27614 7.74512 5.5 7.52126 5.5 7.24512C5.5 6.96897 5.27614 6.74512 5 6.74512C4.72386 6.74512 4.5 6.96897 4.5 7.24512C4.5 7.52126 4.72386 7.74512 5 7.74512Z"
                                                                      fill="#5E5873"/>
                                                                <path d="M3 7.74512C3.27614 7.74512 3.5 7.52126 3.5 7.24512C3.5 6.96897 3.27614 6.74512 3 6.74512C2.72386 6.74512 2.5 6.96897 2.5 7.24512C2.5 7.52126 2.72386 7.74512 3 7.74512Z"
                                                                      fill="#5E5873"/>
                                                                <path d="M7 9.48511C7.27614 9.48511 7.5 9.26125 7.5 8.98511C7.5 8.70897 7.27614 8.48511 7 8.48511C6.72386 8.48511 6.5 8.70897 6.5 8.98511C6.5 9.26125 6.72386 9.48511 7 9.48511Z"
                                                                      fill="#5E5873"/>
                                                                <path d="M5 9.48511C5.27614 9.48511 5.5 9.26125 5.5 8.98511C5.5 8.70897 5.27614 8.48511 5 8.48511C4.72386 8.48511 4.5 8.70897 4.5 8.98511C4.5 9.26125 4.72386 9.48511 5 9.48511Z"
                                                                      fill="#5E5873"/>
                                                                <path d="M3 9.48511C3.27614 9.48511 3.5 9.26125 3.5 8.98511C3.5 8.70897 3.27614 8.48511 3 8.48511C2.72386 8.48511 2.5 8.70897 2.5 8.98511C2.5 9.26125 2.72386 9.48511 3 9.48511Z"
                                                                      fill="#5E5873"/>
                                                            </svg>
                                                            <span class="font-weight-bold">Username</span>
                                                        </th>
                                                        <td class="text-capitalize ml-2">
                                                            {{$user->username}}
                                                        </td>
                                                    </tr>
                                                    <tr class="fs-14">
                                                        <th>
                                                            <svg width="16" height="16" viewBox="0 0 12 12" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M8 1.375H9.085C9.94 1.375 10.625 2.06499 10.625 2.91499V3.95"
                                                                      stroke="#5E5873" stroke-linecap="round"
                                                                      stroke-linejoin="round"/>
                                                                <path d="M1.375 3.95V2.91499C1.375 2.05999 2.065 1.375 2.915 1.375H3.975"
                                                                      stroke="#5E5873" stroke-linecap="round"
                                                                      stroke-linejoin="round"/>
                                                                <path d="M8 10.625H9.085C9.94 10.625 10.625 9.93505 10.625 9.08505V8.05005"
                                                                      stroke="#5E5873" stroke-linecap="round"
                                                                      stroke-linejoin="round"/>
                                                                <path d="M1.375 8.05005V9.08505C1.375 9.94005 2.065 10.625 2.915 10.625H3.975"
                                                                      stroke="#5E5873" stroke-linecap="round"
                                                                      stroke-linejoin="round"/>
                                                                <path d="M8.93524 8.28999C8.09024 7.86999 7.08023 7.625 6.00023 7.625C4.88523 7.625 3.85023 7.885 2.99023 8.33"
                                                                      fill="#5E5873"/>
                                                                <path d="M8.93524 8.28999C8.09024 7.86999 7.08023 7.625 6.00023 7.625C4.88523 7.625 3.85023 7.885 2.99023 8.33"
                                                                      stroke="#5E5873" stroke-linecap="round"
                                                                      stroke-linejoin="round"/>
                                                                <path d="M6.00027 5.85992C6.81213 5.85992 7.47027 5.20178 7.47027 4.38992C7.47027 3.57806 6.81213 2.91992 6.00027 2.91992C5.18841 2.91992 4.53027 3.57806 4.53027 4.38992C4.53027 5.20178 5.18841 5.85992 6.00027 5.85992Z"
                                                                      fill="#5E5873" stroke="#5E5873" stroke-linecap="round"
                                                                      stroke-linejoin="round"/>
                                                            </svg>
                                                          Email
                                                        </th>
                                                        <td class=" ml-5">
                                                            {{ $user->email }}
                                                        </td>
                                                    </tr>
                                                    <tr class="fs-14">
                                                        <th>
                                                            <svg width="16" height="16" viewBox="0 0 12 12" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M3.49999 3C3.49999 1.61929 4.61928 0.5 5.99999 0.5C7.3807 0.5 8.49999 1.61929 8.49999 3V3.00585M3.49999 3C3.8139 2.99404 4.16635 3 4.58016 3H7.41982C7.831 3 8.18752 3 8.49999 3.00585M3.49999 3C2.64056 3.01632 2.10911 3.0833 1.69598 3.31138C1.21543 3.57668 0.835976 3.99252 0.615517 4.4942M0.615517 4.4942L2.40379 6.28248C4.07046 7.94914 4.90379 8.78248 5.93932 8.78248C6.97486 8.78248 7.80819 7.94914 9.47486 6.28247L11.2912 4.46613C11.309 4.44832 11.3287 4.43245 11.3498 4.4188V4.4188M0.615517 4.4942C0.608727 4.50965 0.602088 4.52519 0.595602 4.5408C0.34841 5.13576 0.433817 5.90441 0.604629 7.44173C0.744439 8.70001 0.814343 9.32915 1.10459 9.80394C1.36027 10.2222 1.73326 10.556 2.17718 10.764C2.68112 11 3.31413 11 4.58016 11H7.41982C8.68585 11 9.31886 11 9.8228 10.764C10.2667 10.556 10.6397 10.2222 10.8954 9.80394C11.1856 9.32915 11.2555 8.70001 11.3954 7.44173C11.5662 5.90441 11.6516 5.13576 11.4044 4.5408C11.3873 4.49957 11.3691 4.45889 11.3498 4.4188M8.49999 3.00585C9.36298 3.022 9.88992 3.08277 10.304 3.31138C10.7603 3.56327 11.1254 3.95087 11.3498 4.4188"
                                                                      stroke="#5E5873"/>
                                                            </svg>
                                                           Phone
                                                        </th>
                                                        <td class="ml-2">
                                                            {{ $user->phone }}
                                                        </td>
                                                    </tr>
                                                    <tr class="fs-14">
                                                        <th>
                                                            <svg width="20" height="20" viewBox="1 0 12 12" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M6 10.625C8.55432 10.625 10.625 8.55432 10.625 6C10.625 3.44568 8.55432 1.375 6 1.375C3.44568 1.375 1.375 3.44568 1.375 6C1.375 8.55432 3.44568 10.625 6 10.625Z"
                                                                      stroke="#5E5873" stroke-linecap="round"
                                                                      stroke-linejoin="round"/>
                                                                <path d="M4.49001 7.06997L5.245 5.40997C5.28 5.33497 5.335 5.27997 5.41 5.24497L7.07 4.48997C7.35 4.36497 7.635 4.64997 7.51 4.92997L6.75501 6.58997C6.72001 6.66497 6.66501 6.71997 6.59001 6.75497L4.93001 7.50997C4.65001 7.63997 4.36001 7.34997 4.49001 7.06997Z"
                                                                      stroke="#5E5873" stroke-linecap="round"
                                                                      stroke-linejoin="round"/>
                                                            </svg>
                                                            Chức vụ
                                                        </th>
                                                        <td class="pb-50">
                                                           {{ $user->role }}
                                                        </td>
                                                    </tr>

                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card card-congratulation-medal mb-0 h-100">
                                    <div class="card-body">
                                        <h5>Tổng doanh thu của sale</h5>
                                        <p class="card-text font-small-3">Tổng doanh thu</p>
                                        <h3 class="mb-75 pt-50 d-flex flex-column align-items-center">
                                            <a href="#"
                                               style="font-size: 35px"><b>{{ number_format($user->orders->sum('total_price')) }}
                                                    <sup>VND</sup></b></a>
                                        </h3>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <div class="card card-congratulation-medal mb-0 h-100">
                                    <div class="d-flex justify-content-between align-items-center header-actions mx-2 row mt-75"
                                         style="font-size: 10px">
                                            <h5 class="fw-bold text-black" style="position: absolute; top:32px;">Lịch sử đơn bán hàng</h5>
                                        <div class="card-datatable table-responsive pt-0 position-relative">
                                            <table class="user-list-table table">
                                                <thead class="table-light">
                                                <tr style="text-align: center; ">
                                                    <th style="font-size: 11px;">THỜI GIAN</th>
                                                    <th style="font-size: 11px;">TÊN TOUR</th>
                                                    <th style="font-size: 11px;">KHÁCH HÀNG</th>
                                                    <th style="font-size: 11px;">SỐ LƯỢNG VÉ</th>
                                                    <th style="font-size: 11px;">TỔNG TIỀN</th>
                                                </tr>
                                                <tbody>
                                                @if(isset($user->orders))

                                                    @foreach($user->orders as $order)
                                                        <tr class="fw-bold text-black" style="text-align: center;">
                                                            <td>
                                                                {{$order->time_start->format('Y-m-d')}}
                                                                <p class="mb-0 text-muted" style="font-size: 10px;">{{$order->time_start->format('h:i:s')}}</p>
                                                            </td>
                                                            <td>{{$order->tour->name}}</td>

                                                            <td>{{ @$order->customer->name }}<p
                                                                        class="m-0 fs-6 text-muted">{{ @$order->customer->email }}</p>
                                                            </td>

                                                            <td>{{number_format($order->quatity)}}</td>
                                                            <td>{{number_format($order->discount_price?? $order->total_price)}}</td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                </tbody>
                                                </thead>
                                            </table>
                                        </div>

                                    </div>


                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-0 h-100">
                                    <div class="card-header d-flex justify-content-between align-items-sm-center align-items-start flex-sm-row flex-column">
                                        <div class="header-left">
                                            <h4 class="card-title">Biểu đồ đơn hàng của sale</h4>

                                        </div>
                                        <div class="col-md-2">
                                            <div class="btn-group" >
                                                <button type="button"
                                                        class="btn btn-outline-primary btn-sm dropdown-toggle year-detail"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    {{now()->format('Y')}}
                                                </button>
                                                <div class="dropdown-menu" id="show-item-year">
                                                    @for($i = 0; $i < 3; $i++)
                                                        <a class="dropdown-item filter-year"
                                                           data-year="{{now()->subYears($i)->format('Y')}}"
                                                           href="#">{{now()->subYears($i)->format('Y')}}</a>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="card-datatable table-responsive pt-0">
                                        <div class="card-body">
                                            <div id="sales-line-chart"></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    @endif

                </section>
                <!-- users list ends -->
            </div>
        </div>
    </div>
{{--edit user--}}
    <div class="modal modal-slide-in new-user-modal" id="user-modal">
        <div class="modal-dialog">
            <form class="add-new-user modal-content pt-0" action="" method="POST">
                @csrf
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa người dùng</h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <div class="mb-1">
                        <label class="form-label" for="identity_card">Họ và tên<span
                                    class="required"></span></label>
                        <input type="text" id="fullname"
                               class="form-control dt-contact" placeholder="Vui lòng nhập"
                               name="fullname"/>

                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="basic-icon-default-fullname">Username <span
                                    class="required">*</span></label>
                        <input type="text" class="form-control dt-full-name"
                               id="basic-icon-default-fullname" placeholder="Vui lòng nhập"
                               name="username"/>

                    </div>

                    <div class="mb-1">
                        <a href="#" style="font-size: 14px;" id="changePassword">Đổi mật khẩu</a>
                    </div>
                    <div class="row" id="formShowInputPassword" style="display: none;">
                        <div class="col-md-6 ">
                            <div class="mb-1">
                                <label class="form-label" for="basic-icon-default-fullname">Mật khẩu*</label>
                                <input type="password" class="form-control dt-full-name"
                                       id="basic-icon-default-fullname"
                                       placeholder="Vui lòng nhập" name="password"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-1">
                                <label class="form-label" for="basic-icon-default-fullname">Nhập lại mật khẩu*</label>
                                <input type="password" class="form-control dt-full-name"
                                       id="basic-icon-default-fullname"
                                       placeholder="Vui lòng nhập" name="confirm_password"/>
                            </div>
                        </div>
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="basic-icon-default-contact">Email <span
                                    class="required">*</span></label>
                        <input type="text"
                               id="email" class="form-control dt-contact"
                               placeholder="abc@gmail.com" name="email"/>

                    </div>

                    <div class="mb-1">
                        <label class="form-label" for="address">Số điện thoại<span
                                    class="required"></span></label>
                        <input type="text" id="phone"
                               class="form-control dt-contact" placeholder="Vui lòng nhập"
                               name="phone"/>
                    </div>


                    <div class="mb-1">
                        <label class="form-label" for="user-role">Chức vụ <span
                                    class="required"></span></label>

                        <select id="" name="role" class="select2 form-select">
                            <option value="">---Vui lòng chọn---</option>
                            <option value="admin">admin</option>
                            <option value="sale">sale</option>

                        </select>

                    </div>

                    <button type="button" class="btn btn-primary me-1 data-submit"
                            id="formSubmitUser">Xác nhận
                    </button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Hủy
                        bỏ
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('css')
    <style>
        .fs-14 {
            font-size: 14px !important;
        }
        .fw-bold text-black{
            display: inline-block;
            position: absolute;
            top: 250px;
            left: 20px;
        }
        .ml-3 {
            margin-left: 3rem;
        }
        .icon {
            width: 1.4rem;
            height: 1.4rem;
            margin-right: 1rem;
        }

        .float-left {
            float: left;
        }

        .pd-0 {
            padding: 1.5rem 1.5rem 0 1.5rem;
        }

        .mb-0 {
            margin-bottom: 0 !important;
        }

        #DataTables_Table_0_length {
            display: none;
        }

    </style>
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="/app-assets/vendors/js/charts/apexcharts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script>
        var dtUserTable = $('.user-list-table');
        dtUserTable.DataTable({
            paging: true,
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-2 row mt-75"' +
                '<"col-sm-12 col-lg-8 d-flex justify-content-center justify-content-lg-start" l>' +
                '<"col-sm-12 col-lg-4 ps-xl-75 ps-0"<"dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap"<"me-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'Tìm kiếm',
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            },
            // Buttons with Dropdown
            buttons: [
                // {
                //     // text: 'Thêm người dùng mới',
                //     // className: 'add-new btn btn-primary',
                //     // attr: {
                //     //     'data-bs-toggle': 'modal',
                //     //     'data-bs-target': '#user-modal'
                //     // },
                // },
            ],
            // For responsive popup
        });
    </script>
    <script>
        $(document).ready(function () {


            const form = $('#form-edit_user');
            const modal = $('#user-modal');
            const url = '{{ route('admin.users.edit','') }}/' + '{{ $user->id }}';
            let roleSubmit =null;
            axios.get(url).then(data => {

                const {fullname, username, email, phone, role} = data.data.data;
                //Thực hiện fill dữ liệu, check update post của role nào
                //modal of sale
                if(role === 'sale'){
                    modal.find('input[name="fullname"]').val(fullname);
                    modal.find('input[name="username"]').val(username);
                    modal.find('input[name="email"]').val(email);
                    modal.find('input[name="phone"]').val(phone);
                    modal.find('select[name="role"]').val(role);

                        $('#formSubmitUser').on('click', function (e) {
                        e.preventDefault();
                        hideValidation(modal, 'input', 'select')
                        const data = getDataInForm(modal, 'input', 'select');
                        const url = "{{ route('admin.users.update', '') }}/"+'{{ $user->id }}';
                        update(data, url).then(resp => {
                            let {data, code, message} = resp.data;
                            console.log(resp.data);
                            if (code === ERROR) {
                                $.each(data, function (index, val) {
                                    modal.find('input[name=' + index + '],select[name=' + index + ']')
                                        .addClass('is-invalid').parent().append('<div class="invalid-feedback">' +
                                        '<strong>' + val[0] + '</strong>' +
                                        '</div>');
                                });
                                return -1;
                            }

                            if (code === SUCCESS) {
                                modal.modal('hide');
                                successAlert(message).then(() => {
                                    location.reload();
                                });
                                return -1;
                            }
                        }).catch(err => {
                            console.error(err);
                        })
                    })
                }
                //form of admin
                else{
                        form.find('input[name="fullname"]').val(fullname);
                        form.find('input[name="username"]').val(username);
                        form.find('input[name="email"]').val(email);
                        form.find('input[name="phone"]').val(phone);
                        form.find('select[name="role"]').val(role);

                         $('#formSubmitUser').on('click', function (e) {
                        e.preventDefault();
                        hideValidation(form, 'input', 'select')
                        const data = getDataInForm(form, 'input', 'select');
                        const url = "{{ route('admin.users.update', '') }}/"+'{{ $user->id }}';
                        update(data, url).then(resp => {
                            let {data, code, message} = resp.data;
                            console.log(resp.data);
                            if (code === ERROR) {
                                $.each(data, function (index, val) {
                                    form.find('input[name=' + index + '],select[name=' + index + ']')
                                        .addClass('is-invalid').parent().append('<div class="invalid-feedback">' +
                                        '<strong>' + val[0] + '</strong>' +
                                        '</div>');
                                });
                                return -1;
                            }

                            if (code === SUCCESS) {
                                form.modal('hide');
                                successAlert(message).then(() => {
                                    location.reload();
                                });
                                return -1;
                            }
                        }).catch(err => {
                            console.error(err);
                        })
                    })

                }

            })

        })


        $('.delete-button').on('click', function (e) {
            const user_id = $(this).attr('data-id');
            const url ='{{ route('admin.users.destroy', '') }}/' +user_id;
            confirmAlert('Bạn có muốn xóa không?').then(function (result) {
                if (result.value) {

                    remove({user_id}, url).then(resp => {
                        const {code, data, message} = resp.data;
                        if (code === SUCCESS) {
                            successAlert(message).then(res =>{
                                location.href = "{{ route('admin.users.index') }}";
                                return -1;
                            });
                        }

                        if (code === ERROR) {
                            errorAlert(message);
                        }
                    })
                }
            });

        });
        // change pass
        // click hien thi form
        let password = false;
        $('#changePassword').click(function () {
            password = !password;
            if(password){
                $('#formShowInputPassword').show();
            }
            else{
                $('#formShowInputPassword').hide();
            }



       });

        //bieu do thong ke sale

        var $textHeadingColor = '#5e5873';
        var $strokeColor = '#ebe9f1';
        var $salesStrokeColor2 = '#df87f2';
        var $textMutedColor = '#b9b9c3';
        var $salesLineChart = document.querySelector('#sales-line-chart');
        var salesLineChart;
        let dataChart = [];
        var salesLineChartOptions;
        let labels = [];
        const charts = {};
        let year_detail = $('.year-detail');
        let hasShow = false;

        year_detail.on('click', function () {

            hasShow = !hasShow;
            if (hasShow) {
                $(this).next('#show-item-year').show();
            } else {
                $(this).next('#show-item-year').hide();
            }
            $(this).next('#show-item-year').css('transform', 'translate(-63px, 30px)');

        });

        // filte year
        $('.filter-year').on('click', function (){
            const year = $(this).attr('data-year');
            axios.get('{{route("admin.users.get_orders_chart")}}?id='+ '{{$user->id}}', {
                    params: {
                        year: year
                    }
                }
            ).then(res =>{
                const { axis_label, data_chart, total_quatity } =res.data.data;
                let dataChart = [];
                let labels = [];
                year_detail.html(year);

                for(const [key, value] of Object.entries(axis_label)){
                    labels.push(key);
                }
                for (const [key, value] of Object.entries(data_chart)) {

                    dataChart.push(value);
                }

                charts.financeChart.updateOptions({

                    xaxis: {
                        categories: labels
                    },
                    series: [
                        {
                            name: 'Sales',
                            data: dataChart
                        }
                    ]

                })

            })
        });

        fetch('{{route("admin.users.get_orders_chart")}}?id=' + '{{$user->id}}').then(res => res.json()).then(data => {

            const { axis_label, data_chart, total_quatity } = data.data;

            let dataChart = [];

            let labels = [];

            for (const [key, value] of Object.entries(axis_label)) {
                labels.push(key);
            }

            for (const [key, value] of Object.entries(data_chart)) {

                dataChart.push(value);
            }
            console.log(labels, dataChart);
            salesLineChartOptions = {
                chart: {
                    height: 240,
                    toolbar: {show: false},
                    zoom: {enabled: false},
                    type: 'line',
                    dropShadow: {
                        enabled: true,
                        top: 18,
                        left: 2,
                        blur: 5,
                        opacity: 0.2
                    },
                    offsetX: -10
                },
                stroke: {
                    curve: 'smooth',
                    width: 4
                },
                grid: {
                    borderColor: $strokeColor,
                    padding: {
                        top: -20,
                        bottom: 5,
                        left: 20
                    }
                },
                legend: {
                    show: false
                },
                colors: [$salesStrokeColor2],
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'dark',
                        inverseColors: false,
                        gradientToColors: [window.colors.solid.primary],
                        shadeIntensity: 1,
                        type: 'horizontal',
                        opacityFrom: 1,
                        opacityTo: 1,
                        stops: [0, 100, 100, 100]
                    }
                },
                markers: {
                    size: 0,
                    hover: {
                        size: 5
                    }
                },
                xaxis: {
                    labels: {
                        offsetY: 5,
                        style: {
                            colors: $textMutedColor,
                            fontSize: '0.857rem'
                        }
                    },
                    axisTicks: {
                        show: false
                    },
                    categories: labels,
                    axisBorder: {
                        show: false
                    },
                    tickPlacement: 'on'
                },
                yaxis: {
                    tickAmount: 5,
                    labels: {
                        style: {
                            colors: $textMutedColor,
                            fontSize: '0.857rem'
                        },
                        formatter: function (val) {
                            return val > 999 ? (val / 1000).toFixed(1) + 'k' : val;
                        }
                    }
                },
                tooltip: {
                    x: {show: false}
                },
                series: [
                    {
                        name: 'Sales',
                        data: dataChart
                    }
                ]
            };
            salesLineChart = new ApexCharts($salesLineChart, salesLineChartOptions);
            salesLineChart.render();
            charts.financeChart = salesLineChart;

        });



    </script>
@endpush