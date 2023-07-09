<?php
session_start();
require_once("app/Handlers/ResponseHandler.php");
require_once("app/Controllers/MailController.php");
require_once("app/Controllers/ClientController.php");

class PaymentController {
    public function generatePayment($document, $amount){
        $clientController = new ClientController();
        $sessionId = session_id();
        $client = $clientController->getClientByDocument($document);
        if ($client) {
            try {
                $token = random_int(100000, 999999);
                $payment = [
                    'client_id' => $client->id,
                    'amount' => $amount,
                    'token' => $token,
                    'session_id' => $sessionId
                ];

                $payment = $this->createPayment($payment);

                $mailController = new MailController();
                $message = '<p>You have a new payment of $' . $amount . ' </p> 
                <p>data to confirm payment:</p>
                <p>Session Id '.$sessionId.'</p>
                <p>Token '.$token.'</p>';

                $mailController->sendMail($client->email, 'Payment', $message);
                return ResponseHandler::response(true, 00, '', $client);
            } catch (Exception $e) {
                return ResponseHandler::response(false, $e->getCode(), $e->getMessage(), null);
            }
        } else {
            return ResponseHandler::response(false, 404, 'Client not found', null);
        }
    }

    public function createPayment($payment) {
        $payment = Payment::create($payment);
        return $payment;
    }
}