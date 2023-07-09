<?php
class ResponseHandler {
    static function response($success, $cod_error, $messag_error, $data) {
        return json_encode([
            'success' => $success,
            'cod_error' => $cod_error,
            'messag_error' => $messag_error,
            'data' => $data
        ]);
    }
}