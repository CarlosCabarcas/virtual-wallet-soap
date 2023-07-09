<?php
class ResponseHandler {
    static function response($success, $cod_error, $messag_error) {
        return json_encode([
            'success' => $success,
            'cod_error' => $cod_error,
            'messag_error' => $messag_error
        ]);
    }
}