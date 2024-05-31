<?php

namespace App\Enum;

enum PermissionsEnum: string
{
    // post module permissions
    case VIEW_USERS = 'view.users';
    case CREATE_POST = 'create.post';
    case UPDATE_POST = 'update.post';
    case DELETE_POST = 'delete.post';
    case VIEW_POST = 'view.post';
    case VIEW_DASHBOARD = 'view.dashboard';

    
}
