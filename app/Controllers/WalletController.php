<?php
require_once("classes/Wallet.php");
require_once("app/Controllers/WalletController.php");
class WalletController {
    public function createWallet($wallet) {
        $wallet = Wallet::create($wallet);
        return $wallet;
    }

    public function getWalletByDocumentAndPhone($document, $phone) {
        $wallet = Wallet::whereHas('client', function($query) use ($document, $phone) {
            $query->where('document', $document)->where('phone', $phone);
        })->first();
        return $wallet;
    }

    public function rechargeWallet($document, $phone, $amount) {
        try {
            $wallet = $this->getWalletByDocumentAndPhone($document, $phone);
            if (!$wallet) {
                return ResponseHandler::response(false, 404, 'No wallet was found for the data entered.', null);
            }
            $wallet->balance = $wallet->balance + $amount;
            $wallet->save();
            return ResponseHandler::response(true, 00, '', $wallet);
        } catch (Exception $e) {
            return ResponseHandler::response(false, $e->getCode(), $e->getMessage(), null);
        }
        
    }
}