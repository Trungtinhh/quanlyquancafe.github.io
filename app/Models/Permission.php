<?php

namespace App\Models;

use Illuminate\Support\Arr;

/**;
 * Class Permission
 *
 * @package App\Models
 *
 * @property string|null $name
 * @property string|null $title
 */
class Permission extends \Spatie\Permission\Models\Permission
{
    const SYSTEM__CONFIGURATION__MANAGEMENT = 'system.configuration.management';
    const SYSTEM__PERMISSION__MANAGEMENT = 'system.permission.management';
    const SYSTEM__VIEW__BASIC = 'system.view.basic';
    const SYSTEM__UPDATE = 'system.update';
    const SYSTEM__CREATE = 'system.create';
    const SYSTEM__DELETE = 'system.delete';

    const SYSTEM__PROJECT__VIEW__BASIC = 'system.project.view.basic';
    const SYSTEM__PROJECT__VIEW__DETAIL = 'system.project.view.detail';

    const SYSTEM__PROJECT__UPDATE = 'system.project.update';
    const SYSTEM__PROJECT__CREATE = 'system.project.create';
    const SYSTEM__PROJECT__DELETE = 'system.project.delete';
    const SYSTEM__PROJECT__PERMISSION = 'system.project.permission';





    public static function getPermissionDefault()
    {
        return [
            static::SYSTEM__CONFIGURATION__MANAGEMENT => [
                'title' => 'Quản lý cấu hình',
                'name' => static::SYSTEM__CONFIGURATION__MANAGEMENT,
            ],
            static::SYSTEM__PERMISSION__MANAGEMENT => [
                'title' => 'Quản lý người dùng, phân quyền',
                'name' => static::SYSTEM__PERMISSION__MANAGEMENT,
            ],
            static::SYSTEM__VIEW__BASIC => [
                'title' => 'Xem',
                'name' => static::SYSTEM__VIEW__BASIC,
            ],
            static::SYSTEM__UPDATE => [
                'title' => 'Sửa',
                'name' => static::SYSTEM__UPDATE,
            ],
            static::SYSTEM__CREATE => [
                'title' => 'Thêm',
                'name' => static::SYSTEM__CREATE,
            ],
            static::SYSTEM__DELETE => [
                'title' => 'Xóa',
                'name' => static::SYSTEM__DELETE,
            ],
        ];
    }

    /**
     * @var string[]
     */
    protected $appends = [
        'title',
    ];

    /**
     * @return array
     */
    public static function getPermissionDefaultsByGroup()
    {
        return [
            'Hệ thống' => [
                static::SYSTEM__CONFIGURATION__MANAGEMENT => [
                    'title' => 'Quản lý cấu hình',
                    'name' => static::SYSTEM__CONFIGURATION__MANAGEMENT,
                ],
                static::SYSTEM__PERMISSION__MANAGEMENT => [
                    'title' => 'Quản lý người dùng, phân quyền',
                    'name' => static::SYSTEM__PERMISSION__MANAGEMENT,
                ],
            ],

            'Dự án' => [
                static::SYSTEM__PROJECT__VIEW__BASIC => [
                    'title' => 'Xem Thông tin cơ bản',
                    'name' => static::SYSTEM__PROJECT__VIEW__BASIC,
                ],
                static::SYSTEM__PROJECT__VIEW__DETAIL => [
                    'title' => 'Xem thông tin chi tiết',
                    'name' => static::SYSTEM__PROJECT__VIEW__DETAIL,
                ],
                static::SYSTEM__PROJECT__UPDATE => [
                    'title' => 'Cập nhật dự án',
                    'name' => static::SYSTEM__PROJECT__UPDATE,
                ],
                static::SYSTEM__PROJECT__CREATE => [
                    'title' => 'Tạo dự án',
                    'name' => static::SYSTEM__PROJECT__CREATE,
                ],
                static::SYSTEM__PROJECT__DELETE => [
                    'title' => 'Xóa dự án',
                    'name' => static::SYSTEM__PROJECT__DELETE,
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public static function getPermissionDefaults()
    {
        $result = [];

        $permissionDefaults = static::getPermissionDefaultsByGroup();
        foreach ($permissionDefaults as $groupName => $permissions) {
            foreach ($permissions as $permissionKey => $permission) {
                $permission['group_name'] = $groupName;
                $result[$permissionKey] = $permission;
            }
        }

        return $result;
    }

    /**
     * @return mixed|string
     */
    public function getTitleAttribute()
    {
        $name = $this->name;
        if (!empty($name)) {
            $permissionDefaults = self::getPermissionDefaults();
            if (\is_array($permissionDefaults) && isset($permissionDefaults[$name])) {
                return Arr::get($permissionDefaults[$name], 'title');
            }
        }

        return '';
    }
}
