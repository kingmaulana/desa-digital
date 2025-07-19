<?php 

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{
    public function getAll(?string $search, ?int $limit, bool $execute)
    {
        $query = User::where(function ($query) use ($search) {
            // jika param search ada maka lakukan search
            if($search) {
                $query->search($search);
            }
        });

        if($limit) {
            // take -> ngambil data base on limit
            $query->take($limit);
        }

        if($execute) {
            return $query->get();
        }

        return $query;
    }

    public function getAllPaginated(?string $search, ?int $rowPerPage)
    {
        $query = $this->getAll($search, $rowPerPage, false);

        return $query->paginate($rowPerPage);
    }

    public function getById(string $id)
    {
        $query = User::where('id', $id);

        return $query->first();
    }

    public function create(array $data)
    {
        DB::beginTransaction();

        try {
            $user = new User;
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->save();

            // setelah commit maka data akan masuk ke database
            DB::commit();
            return $user;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    public function update(string $id, array $data)
    {
        DB::beginTransaction();
        try {
            $user = User::find($id);
            $user->name = $data['name'];
            $user->email = $data['email'];

            if(isset($data['password'])) {
                $user->password = bcrypt($data['password']);
            }

            $user->save();
            // setelah commit maka data akan masuk ke database
            DB::commit();
            return $user;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }

    }

    public function delete(string $id)
    {
        DB::beginTransaction();
        try {
            $user = User::find($id);

            $user->delete();
            // setelah commit maka data akan masuk ke database
            DB::commit();
            return $user;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
}