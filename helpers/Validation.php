<?php
class Validation {
    public static function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function notEmpty($string) {
        return !empty(trim($string));
    }
}
