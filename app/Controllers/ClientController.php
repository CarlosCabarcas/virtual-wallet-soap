<?php
require_once("classes/Client.php");
require_once("app/Handlers/ResponseHandler.php");
class ClientController {

    public function createClient($document, $names, $email, $phone) {
        try {
            $user = [
                'document' => $document,
                'names' => $names,
                'email' => $email,
                'phone' => $phone
            ];
    
            $this->saveClient($user);

            return ResponseHandler::response(true, 00, '');
        } catch (Exception $e) {
            return ResponseHandler::response(false, $e->getCode(), $e->getMessage());
        }
    }

    private function saveClient($user) {
        $user = Client::create($user);
        return $user;
    }
}