<?php
namespace App\Providers;

use App\Models\Employee;
use App\Models\Manager;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Facades\Hash;

class ManagerAuthProvider implements UserProvider {
    /**
     * @var Manager
     */
    private $model;

    public function __construct(Manager $managerModel) {
        $this->model = $managerModel;
    }

    public function retrieveById($identifier) {
        return Employee::firstWhere('email', $identifier)->manager()->first();
    }

    public function retrieveByToken($identifier, $token) {
        // TODO: Implement retrieveByToken() method.
    }

    public function updateRememberToken(Authenticatable $user, $token) {
        // TODO: Implement updateRememberToken() method.
    }

    public function retrieveByCredentials(array $credentials) {
        return Employee::firstWhere('email', $credentials['email'])->manager()->first();
    }

    public function validateCredentials(Authenticatable $user, array $credentials): bool {
        if (strcmp($credentials['email'], $user->getAuthIdentifier()) === 0 &&
                Hash::check($credentials['password'], $user->getAuthPassword())) {
            return true;
        }

        return false;
    }
}
