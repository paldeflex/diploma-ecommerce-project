<?php

namespace App\Services;

use App\Enums\RoleEnum;

class DashboardRouteResolverService
{
    protected array $routes = [
        RoleEnum::ADMIN->value    => ['route' => 'admin.dashboard', 'label' => 'Администратор'],
        RoleEnum::SELLER->value   => ['route' => 'seller.dashboard', 'label' => 'Продавец'],
        RoleEnum::CUSTOMER->value => ['route' => 'customer.dashboard', 'label' => 'Покупатель'],
    ];

    protected array $default = ['route' => 'home', 'label' => 'roles.default'];

    /**
     * Возвращает массив с маршрутом и названием
     */
    public function resolve($role): array
    {
        return $this->routes[$role->value] ?? $this->default;
    }
}
