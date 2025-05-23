<?php

namespace HW_Les7\Domain\Controllers;

use HW_Les7\Application\Application;

class AbstractController
{

    protected array $actionsPermissions = [];

    public function getUserRoles(): array
    {
        $roles = [];

        if (isset($_SESSION['id_user'])) {
            $rolesSql = "SELECT * FROM user_roles WHERE id_user = :id";

            $handler = Application::$storage->get()->prepare($rolesSql);
            $handler->execute(['id' => $_SESSION['id_user']]);
            $result = $handler->fetchAll();

            if (!empty($result)) {
                foreach ($result as $role) {
                    $roles[] = $role['role'];
                }
            }
        }

        return $roles;
    }

    public function getActionsPermissions(string $methodName): array
    {
        return isset($this->actionsPermissions[$methodName]) ? $this->actionsPermissions[$methodName] : [];
    }
}
