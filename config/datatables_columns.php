
<?php

return [
    'product_categories' => [
        'name' => [
            'title' => 'Tên danh mục',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'avatar' => [
            'title' => 'Hình ảnh',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'status' => [
            'title' => 'Trạng thái',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'orderable' => false,
            'addClass' => 'align-middle',
            'visible' => false
        ],
        'action' => [
            'title' => 'Thao tác',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'order' => [
        'id' => [
            'title' => 'Mã đơn hàng',
            'orderable' => false,
        ],
        'user' => [
            'title' => 'Thành viên',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'status' => [
            'title' => 'Trạng thái',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'total' => [
            'title' => 'Tổng tiền',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'created_at' => [
            'title' => 'Ngày đặt',
            'orderable' => false,
            'visible' => false,
            'addClass' => 'align-middle'
        ],
        'action' => [
            'title' => 'Thao tác',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'notification' => [
        'id' => [
            'title' => 'Mã Thông Báo',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'fullname' => [
            'title' => 'Tên',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'desc' => [
            'title' => 'Mô Tả',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'status' => [
            'title' => 'Trạng thái',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'orderable' => false,
            'addClass' => 'align-middle',
            'visible' => true
        ],
        'action' => [
            'title' => 'Thao tác',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],


    'product' => [
        'checkbox' => [
            'title' => 'Chọn',
            'orderable' => false,
            'addClass' => 'text-center',
            'width' => '10px',
            'footer' => '<input type="checkbox" class="check-all"/>'
        ],
        'feature_image' => [
            'title' => 'Ảnh',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'name' => [
            'title' => 'Tên',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'in_stock' => [
            'title' => 'Kho',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'status' => [
            'title' => 'Trạng thái',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'price' => [
            'title' => 'Giá',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'categories' => [
            'title' => 'Danh mục',
            'orderable' => false,
            'visible' => false,
            'addClass' => 'align-middle'
        ],
        'viewed' => [
            'title' => 'Lượt xem',
            'orderable' => false,
            'visible' => false,
            'addClass' => 'align-middle'
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'orderable' => false,
            'visible' => false,
            'addClass' => 'align-middle'
        ],
        'unit' => [
            'title' => 'Loại',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'action' => [
            'title' => 'Thao tác',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'category' => [
        'name' => [
            'title' => 'Tên danh mục',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'status' => [
            'title' => 'Trạng thái',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'action' => [
            'title' => 'Thao tác',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'post' => [
        'feature_image' => [
            'title' => 'Ảnh',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'title' => [
            'title' => 'Tiêu đề',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'status' => [
            'title' => 'Trạng thái',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'viewed' => [
            'title' => 'Lượt xem',
            'orderable' => false,
            'addClass' => 'align-middle',
            'visible' => true
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'orderable' => false,
            'addClass' => 'align-middle',
            'visible' => true
        ],
        'action' => [
            'title' => 'Thao tác',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'page' => [
        'title' => [
            'title' => 'Tiêu đề',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'orderable' => false,
            'addClass' => 'align-middle',
            'visible' => true
        ],
        'action' => [
            'title' => 'Thao tác',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'menu' => [
        'name' => [
            'title' => 'Tên menu',
            'orderable' => false
        ],
        'status' => [
            'title' => 'Trạng thái',
            'orderable' => false,
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'orderable' => false,
            'visible' => false
        ],
        'action' => [
            'title' => 'Thao tác',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center'
        ],
    ],
    'admin' => [
        'DT_RowIndex' => [
            'title' => 'STT',
            'width' => '20px',
            'orderable' => false
        ],
        'fullname' => [
            'title' => 'Họ tên',
            'orderable' => false
        ],
        'phone' => [
            'title' => 'Số điện thoại',
            'orderable' => false
        ],
        'email' => [
            'title' => 'Email',
            'orderable' => false,
        ],
        'roles' => [
            'title' => 'Roles',
            'orderable' => false,
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'orderable' => false,
            'visible' => false
        ],
        'action' => [
            'title' => 'Thao tác',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center'
        ],
    ],
    'user' => [
        'username' => [
            'title' => 'Tên đăng nhập',
            'orderable' => false,
            'visible' => false
        ],
        'fullname' => [
            'title' => 'Họ tên',
            'orderable' => false
        ],
        'email' => [
            'title' => 'Email',
            'orderable' => false,
        ],
        'phone' => [
            'title' => 'Số điện thoại',
            'orderable' => false
        ],
        'roles' => [
            'title' => 'Vai trò',
            'orderable' => false,
            'visible' => true
        ],
        'roles' => [
            'title' => 'Vai trò',
            'orderable' => false,
            'visible' => true
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'orderable' => false,
            'visible' => false
        ],
        'action' => [
            'title' => 'Thao tác',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center'
        ],
    ],
    'user_level' => [
        'position' => [
            'title' => 'Thứ tự',
            'orderable' => false,
            'visible' => true
        ],
        'name' => [
            'title' => 'Tên cấp bậc',
            'orderable' => false
        ],
        'type_discount' => [
            'title' => 'Loại',
            'orderable' => false,
        ],
        'min_amount' => [
            'title' => 'Số tiên lên cấp',
            'orderable' => false
        ],
        'plain_value' => [
            'title' => 'Giá trị',
            'orderable' => false
        ],
        'action' => [
            'title' => 'Thao tác',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center'
        ],
    ],
    'slider' => [
        'name' => [
            'title' => 'Tên',
            'orderable' => false,
            'width' => '150px',
            'addClass' => 'align-middle'
        ],
        'plain_key' => [
            'title' => 'Key',
            'orderable' => false,
            'width' => '150px',
            'addClass' => 'align-middle'
        ],
        'status' => [
            'title' => 'Trạng thái',
            'orderable' => false,
            'width' => '150px',
            'addClass' => 'align-middle'
        ],
        'items' => [
            'title' => 'Slider Item',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'orderable' => false,
            'visible' => false,
            'addClass' => 'align-middle'
        ],
        'action' => [
            'title' => 'Thao tác',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'slider_item' => [
        'title' => [
            'title' => 'Tên',
            'orderable' => false,
            'width' => '150px',
            'addClass' => 'align-middle'
        ],
        'image' => [
            'title' => 'Hình ảnh',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'position' => [
            'title' => 'Vị trí',
            'orderable' => false,
            'width' => '150px',
            'addClass' => 'align-middle'
        ],
        'status' => [
            'title' => 'Trạng thái',
            'orderable' => false,
            'width' => '150px',
            'addClass' => 'align-middle'
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'orderable' => false,
            'visible' => false,
            'addClass' => 'align-middle'
        ],
        'action' => [
            'title' => 'Thao tác',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'bonus_sale' => [
        'user_id' => [
            'title' => 'Đại lý',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'month' => [
            'title' => 'Tháng',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'qty_pail' => [
            'title' => 'Số thùng đã mua',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'qty_bottle' => [
            'title' => 'Số bình đã mua',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'reward' => [
            'title' => 'Tiền thưởng',
            'orderable' => false,
            'visible' => true,
            'addClass' => 'text-center align-middle'
        ],
        'action' => [
            'title' => 'Thao tác',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'discount_seller' => [
        'feature_image' => [
            'title' => 'Ảnh',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'product_id' => [
            'title' => 'Sản phẩm',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'qty' => [
            'title' => 'Số lượng',
            'orderable' => false,
            'addClass' => 'align-middle text-center'
        ],
        'qty_donate' => [
            'title' => 'Tặng',
            'orderable' => false,
            'addClass' => 'align-middle text-center'
        ],
        'action' => [
            'title' => 'Thao tác',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],

    ]
];
