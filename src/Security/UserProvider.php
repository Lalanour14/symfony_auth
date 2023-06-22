<?php

namespace App\Security;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class UserProvider implements UserProviderInterface {

    public function __construct(private UserRepository $repo){}

    public function loadUserByIdentifier(string $identifier):UserInterface {
        $user = $this->repo->findByEmail($identifier);
        if($user == null) {
            throw new UserNotFoundException();
        }
        return $user;
    }

    public function refreshUser(UserInterface $userInterface):UserInterface {
        return $this->loadUserByIdentifier($userInterface->getUserIdentifier());
    }

    public function supportsClass(string $class):bool {
        return $class == User::class;
    }
}