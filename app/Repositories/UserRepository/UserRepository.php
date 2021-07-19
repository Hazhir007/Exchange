<?php


namespace App\Repositories\UserRepository;


use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{
    /**
     * UserRepository constructor.
     * @param User $model
     */
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

    public function find(int $id): Builder
    {
        if (null === $user = $this->model->find($id)) {
            throw new ModelNotFoundException("User not found");
        }

        return $user;
    }

    /**
     * @param string $email
     *
     * @return User
     */
    public function findByEmail(string $email): Builder
    {
        if (null === $user = $this->model->where('email', $email)) {
            throw new ModelNotFoundException("User not found");
        }

        return $user;
    }

    public function saveResetPasswordData(array $userData): void
    {
        $resetRequestedUser = DB::table('password_resets')->where('email', $userData['email'])->first();
        if ($resetRequestedUser)
        {
            DB::table('password_resets')
                ->where('email', $resetRequestedUser->email)
                ->update(['token' => $userData['token']]);
        } else {
            DB::table('password_resets')
                ->insert(['email' => $userData['email'], 'token' => $userData['token'], 'created_at' => now()]);
        }


    }

    public function getResetPasswordData(string $email)
    {
        $resetRequestedUser = DB::table('password_resets')->where('email', $email);

        if ( ! $resetRequestedUser) {
            throw new ModelNotFoundException("reset password request not found");
        }

        return $resetRequestedUser;
    }

    public function updatePassword(array $userData)
    {
            return $this->model->where('email', $userData['email'])
                ->update(['password' => bcrypt($userData['password'])]);
    }

    public function deletePasswordResetToken(string $email)
    {
        $resetRequestedUser = DB::table('password_resets')->where('email', $email)->delete();

        if ( ! $resetRequestedUser) {
            throw new ModelNotFoundException("the reset password id does not exist");
        }

        return $resetRequestedUser;

    }

    public function addOrder(array $orderData)
    {
        $this->model->orders()->create($orderData);
    }

}
