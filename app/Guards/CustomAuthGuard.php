<?php
namespace App\Guards;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Http\Request;

class CustomAuthGuard implements Guard {
    private $request;
    private $provider;
    private $user;

    public function __construct(UserProvider $provider, Request $request) {
        $this->request = $request;
        $this->provider = $provider;
        $this->user = null;
    }

    public function check(): bool {
        return isset($this->user);
    }

    public function guest(): bool {
        return !isset($this->user);
    }

    public function user(): ?Authenticatable {
        if ($this->check()) {
            return $this->user;
        }
        return null;
    }

    public function id() {
        if ($this->check()) {
            return $this->user->getAuthIdentifier();
        }
        return null;
    }

    public function validate(array $credentials = []): bool {
        if (!isset($credentials['email']) || empty($credentials['email']) || !isset($credentials['password']) || empty($credentials['password'])) {
            return false;
        }

        $user = $this->provider->retrieveById($credentials['email']);

        if (!isset($user)) {
            return false;
        }

        if ($this->provider->validateCredentials($user, $credentials)) {
            $this->setUser($user);
            return true;
        } else {
            return false;
        }
    }

    public function setUser(Authenticatable $user) {
        $this->user = $user;
    }
}
