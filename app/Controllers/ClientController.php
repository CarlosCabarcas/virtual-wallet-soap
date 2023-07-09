<?php
require_once("classes/Client.php");
require_once("app/Handlers/ResponseHandler.php");
require_once("app/Controllers/WalletController.php");
class ClientController {

    public function createClient($document, $names, $email, $phone) {
        try {
            $user = [
                'document' => $document,
                'names' => $names,
                'email' => $email,
                'phone' => $phone
            ];
    
            $newUser = $this->saveClient($user);

            $wallet = [
                'client_id' => $newUser->id,
                'balance' => 0
            ];

            $walletController = new WalletController();

            $walletController->createWallet($wallet);
            
            return ResponseHandler::response(true, 00, '', $newUser);
        } catch (Exception $e) {
            return ResponseHandler::response(false, $e->getCode(), $e->getMessage(), null);
        }
    }

    private function saveClient($user) {
        $user = Client::create($user);
        return $user;
    }

    public function getClientByDocument($document) {
        $user = Client::where('document', $document)->first();
        return $user;
    }
}
