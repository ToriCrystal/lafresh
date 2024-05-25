<?php

return [
    [
        'title' => 'Dashboard',
        'routeName' => 'admin.dashboard',
        'icon' => '<i class="ti ti-home"></i>',
        'roles' => [
            App\Enums\Admin\AdminRoles::SuperAdmin,
            App\Enums\Admin\AdminRoles::Admin
        ],
        'sub' => []
    ],
    [
        'title' => 'Thông Báo',
        'routeName' => null,
        'icon' => '<i class="ti ti-bell"></i>',
        'roles' => [],
        'sub' => [
            [
                'title' => 'Thêm Thông Báo',
                'routeName' => 'admin.notify.create',
                'icon' => '<i class="ti ti-plus"></i>',
                'roles' => [],
            ],
            [
                'title' => 'DS Thông Báo',
                'routeName' => 'admin.notify.index',
                'icon' => '<i class="ti ti-list"></i>',
                'roles' => [],
            ],
        ]
    ],


    [
        'title' => 'Bài viết',
        'routeName' => null,
        'icon' => '<i class="ti ti-article"></i>',
        'roles' => [],
        'sub' => [
            [
                'title' => 'Thêm bài viết',
                'routeName' => 'admin.post.create',
                'icon' => '<i class="ti ti-plus"></i>',
                'roles' => [],
            ],
            [
                'title' => 'DS bài viết',
                'routeName' => 'admin.post.index',
                'icon' => '<i class="ti ti-list"></i>',
                'roles' => [],
            ],
            [
                'title' => 'Chuyên mục',
                'routeName' => 'admin.category.index',
                'icon' => '<i class="ti ti-list"></i>',
                'roles' => [
                    App\Enums\Admin\AdminRoles::SuperAdmin,
                    App\Enums\Admin\AdminRoles::Admin
                ],
            ]
        ]
    ],
    [
        'title' => 'Đơn hàng',
        'routeName' => null,
        'icon' => '<i class="ti ti-box"></i>',
        'roles' => [],
        'sub' => [
            [
                'title' => 'Thêm đơn hàng',
                'routeName' => 'admin.order.create',
                'icon' => '<i class="ti ti-plus"></i>',
                'roles' => [],
            ],
            [
                'title' => 'DS đơn hàng',
                'routeName' => 'admin.order.index',
                'icon' => '<i class="ti ti-list"></i>',
                'roles' => [],
            ]
        ]
    ],
    [
        'title' => 'Sản phẩm',
        'routeName' => null,
        'icon' => '<i class="ti ti-brand-producthunt"></i>',
        'roles' => [],
        'sub' => [
            [
                'title' => 'Thêm sản phẩm',
                'routeName' => 'admin.product.create',
                'icon' => '<i class="ti ti-plus"></i>',
                'roles' => [
                    App\Enums\Admin\AdminRoles::SuperAdmin,
                    App\Enums\Admin\AdminRoles::Admin
                ],
            ],
            [
                'title' => 'DS sản phẩm',
                'routeName' => 'admin.product.index',
                'icon' => '<i class="ti ti-list"></i>',
                'roles' => [],
            ],
            [
                'title' => 'Danh mục',
                'routeName' => 'admin.product_category.index',
                'icon' => '<i class="ti ti-list"></i>',
                'roles' => [
                    App\Enums\Admin\AdminRoles::SuperAdmin,
                    App\Enums\Admin\AdminRoles::Admin
                ],
            ],
            [
                'title' => 'Chiết khấu',
                'routeName' => 'admin.discount.agent',
                'icon' => '<i class="ti ti-discount"></i>',
                'roles' => [
                    App\Enums\Admin\AdminRoles::SuperAdmin,
                    App\Enums\Admin\AdminRoles::Admin
                ],
            ],
        ]
    ],
 
    [
        'title' => 'QL Thành viên',
        'routeName' => null,
        'icon' => '<i class="ti ti-users"></i>',
        'roles' => [
            App\Enums\Admin\AdminRoles::SuperAdmin,
            App\Enums\Admin\AdminRoles::Admin
        ],
        'sub' => [
            [
                'title' => 'Thêm thành viên',
                'routeName' => 'admin.user.create',
                'icon' => '<i class="ti ti-plus"></i>',
                'roles' => [],
            ],
            [
                'title' => 'DS thành viên',
                'routeName' => 'admin.user.index',
                'icon' => '<i class="ti ti-list"></i>',
                'roles' => [],
            ],
            // [
            //     'title' => 'Cấp bật thành viên',
            //     'routeName' => 'admin.user.level.index',
            //     'icon' => '<i class="ti ti-user-up"></i>',
            //     'roles' => [],
            // ],
        ]
    ],
    [
        'title' => 'Chính sách thưởng',
        'routeName' => null,
        'icon' => '<i class="ti ti-businessplan"></i>',
        'roles' => [],
        'sub' => [
            [
                'title' => 'Thông tin',
                'routeName' => 'admin.bonus.policy.info',
                'icon' => '<i class="ti ti-info-circle"></i>',
                'roles' => [],
            ],
            [
                'title' => 'Tiền thưởng doanh số',
                'routeName' => 'admin.bonus.sales.index',
                'icon' => '<i class="ti ti-businessplan"></i>',
                'roles' => [],
            ],
        ]
    ],
    [
        'title' => 'QL Admin',
        'routeName' => null,
        'icon' => '<i class="ti ti-user-cog"></i>',
        'roles' => [
            App\Enums\Admin\AdminRoles::SuperAdmin,
            App\Enums\Admin\AdminRoles::Admin
        ],
        'sub' => [
            [
                'title' => 'Thêm admin',
                'routeName' => 'admin.admin.create',
                'icon' => '<i class="ti ti-plus"></i>',
                'roles' => [],
            ],
            [
                'title' => 'DS admin',
                'routeName' => 'admin.admin.index',
                'icon' => '<i class="ti ti-list"></i>',
                'roles' => [],
            ],
        ]
    ],
    [
        'title' => 'Sliders',
        'routeName' => null,
        'icon' => '<i class="ti ti-slideshow"></i>',
        'roles' => [],
        'sub' => [
            [
                'title' => 'Thêm Sliders',
                'routeName' => 'admin.slider.create',
                'icon' => '<i class="ti ti-plus"></i>',
                'roles' => [],
            ],
            [
                'title' => 'DS Sliders',
                'routeName' => 'admin.slider.index',
                'icon' => '<i class="ti ti-list"></i>',
                'roles' => [],
            ],
        ]
    ],
    [
        'title' => 'Trang',
        'routeName' => null,
        'icon' => '<i class="ti ti-folders"></i>',
        'roles' => [],
        'sub' => [
            [
                'title' => 'Thêm Trang',
                'routeName' => 'admin.page.create',
                'icon' => '<i class="ti ti-plus"></i>',
                'roles' => [
                    App\Enums\Admin\AdminRoles::SuperAdmin
                ],
            ],
            [
                'title' => 'DS Trang',
                'routeName' => 'admin.page.index',
                'icon' => '<i class="ti ti-list"></i>',
                'roles' => [],
            ]
        ]
    ],
    [
        'title' => 'Giao diện',
        'routeName' => null,
        'icon' => '<i class="ti ti-brush"></i>',
        'roles' => [],
        'sub' => [
            [
                'title' => 'Menu',
                'routeName' => 'admin.menu.index',
                'icon' => '<i class="ti ti-list"></i>',
                'roles' => [],
            ],
        ]
    ],
    [
        'title' => 'Thống kê',
        'routeName' => null,
        'icon' => '<i class="ti ti-chart-bar"></i>',
        'roles' => [],
        'sub' => [
            [
                'title' => 'Doanh thu',
                'routeName' => 'admin.statistic.revenue',
                'icon' => '<i class="ti ti-point-filled"></i>',
                'roles' => [],
            ],
            [
                'title' => 'Đơn hàng',
                'routeName' => 'admin.statistic.order',
                'icon' => '<i class="ti ti-point-filled"></i>',
                'roles' => [],
            ],
            [
                'title' => 'Sản phẩm đã bán',
                'routeName' => 'admin.statistic.product_sold',
                'icon' => '<i class="ti ti-point-filled"></i>',
                'roles' => [],
            ]
        ]
    ],
    [
        'title' => 'Cài đặt',
        'routeName' => null,
        'icon' => '<i class="ti ti-settings"></i>',
        'roles' => [
            App\Enums\Admin\AdminRoles::SuperAdmin,
            App\Enums\Admin\AdminRoles::Admin
        ],
        'sub' => [
            [
                'title' => 'Chung',
                'routeName' => 'admin.setting.general',
                'icon' => '<i class="ti ti-tool"></i>',
                'roles' => [],
            ],
        ]
    ],
];
