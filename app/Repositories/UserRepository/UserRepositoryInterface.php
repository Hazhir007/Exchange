<?php


namespace App\Repositories\UserRepository;


interface UserRepositoryInterface
{
    public function all();
    public function create(array  $data);
    public function update(array $data, $id);
    public function delete($id);
    public function find($id);
}
