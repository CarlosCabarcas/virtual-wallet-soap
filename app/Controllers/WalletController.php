<?php
require_once("classes/Wallet.php");
class WalletController {
    public function createWallet($wallet) {
        $wallet = Wallet::create($wallet);
        return $wallet;
    }
}