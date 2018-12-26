<?php

namespace My\Working\Api;



interface UserRepositoryInterface
{
    public function save($user);

    public function delete($user);
}
