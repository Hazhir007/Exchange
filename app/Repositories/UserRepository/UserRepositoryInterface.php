<?php


namespace App\Repositories\UserRepository;


interface UserRepositoryInterface
{
    public function all();
    public function create(array  $data);
    public function update(array $data, $id);
    public function delete(int $id);
    public function find(int $id);
    public function findByEmail(string $email);
    public function saveResetPasswordData(array $data);
    public function updatePassword(array $data);
}
