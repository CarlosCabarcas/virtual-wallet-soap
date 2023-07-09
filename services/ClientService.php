<?php

class UserService {
    private $usersFile = 'services/users.json';

    public function saveUser($name, $email) {
        $users = $this->loadUsers();

        $user = [
            'name' => $name,
            'email' => $email
        ];

        $users[] = $user;

        $this->saveUsers($users);

        return json_encode($user);
    }

    private function loadUsers() {
        if (file_exists($this->usersFile)) {
            $usersData = file_get_contents($this->usersFile);
            return json_decode($usersData, true);
        }

        return [];
    }

    private function saveUsers($users) {
        $usersData = json_encode($users);
        file_put_contents($this->usersFile, $usersData);
    }
}
