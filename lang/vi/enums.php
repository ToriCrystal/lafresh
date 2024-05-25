<?php

use App\Enums\Admin\AdminRoles;
use App\Enums\Category\CategoryStatus;
use App\Enums\Notification\NotificationStatus;
use App\Enums\Order\OrderPaymentMethod;
use App\Enums\Order\OrderShippingMethod;
use App\Enums\Order\OrderStatus;
use App\Enums\Product\{ProductFeature, ProductNew, ProductInstock, ProductPurchaseQtyType, ProductStatus, ProductUnit};
use App\Enums\ProductCategory\ProductCategoryShowHome;
use App\Enums\User\UserLevelTypeDiscount;
use App\Enums\ProductCategory\ProductCategoryStatus;
use App\Enums\User\{UserGender, UserVip, UserRoles};

return [
    AdminRoles::class => [
        AdminRoles::SuperAdmin->value => 'Dev',
        AdminRoles::Admin->value => 'Admin',
    ],
    UserRoles::class => [
        UserRoles::Agent->value => 'Đại lý',
        UserRoles::Seller->value => 'Seller',
    ],
    UserRoles::class => [
        UserRoles::Agent->value => 'Đại lý',
        UserRoles::Seller->value => 'Seller',
    ],
    UserGender::class => [
        UserGender::Male->value => 'Nam',
        UserGender::Female->value => 'Nữ',
        UserGender::Other->value => 'Khác',
    ],
    ProductUnit::class => [
        ProductUnit::Pail->value => 'Thùng',
        ProductUnit::Bottle->value => 'Bình'
    ],
    ProductUnit::class => [
        ProductUnit::Pail->value => 'Thùng',
        ProductUnit::Bottle->value => 'Bình'
    ],
    ProductCategoryStatus::class => [
        ProductCategoryStatus::Published->value => 'Đã xuất bản',
        ProductCategoryStatus::Draft->value => 'Bản nháp'
    ],
    ProductStatus::class => [
        ProductStatus::Published->value => 'Đã xuất bản',
        ProductStatus::Draft->value => 'Bản nháp'
    ],
    ProductInstock::class => [
        ProductInstock::Yes->value => 'Còn hàng',
        ProductInstock::No->value => 'Hết hàng'
    ],
    ProductPurchaseQtyType::class => [
        ProductPurchaseQtyType::Amount->value => 'Số tiền',
        ProductPurchaseQtyType::Percent->value => 'Phần trăm'
    ],
    UserLevelTypeDiscount::class => [
        UserLevelTypeDiscount::Amount->value => 'Số tiền',
        UserLevelTypeDiscount::Percent->value => 'Phần trăm'
    ],
    OrderStatus::class => [
        OrderStatus::Unprocessed->value => 'Chưa xử lý',
        OrderStatus::Processing->value => 'Đã xử lý',
        OrderStatus::Unprocessed->value => 'Chưa xử lý',
        OrderStatus::Processing->value => 'Đã xử lý',
        OrderStatus::Completed->value => 'Đã hoàn thành',
        OrderStatus::Cancelled->value => 'Đã hủy'
    ],
    ProductFeature::class => [
        ProductFeature::No->value => 'Không',
        ProductFeature::Yes->value => 'Có'
    ],
    ProductNew::class => [
        ProductNew::No->value => 'Không',
        ProductNew::Yes->value => 'Có'
    ],
    ProductCategoryShowHome::class => [
        ProductCategoryShowHome::No->value => 'Không',
        ProductCategoryShowHome::Yes->value => 'Có'
    ],
    CategoryStatus::class => [
        CategoryStatus::Draft->value => 'Bản nháp',
        CategoryStatus::Published->value => 'Đã xuất bản'
    ],
    OrderPaymentMethod::class => [
        OrderPaymentMethod::COD->value => 'Thanh toán tiền mặt',
        OrderPaymentMethod::BankTransfer->value => 'Chuyển khoản'
    ],
    OrderShippingMethod::class => [
        OrderShippingMethod::Road->value => 'Vận chuyển 247'
    ],

  
    NotificationStatus::class => [
        NotificationStatus::Published->value => "Đã Gửi Thông Báo",
        NotificationStatus::Draft->value => 'Chưa Gửi'
    ],
];
