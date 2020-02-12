<?php
namespace src\Utils;

class Utils {
    public static function routing($route = "/", $method = "GET", $callback = NULL) {
        $user_route = explode("/", $_SERVER["PATH_INFO"]);
        $system_route = explode("/", $route);

        if (count($user_route) === count($system_route)) {
            foreach ($system_route as $key => $value) {
                if (strpos($value, ":") !== false) {
                    $field_name = str_replace(":", "", $system_route[$key]);
                    $_GET[$field_name] = (int) $user_route[$key];
                    $fixed_route[$key] = $user_route[$key];
                } else {
                    $fixed_route[$key] = $value;
                }
            }

            $fixed_route = implode("/", $fixed_route);

            if ($fixed_route == $_SERVER["PATH_INFO"] && $method == $_SERVER["REQUEST_METHOD"]) {
                call_user_func($callback);
                die();
            }
        }
    }

    /*
    public static function email(string $value):string {
        if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return strtolower($value);
        }

        return false;
    }

    public static function birthdate(string $value):string {
        $value = preg_replace("/\d/", "", $value);

        if (strlen($value) == 10) {
            return substr($value, 0, 2) . "/" . substr($value, 3, 2) . "/" . substr($value, 5, 4);
        }

        return false;
    }

    public static function CPF(string $value):string {
        $value = preg_replace("/\d/", "", $value);

        if (strlen($value) == 11) {
            return substr($value, 0, 3) . "." . substr($value, 3, 3) . "." . substr($value, 6, 3) . "-" . substr($value, 9, 2);
        }

        return false;
    }

    public static function phone(string $value):string {
        $value = preg_replace("/\d/", "", $value);

        if (strlen($value) == 8) {
            return "(" . substr($value, 0, 2) . ") " . substr($value, 3, 4) . "-" . substr($value, 8, 4);
        } else {
            return "(" . substr($value, 0, 2) . ") " . substr($value, 3, 5) . "-" . substr($value, 9, 4);
        }

        return false;
    }

    public static function zipcode(string $value):string {
        $value = preg_replace("/\d/", "", $value);

        if (strlen($value) == 8) {
            return substr($value, 0, 5) . "-" . substr($value, 5, 3);
        }

        return false;
    }
    */
}
?>
