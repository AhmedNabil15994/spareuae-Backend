<?php

namespace Modules\User\Repositories\Dashboard;

use Modules\User\Entities\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminRepository
{
    public function __construct(User $user)
    {
        $this->user      = $user;
    }

    /*
    * Get All Normal Users with Admin Roles
    */
    public function getAllAdmins($order = 'id', $sort = 'desc')
    {
        $users = $this->user->adminUser()->orderBy($order, $sort)->get();
        return $users;
    }

    /*
    * Find Object By ID
    */
    public function findById($id)
    {
        $user = $this->user->withDeleted()->find($id);
        return $user;
    }

    /*
    * Find Object By ID
    */
    public function findByEmail($email)
    {
        $user = $this->user->where('email', $email)->first();
        return $user;
    }


    /*
    * Create New Object & Insert to DB
    */
    public function create($request)
    {
        DB::beginTransaction();

        try {
            $image = $request->image ? pathFileInStroage($request, "image", "admins") : "/uploads/default.png";

            $user = $this->user->create([
              'name'          => $request['name'],
              'email'         => $request['email'],
              'phone_code'    => '965',
              "type"          => "admin",
              'mobile'        => $request['mobile'],
              'password'      => Hash::make($request['password']),
              'image'         => $image,
          ]);

            if ($request['roles'] != null) {
                $this->saveRoles($user, $request);
            }

            DB::commit();
            return $user;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function saveRoles($user, $request)
    {
        foreach ($request['roles'] as $key => $value) {
            $user->assignRole($value);
        }

        return true;
    }

    /*
    * Find Object By ID & Update to DB
    */
    public function update($request, $id)
    {
        DB::beginTransaction();

        $user = $this->findById($id);
        $restore = $request->restore ? $this->restoreSoftDelte($user) : null;

        try {
            $image =   $user->image;
            if ($request->image) {
                deleteFileInStroage($user->image);
                $image = pathFileInStroage($request, "image", "admins");
            }

            if ($request['password'] == null) {
                $password = $user['password'];
            } else {
                $password  = Hash::make($request['password']);
            }

            $user->update([
                'name'          => $request['name'],
                'email'         => $request['email'],
                'mobile'        => $request['mobile'],
                'password'      => $password,
                'image'         => $image,
            ]);

            if ($request['roles'] != null) {
                DB::table('role_user')->where('user_id', $id)->delete();

                foreach ($request['roles'] as $key => $value) {
                    $user->assignRole($value);
                }
            }

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function restoreSoftDelte($model)
    {
        $model->restore();
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {
            $model = $this->findById($id);

            if ($model->trashed()):
              $model->forceDelete();
            deleteFileInStroage($model->image); else:
              $model->delete();
            endif;

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    /*
    * Find all Objects By IDs & Delete it from DB
    */
    public function deleteSelected($request)
    {
        DB::beginTransaction();

        if ($request['ids']) {
            try {
                foreach ($request['ids'] as $id) {
                    $model = $this->delete($id);
                }

                DB::commit();
                return true;
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }
        }
    }
    /*
    * Generate Datatable
    */
    public function QueryTable($request)
    {
        $query = $this->user->withDeleted()->where('id', '!=', auth()->id())->adminUser()->where(function ($query) use ($request) {
            $query->where('id', 'like', '%'. $request->input('search.value') .'%');
            $query->orWhere('name', 'like', '%'. $request->input('search.value') .'%');
            $query->orWhere('email', 'like', '%'. $request->input('search.value') .'%');
            $query->orWhere('mobile', 'like', '%'. $request->input('search.value') .'%');
        });

        $query = $this->filterDataTable($query, $request);

        return $query;
    }

    /*
    * Filteration for Datatable
    */
    public function filterDataTable($query, $request)
    {
        // Search Users by Created Dates
        if (isset($request['req']['from']) && $request['req']['from'] != '') {
            $query->whereDate('created_at', '>=', $request['req']['from']);
        }

        if (isset($request['req']['to']) && $request['req']['to'] != '') {
            $query->whereDate('created_at', '<=', $request['req']['to']);
        }


        if (isset($request['req']['roles']) && $request['req']['roles'] != '') {
            $query->whereHas('roles', function ($query) use ($request) {
                $query->where('id', $request['req']['roles']);
            });
        }

        if (isset($request['req']['deleted']) &&  $request['req']['deleted'] == 'only') {
            $query->onlyDeleted();
        }

        if (isset($request['req']['deleted']) &&  $request['req']['deleted'] == 'with') {
            $query->withDeleted();
        }


        return $query;
    }
}
