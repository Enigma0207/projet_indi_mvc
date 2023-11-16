<?php

namespace Service;

use Model\Entity\User;

abstract class Session
{
    public static function destroy()
    {
        session_destroy();
    }

    public static function addMessage($type, $message)
    {
        $_SESSION["messages"][$type][] = $message;
    }

    public static function getMessages()
    {
        $messages = $_SESSION["messages"] ?? null;

        if (isset($_SESSION["messages"])) {
            unset($_SESSION["messages"]);
        }
        return $messages;
    }

    public static function authentication(User $user)
    {
        $_SESSION["user"] = $user;
    }

    public static function isConnected()
    {
        return $_SESSION["user"] ?? false;
    }

    public static function logout()
    {
        self::destroy();
    }

    public static function isAdmin(): bool
    {
        if ($user = self::isConnected()) {
            return $user->getNiveau() == ROLE_ADMIN;
        }
        return false;
    }
}
