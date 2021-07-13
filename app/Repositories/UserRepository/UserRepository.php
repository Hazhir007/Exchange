<?php


namespace App\Repositories\UserRepository;


use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(private User $model)
    {

    }

    public function all(): Collection|array
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->model->where('id', $id)
            ->update($data);
    }

    public function delete(int $id)
    {
        return $this->model->destroy($id);
    }

    public function find(int $id)
    {
        if (null == $user = $this->model->find($id)) {
            throw new ModelNotFoundException("User not found");
        }

        return $user;
    }

    public function findByEmail(string $email)
    {
        if (null == $user = $this->model->where('email', $email)) {
            throw new ModelNotFoundException("User not found");
        }

        return $user;
    }
}