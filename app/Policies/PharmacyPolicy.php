<?php

namespace App\Policies;

use App\Pharmacy;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PharmacyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Pharmacy  $pharmacy
     * @return mixed
     */
    public function view(User $user, Pharmacy $pharmacy)
    {
        return ($user->typeable_id === $pharmacy->id) || $user->hasRole('super_admin');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Pharmacy  $pharmacy
     * @return mixed
     */
    public function update(User $user, Pharmacy $pharmacy)
    {
       return ($user->typeable_id === $pharmacy->id)||$user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Pharmacy  $pharmacy
     * @return mixed
     */
    public function delete(User $user, Pharmacy $pharmacy)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Pharmacy  $pharmacy
     * @return mixed
     */
    public function restore(User $user, Pharmacy $pharmacy)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Pharmacy  $pharmacy
     * @return mixed
     */
    public function forceDelete(User $user, Pharmacy $pharmacy)
    {
        //
    }
}
