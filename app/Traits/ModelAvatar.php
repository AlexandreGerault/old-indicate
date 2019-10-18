<?php


namespace App\Traits;


use Illuminate\Http\UploadedFile;

trait ModelAvatar
{
    /**
     * @param UploadedFile $avatar
     */
    public function updateAvatar (UploadedFile $avatar) {
        $avatarName = $this->id . '_avatar' . time() . '.' . $avatar->getClientOriginalExtension();
        $avatar->storeAs(strtolower((new \ReflectionClass($this))->getShortName()).'s/avatars', $avatarName);

        $this->avatar = $avatarName;
        $this->save();
    }
}
