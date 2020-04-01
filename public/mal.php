<?php
class Merchant_Api {
    /*
    Key:  bd64223ad47e02dc
    Secret: 7fec527bb668aabc
    3DES Key:  86358e4e21ee52284435870a
    */
    private $_key="149ec2b432d09df4";
    private $_secret = "eb3ff1758b2dc96e";
    private $_3des_key = "5dccb87efb3d80246de48334";
    private $_serviceUrl;
    private $_version = '1.0';
    private $_test_mode = 0;
    private $_verbose = false;

    private $_lastUri;
    private $_lastRequest;
    private $_lastResponse;
    private $_lastCurlInfo;
    private $_lastCurlError;

    public function getVersion() { return $this->_version; }

    public function __construct($service_url, $key, $secret, $verboseMode = false, $des_key = null)
    {
        $this->_serviceUrl = $service_url;
        $this->_key = $key;
        $this->_secret = $secret;
        $this->_verbose = $verboseMode;
        $this->_3des_key = $des_key;
    }

    private function _sign($params)
    {
        $strToSign = '';
        $params['key'] = $this->_key;
        $params['ts'] = time();
        foreach ($params as $k => $v)
            if($v !== NULL)
                $strToSign .= "$k:$v:";
        $strToSign .= $this->_secret;

        $params['sign'] = md5($strToSign);
        return $params;
    }

    public function encrypt3DES($data)
    {
        $len = strlen($this->_3des_key);
        $key = $len < 24 ? $this->_3des_key.substr($this->_3des_key, 0, 24 - $len) : $this->_3des_key;

        return openssl_encrypt($data, 'des-ede3-cbc', $key, false, substr($this->_3des_key, 0, 8));
    }

    private function _request($servicename, $params)
    {
        ini_set('max_execution_time', 300);

        $uri = $this->_serviceUrl . '/v/' . $this->_version .'/function/'. $servicename ;
        $this->_lastUri = $uri;

        if($this->_test_mode)
        {
            $params['test'] = 1;
        }

        $str = json_encode($params);
        $this->_lastRequest = $str;

        $ch = curl_init( $uri );
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $str);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT,300);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($str)]
        );
        $response = curl_exec($ch);
        $this->_lastResponse = $response;
        $this->_lastCurlInfo = curl_getinfo($ch);
        if(curl_errno($ch)){
            $this->_lastCurlError = curl_error($ch);
//            var_dump(curl_errno($ch));
        } else
            $this->_lastCurlError = null;

        curl_close($ch);

        if($this->_verbose)
            echo  '<br>URL: '. $uri . '<br>REQ: '. $str . '<br>RSP: ' . $response .'<br>';

        return $response;
    }

    public function getLastUri() {
        return $this->_lastUri;
    }
    public function getLastRequest() {
        return $this->_lastRequest;
    }
    public function getLastResponse() {
        return $this->_lastResponse;
    }
    public function getLastCurlInfo() {
        return $this->_lastCurlInfo;
    }
    public function getLastCurlError() {
        return $this->_lastCurlError;
    }


    // custom action to use array parameters instead of each one
    public function customAction($action, $params) {
        $params = $this->_sign($params);
        $response = $this->_request($action, $params);
        return json_decode($response, true);
    }

    // Methods implementation
    // CREATE
    public function createUser($username, $email, $password, $first_name, $middle_name, $last_name, $gender, $bday, $country, $address_line_1, $address_line_2, $city, $state, $post_code, $billing_country, $billing_address_line_1, $billing_address_line_2, $billing_city, $billing_state, $billing_post_code, $preferred_currency, $phone_number, $phone_type, $government_issued_id_type, $government_issued_id_number, $government_issued_id_expiration_date, $government_issued_id_country_of_issuance) {
        $params = $this->_sign(compact('username','email','password','first_name','middle_name','last_name','gender','bday','country','address_line_1','address_line_2','city','state','post_code','billing_country','billing_address_line_1','billing_address_line_2','billing_city','billing_state','billing_post_code','preferred_currency', 'phone_number', 'phone_type', 'government_issued_id_type', 'government_issued_id_number', 'government_issued_id_expiration_date', 'government_issued_id_country_of_issuance'));
        $response = $this->_request('create_user', $params);
        return json_decode($response, true);
    }
    public function createAccount($username, $currency) {
        $params = $this->_sign(compact('username','currency'));
        $response = $this->_request('create_account', $params);
        return json_decode($response, true);
    }

    public function createCard($username, $accounts, $card_type, $country, $nationality, $first_name, $middle_name, $last_name, $embossed_name, $family_status, $gender, $title, $dob, $email, $phone, $phone2, $address1, $address2, $city, $state, $post_code, $is_virtual, $shipping_method_id, $language = null) {
        $params = $this->_sign(compact('username','accounts','card_type','country','nationality','first_name','middle_name','last_name','embossed_name','family_status','gender','title','dob','email','phone','phone2','address1','address2','city','state','post_code','is_virtual','shipping_method_id','language'));
        $response = $this->_request('create_card', $params);
        return json_decode($response, true);
    }


    // GET
    public function getUsers($date_from = '', $date_to = '', $from_id = '') {
        $params = $this->_sign(compact('date_from','date_to','from_id'));
        $response = $this->_request('get_users', $params);
        return json_decode($response, true);
    }

    public function getUserAccounts($username) {
        $params = $this->_sign(compact('username'));
        $response = $this->_request('get_user_accounts', $params);
        return json_decode($response, true);
    }

    public function getAccountCards($account) {
        $params = $this->_sign(compact('account'));
        $response = $this->_request('get_account_cards', $params);
        return json_decode($response, true);
    }

    public function getAccountStatus($account) {
        $params = $this->_sign(compact('account'));
        $response = $this->_request('get_account_status', $params);
        return json_decode($response, true);
    }

    public function getUserCards($username) {
        $params = $this->_sign(compact('username'));
        $response = $this->_request('get_user_cards', $params);
        return json_decode($response, true);
    }

    public function getUserDetails($username) {
        $params = $this->_sign(compact('username'));
        $response = $this->_request('get_user_details', $params);
        return json_decode($response, true);
    }

    public function getUserEmail($username) {
        $params = $this->_sign(compact('username'));
        $response = $this->_request('get_user_email', $params);
        return json_decode($response, true);
    }

    public function getUserAddress($username) {
        $params = $this->_sign(compact('username'));
        $response = $this->_request('get_user_address', $params);
        return json_decode($response, true);
    }

    public function getAccountDetails($account) {
        $params = $this->_sign(compact('account'));
        $response = $this->_request('get_account_details', $params);
        return json_decode($response, true);
    }

    public function getAccountAddress($account) {
        $params = $this->_sign(compact('account'));
        $response = $this->_request('get_account_address', $params);
        return json_decode($response, true);
    }

    public function getAccountInventory($account) {
        $params = $this->_sign(compact('account'));
        $response = $this->_request('get_account_inventory', $params);
        return json_decode($response, true);
    }

    public function getUserKYCStatus($username) {
        $params = $this->_sign(compact('username'));
        $response = $this->_request('get_user_kyc_status', $params);
        return json_decode($response, true);
    }

    public function getCardStatus($card_id) {
        $params = $this->_sign(compact('card_id'));
        $response = $this->_request('get_card_status', $params);
        return json_decode($response, true);
    }

    public function getCardDetails($card_id) {
        $params = $this->_sign(compact('card_id'));
        $response = $this->_request('get_card_details', $params);
        return json_decode($response, true);
    }

    public function getCardCvv($card_id) {
        $params = $this->_sign(compact('card_id'));
        $response = $this->_request('get_card_cvv', $params);
        return json_decode($response, true);
    }

    public function getCardPin($card_id) {
        $params = $this->_sign(compact('card_id'));
        $response = $this->_request('get_card_pin', $params);
        return json_decode($response, true);
    }

    public function getTransactionStatus($transaction_id) {
        $params = $this->_sign(compact('transaction_id'));
        $response = $this->_request('get_transaction_status', $params);
        return json_decode($response, true);
    }

    public function getAccountLastActivity($account) {
        $params = $this->_sign(compact('account'));
        $response = $this->_request('get_account_last_activity', $params);
        return json_decode($response, true);
    }

    public function getAccountActivity($account, $date_from, $date_to) {
        $params = $this->_sign(compact('account','date_from','date_to'));
        $response = $this->_request('get_account_activity', $params);
        return json_decode($response, true);
    }

    public function getCardLastActivity($card_id) {
        $params = $this->_sign(compact('card_id'));
        $response = $this->_request('get_card_last_activity', $params);
        return json_decode($response, true);
    }

    public function getCardActivity($card_id, $date_from, $date_to) {
        $params = $this->_sign(compact('card_id','date_from','date_to'));
        $response = $this->_request('get_card_activity', $params);
        return json_decode($response, true);
    }

    public function getShippingMethods($country_code) {
        $params = $this->_sign(compact('country_code'));
        $response = $this->_request('get_shipping_methods', $params);
        return json_decode($response, true);
    }

    public function getCardPrograms($account_id) {
        $params = $this->_sign(compact('account_id'));
        $response = $this->_request('get_card_programs', $params);
        return json_decode($response, true);
    }

    // UPDATE
    public function approveUser($username) {
        $params = $this->_sign(compact('username'));
        $response = $this->_request('approve_user', $params);
        return json_decode($response, true);
    }

    public function updateUserAddress($username, $country_code, $address_line1, $address_line2, $city, $state, $postal_code, $billing_country_code, $billing_address_line1, $billing_address_line2, $billing_city, $billing_state, $billing_postal_code) {
        $params = $this->_sign(compact('username','country_code','address_line1','address_line2','city','state','postal_code','billing_country_code','billing_address_line1','billing_address_line2','billing_city','billing_state','billing_postal_code'));
        $response = $this->_request('update_user_address', $params);
        return json_decode($response, true);
    }

    public function updateAccountAddress($account, $country_code, $address_line1, $address_line2, $city, $state, $postal_code, $billing_country_code, $billing_address_line1, $billing_address_line2, $billing_city, $billing_state, $billing_postal_code) {
        $params = $this->_sign(compact('account','country_code','address_line1','address_line2','city','state','postal_code','billing_country_code','billing_address_line1','billing_address_line2','billing_city','billing_state','billing_postal_code'));
        $response = $this->_request('update_account_address', $params);
        return json_decode($response, true);
    }

    public function updateUserEmail($username, $email) {
        $params = $this->_sign(compact('username','email'));
        $response = $this->_request('update_user_email', $params);
        return json_decode($response, true);
    }

    public function updateUserKyc($username, $filename, $doctype, $organization_name, $file_body, $notification_url) {
        $params = $this->_sign(compact('username','filename', 'doctype', 'organization_name', 'file_body', 'notification_url'));
        $response = $this->_request('update_user_kyc', $params);
        return json_decode($response, true);
    }

    public function updateAccountOwner($account, $username) {
        $params = $this->_sign(compact('account','username'));
        $response = $this->_request('update_account_owner', $params);
        return json_decode($response, true);
    }

    public function assignCardToAccount($inventoryaccount, $card_id, $account) {
        $params = $this->_sign(compact('inventoryaccount','card_id','account'));
        $response = $this->_request('assign_card_to_account', $params);
        return json_decode($response, true);
    }


    // TRANSFERS
    public function transferAccountToAccount($sender_account, $receiver_account, $amount, $currency, $test = 0, $description = '') {
        $params = $this->_sign(compact('sender_account', 'receiver_account', 'amount', 'currency', 'test', 'description'));
        $response = $this->_request('transfer_a_to_a', $params);
        return json_decode($response, true);
    }

    public function transferAccountToCard($sender_account, $receiver_card, $amount, $currency, $test = 0) {
        $params = $this->_sign(compact('sender_account','receiver_card','amount','currency','test'));
        $response = $this->_request('transfer_a_to_c', $params);
        return json_decode($response, true);
    }

    public function transferCardToCard($sender_card, $receiver_card, $amount, $currency) {
        $params = $this->_sign(compact('sender_card','receiver_card','amount','currency'));
        $response = $this->_request('transfer_c_to_c', $params);
        return json_decode($response, true);
    }

    public function transferCardToAccount($sender_card, $expiration_date, $cvv, $receiver_account, $amount, $currency) {
        $params = $this->_sign(compact('sender_card', 'expiration_date', 'cvv', 'receiver_account','amount','currency'));
        $response = $this->_request('transfer_c_to_a', $params);
        return json_decode($response, true);
    }

    public function transferInternalCardToAccount($sender_card, $expiration_date, $cvv, $receiver_account, $amount, $currency) {
        $params = $this->_sign(compact('sender_card', 'expiration_date', 'cvv', 'receiver_account','amount','currency'));
        $response = $this->_request('transfer_ic_to_a', $params);
        return json_decode($response, true);
    }

    // TRANSFERS from user to merchant
    public function initializeTransfer($receiver_account, $sender, $amount, $currency, $order_id, $description, $account_by_user_country) {
        $params = $this->_sign(compact('receiver_account','sender','amount','currency','order_id','description', 'account_by_user_country'));
        $response = $this->_request('initialize_transfer', $params);
        return json_decode($response, true);
    }

    public function finishTransfer($receiver_account, $hash, $token_number, $token_code, $account_by_user_country) {
        $params = $this->_sign(compact('receiver_account', 'hash', 'token_number', 'token_code', 'account_by_user_country'));
        $response = $this->_request('finish_transfer', $params);
        return json_decode($response, true);
    }

    public function refundTransfer($transaction_id, $amount) {
        $params = $this->_sign(compact('transaction_id','amount'));
        $response = $this->_request('refund_transfer', $params);
        return json_decode($response, true);
    }

    public function sendSms($id, $type, $message, $tx_id) {
        $params = $this->_sign(compact('id','type','message', 'tx_id'));
        $response = $this->_request('send_sms', $params);
        return json_decode($response, true);
    }

    public function sendEmail($id, $type, $subject, $message, $tx_id) {
        $params = $this->_sign(compact('id','type', 'subject', 'message', 'tx_id'));
        $response = $this->_request('send_email', $params);
        return json_decode($response, true);
    }

    public function transferAccountToUser($sender_account, $receiver, $amount, $currency) {
        $params = $this->_sign(compact('sender_account','receiver','amount','currency'));
        $response = $this->_request('transfer_a_to_u', $params);
        return json_decode($response, true);
    }

    public function requestSms($user_id, $type, $id, $order) {
        $params = $this->_sign(compact('user_id','type', 'id', 'order'));
        $response = $this->_request('request_sms', $params);
        return json_decode($response, true);
    }

    public function requestEmail($user_id, $type, $id, $order) {
        $params = $this->_sign(compact('user_id','type', 'id', 'order'));
        $response = $this->_request('request_email', $params);
        return json_decode($response, true);
    }

    public function activateCard($card_id) {
        $params = $this->_sign(compact('card_id'));
        $response = $this->_request('activate_card', $params);
        return json_decode($response, true);
    }

    public function checkCardidInfo($card_id, $cardnumber, $cvv, $nameoncard, $expirymonth, $expiryyear, $firstname, $lastname, $email, $mobile) {
        $params = $this->_sign(compact('card_id','cardnumber', 'cvv', 'nameoncard', 'expirymonth', 'expiryyear', 'firstname', 'lastname', 'email', 'mobile'));
        $response = $this->_request('check_cardid_info', $params);
        return json_decode($response, true);
    }

    public function createPurchase($receiver_account, $amount, $currency, $order_id, $sender_user_id, $sender_account, $url_user_on_success, $url_user_on_fail, $url_api_on_success, $url_api_on_fail, $language) {
        $params = $this->_sign(compact('receiver_account', 'amount', 'currency', 'order_id', 'sender_user_id', 'sender_account', 'url_user_on_success', 'url_user_on_fail', 'url_api_on_success', 'url_api_on_fail', 'language'));
        $response = $this->_request('create_purchase', $params);
        return json_decode($response, true);
    }

    public function getPurchaseStatus($reference_id) {
        $params = $this->_sign(compact('reference_id'));
        $response = $this->_request('get_purchase_status', $params);
        return json_decode($response, true);
    }

    public function receiveMoneyRequest($service, $receiving_account, $amount, $currency, $custom_order_id, $item_name, $item_description, $note, $message_to_payer, $payer_title, $payer_first_name, $payer_middle_name, $payer_last_name, $payer_email, $payer_dob, $payer_gender, $payer_mobile, $payer_address, $payer_city, $payer_state, $payer_postal, $payer_country, $payer_id_type, $payer_id_number, $payer_id_expire, $payer_id_issued_country, $payer_bank_name, $payer_full_name_on_bank_account, $payer_bank_address, $payer_bank_city, $payer_bank_iban, $payer_bank_swift, $payer_bank_country, $payer_correspondent_bank_name, $payer_correspondent_bank_swift, $payer_correspondent_bank_city, $payer_correspondent_bank_currency_code, $poa_filename, $poa_filebody, $poi_filename, $poi_filebody, $i_filename, $i_filebody, $ipn_url) {
        $params = $this->_sign(compact('service', 'receiving_account', 'amount', 'currency', 'custom_order_id', 'item_name', 'item_description', 'note', 'message_to_payer', 'payer_title', 'payer_first_name', 'payer_middle_name', 'payer_last_name', 'payer_email', 'payer_dob', 'payer_gender', 'payer_mobile', 'payer_address', 'payer_city', 'payer_state', 'payer_postal', 'payer_country', 'payer_id_type', 'payer_id_number', 'payer_id_expire', 'payer_id_issued_country', 'payer_bank_name', 'payer_full_name_on_bank_account', 'payer_bank_address', 'payer_bank_city', 'payer_bank_iban', 'payer_bank_swift', 'payer_bank_country', 'payer_correspondent_bank_name', 'payer_correspondent_bank_swift', 'payer_correspondent_bank_city', 'payer_correspondent_bank_currency_code', 'poa_filename', 'poa_filebody', 'poi_filename', 'poi_filebody', 'i_filename', 'i_filebody', 'ipn_url'));
        $response = $this->_request('receive_money_request', $params);
        return json_decode($response, true);
    }

    public function receiveMoneyRequestBusiness($service, $receiving_account, $amount, $currency, $custom_order_id, $item_name, $item_description, $note, $message_to_payer, $payer_company_name, $payer_company_registration_number, $payer_email, $payer_mobile, $payer_address, $payer_city, $payer_state, $payer_postal, $payer_country, $payer_bank_name, $payer_full_name_on_bank_account, $payer_bank_address, $payer_bank_city, $payer_bank_iban, $payer_bank_swift, $payer_bank_country, $payer_correspondent_bank_name, $payer_correspondent_bank_swift, $payer_correspondent_bank_city, $payer_correspondent_bank_currency_code, $poa_filename, $poa_filebody, $poi_filename, $poi_filebody, $i_filename, $i_filebody, $ipn_url) {
        $params = $this->_sign(compact('service', 'receiving_account', 'amount', 'currency', 'custom_order_id', 'item_name', 'item_description', 'note', 'message_to_payer', 'payer_company_name', 'payer_company_registration_number', 'payer_email', 'payer_mobile', 'payer_address', 'payer_city', 'payer_state', 'payer_postal', 'payer_country', 'payer_bank_name', 'payer_full_name_on_bank_account', 'payer_bank_address', 'payer_bank_city', 'payer_bank_iban', 'payer_bank_swift', 'payer_bank_country', 'payer_correspondent_bank_name', 'payer_correspondent_bank_swift', 'payer_correspondent_bank_city', 'payer_correspondent_bank_currency_code', 'poa_filename', 'poa_filebody', 'poi_filename', 'poi_filebody', 'i_filename', 'i_filebody', 'ipn_url'));
        $response = $this->_request('receive_money_request_business', $params);
        return json_decode($response, true);
    }

    public function bankTransfer($service, $sending_account, $amount, $currency, $custom_order_id, $item_name, $item_description, $note, $message_to_receiver, $receiver_title, $receiver_first_name, $receiver_middle_name, $receiver_last_name, $receiver_email, $receiver_dob, $receiver_gender, $receiver_mobile, $receiver_address, $receiver_city, $receiver_state, $receiver_postal, $receiver_country, $receiver_id_type, $receiver_id_number, $receiver_id_expire, $receiver_id_issued_country, $receiver_bank_name, $receiver_full_name_on_bank_account, $receiver_bank_address, $receiver_bank_city, $receiver_bank_iban, $receiver_bank_swift, $receiver_bank_country, $receiver_correspondent_bank_name, $receiver_correspondent_bank_swift, $receiver_correspondent_bank_city, $receiver_correspondent_bank_currency_code, $withdrawal_method_id, $withdrawal_purpose, $poa_filename, $poa_filebody, $poi_filename, $poi_filebody, $i_filename, $i_filebody) {
        $params = $this->_sign(compact('service', 'sending_account', 'amount', 'currency', 'custom_order_id','item_name', 'item_description', 'note', 'message_to_receiver', 'receiver_title', 'receiver_first_name', 'receiver_middle_name', 'receiver_last_name', 'receiver_email', 'receiver_dob', 'receiver_gender', 'receiver_mobile', 'receiver_address', 'receiver_city', 'receiver_state', 'receiver_postal', 'receiver_country', 'receiver_id_type', 'receiver_id_number', 'receiver_id_expire', 'receiver_id_issued_country', 'receiver_bank_name', 'receiver_full_name_on_bank_account', 'receiver_bank_address', 'receiver_bank_city', 'receiver_bank_iban', 'receiver_bank_swift', 'receiver_bank_country', 'receiver_correspondent_bank_name', 'receiver_correspondent_bank_swift', 'receiver_correspondent_bank_city', 'receiver_correspondent_bank_currency_code', 'withdrawal_method_id', 'withdrawal_purpose', 'poa_filename', 'poa_filebody', 'poi_filename', 'poi_filebody', 'i_filename', 'i_filebody'));
        $response = $this->_request('bank_transfer', $params);
        return json_decode($response, true);
    }

    public function getUserBankAccounts($username) {
        $params = $this->_sign(compact('username'));
        $response = $this->_request('get_user_bank_accounts', $params);
        return json_decode($response, true);
    }

    public function getUserExternalCards($username) {
        $params = $this->_sign(compact('username'));
        $response = $this->_request('get_user_external_cards', $params);
        return json_decode($response, true);
    }

    public function getTransactionLimits($account_id) {
        $params = $this->_sign(compact('account_id'));
        $response = $this->_request('get_transaction_limits', $params);
        return json_decode($response, true);
    }

    public function addBankAccount($full_name_on_bank_account, $bank_name, $bank_address, $bank_iban, $bank_swift, $bank_city, $bank_country_code, $bank_contact_phone = null, $branch_code = null, $bank_state = null, $corresponding_bank_swift = null, $corresponding_bank_name = null, $corresponding_bank_city = null, $corresponding_bank_currency_code = null) {
        $params = $this->_sign(compact('full_name_on_bank_account', 'bank_name', 'bank_address', 'bank_iban', 'bank_swift', 'bank_city', 'bank_country_code', 'bank_contact_phone', 'branch_code', 'bank_state', 'corresponding_bank_swift', 'corresponding_bank_name', 'corresponding_bank_city', 'corresponding_bank_currency_code'));
        $response = $this->_request('add_bank_account', $params);
        return json_decode($response, true);
    }

    public function verifyExternalCard($credit_card_id, $verification_amount) {
        $params = $this->_sign(compact('credit_card_id', 'verification_amount'));
        $response = $this->_request('verify_external_card', $params);
        return json_decode($response, true);
    }

    public function loadFromBank($account_id, $bank_account_id, $amount, $currency, $ipn_url) {
        $params = $this->_sign(compact('account_id', 'bank_account_id', 'amount', 'currency', 'ipn_url'));
        $response = $this->_request('load_from_bank', $params);
        return json_decode($response, true);
    }

    public function loadFromCrypto($account_id, $amount, $currency, $crypto_currency,  $order_id)
    {
        $params = $this->_sign(compact('account_id', 'amount', 'currency', 'crypto_currency', 'order_id'));
        $response = $this->_request('load_from_crypto', $params);
        return json_decode($response, true);
    }

    public function loadFromBitcoin($account_id, $amount, $currency, $order_id) {
        $params = $this->_sign(compact('account_id', 'amount', 'currency', 'order_id'));
        $response = json_decode($this->_request('load_from_bitcoin', $params), true);
        if (!empty($response['crypto_currency_address'])) {
            $response['bitcoin_address'] = $response['crypto_currency_address'];
            unset($response['crypto_currency_address']);
        }
        return $response;
    }

    public function loadFromEthereum($account_id, $amount, $currency, $order_id) {
        $params = $this->_sign(compact('account_id', 'amount', 'currency', 'order_id'));
        $response = $this->_request('load_from_ethereum', $params);
        return json_decode($response, true);
    }

    public function initializeWithdrawToBank($account_id, $bank_account_id, $amount, $currency, $withdrawal_method_id, $withdrawal_purpose) {
        $params = $this->_sign(compact('account_id', 'bank_account_id', 'amount', 'currency', 'withdrawal_method_id', 'withdrawal_purpose'));
        $response = $this->_request('initialize_withdraw_to_bank', $params);
        return json_decode($response, true);
    }

    public function finishWithdrawToBank($hash, $reference_number, $token_number, $token_code) {
        $params = $this->_sign(compact('hash', 'reference_number', 'token_number', 'token_code'));
        $response = $this->_request('finish_withdraw_to_bank', $params);
        return json_decode($response, true);
    }

    public function initializeLoadFromCard($account_id, $credit_card_id, $deposit_category, $amount, $currency, $merchant_website = null, $merchant_city = null) {
        $params = $this->_sign(compact('account_id', 'credit_card_id', 'deposit_category', 'amount', 'currency', 'merchant_website', 'merchant_city'));
        $response = $this->_request('initialize_load_from_card', $params);
        return json_decode($response, true);
    }

    public function finishLoadFromCard($hash, $cvv, $token_number, $token_code) {
        $params = $this->_sign(compact('hash', 'cvv', 'token_number', 'token_code'));
        $response = $this->_request('finish_load_from_card', $params);
        return json_decode($response, true);
    }

    public function createPaymentRequestLink($type, $amount, $account_id, $currency, $url_user_on_success = null, $url_user_on_fail = null, $url_api_on_success = null, $url_api_on_fail = null, $no_expiration = 0, $deposit_category = null)
    {
        $params = $this->_sign(compact('type', 'amount', 'account_id', 'currency', 'url_user_on_success', 'url_user_on_fail', 'url_api_on_success', 'url_api_on_fail', 'no_expiration', 'deposit_category'));
        $response = $this->_request('create_payment_request_link', $params);

        return json_decode($response, true);
    }

    public function getPaymentRequestLinks($type, $link_id, $account_id, $date_created_from, $date_created_to, $amount_from, $amount_to, $currency, $is_disabled, $status, $page)
    {
        $params = $this->_sign(compact('type', 'link_id', 'account_id', 'date_created_from', 'date_created_to', 'amount_from', 'amount_to', 'currency', 'is_disabled', 'status', 'page'));
        $response = $this->_request('get_payment_request_links', $params);

        return json_decode($response, true);
    }

    public function initializeLoadFromUnverifiedCard($account_id, $credit_card_number, $cvv, $expiration_date_month, $expiration_date_year, $name_on_card, $deposit_category, $address, $zip, $city, $state, $amount, $currency, $merchant_website = null, $merchant_city = null) {
        $params = $this->_sign(compact('account_id', 'credit_card_number', 'cvv', 'expiration_date_month', 'expiration_date_year', 'name_on_card', 'deposit_category', 'address', 'zip', 'city', 'state', 'amount', 'currency', 'merchant_website', 'merchant_city'));
        $response = $this->_request('initialize_load_from_unverified_card', $params);
        return json_decode($response, true);
    }

    public function finishLoadFromUnverifiedCard($hash, $token_number, $token_code) {
        $params = $this->_sign(compact('hash','token_number', 'token_code'));
        $response = $this->_request('finish_load_from_unverified_card', $params);
        return json_decode($response, true);
    }

    public function s3dDataSubmit($hash, $md, $pa_res) {
        $params = $this->_sign(compact('hash', 'md', 'pa_res'));
        $response = $this->_request('s3d_data_submit', $params);
        return json_decode($response, true);
    }

    public function getBusinessCategories() {
        $params = $this->_sign([]);
        $response = $this->_request('get_business_categories', $params);

        return json_decode($response, true);
    }

    public function createMerchant($username, $password, $company_name, $email, $currency, $contact_first_name, $contact_last_name, $directors, $shareholders, $beneficial_owners, $website, $phone_type, $phone, $country, $address_1, $address_2, $city, $zip, $business_sectors, $is_private_company, $comment) {
        $params = $this->_sign(compact('username', 'password', 'company_name', 'email', 'currency', 'contact_first_name', 'contact_last_name', 'directors', 'shareholders', 'beneficial_owners', 'website', 'phone_type', 'phone', 'country', 'address_1', 'address_2', 'city', 'zip', 'business_sectors', 'is_private_company', 'comment'));
        $response = $this->_request('create_merchant', $params);

        return json_decode($response, true);
    }

    public function createIban($account_id, $bank_account_holder_title, $bank_account_holder_first_name, $bank_account_holder_last_name, $bank_account_holder_address_line1, $bank_account_holder_address_line2, $bank_account_holder_address_line3, $bank_account_holder_address_line4, $bank_account_holder_postal_code, $bank_account_holder_city, $bank_account_holder_state, $bank_account_holder_country_iso_code, $bank_account_holder_phone, $internal_name = null) {
        $params = $this->_sign(compact('account_id', 'bank_account_holder_title', 'bank_account_holder_first_name', 'bank_account_holder_last_name', 'bank_account_holder_address_line1', 'bank_account_holder_address_line2', 'bank_account_holder_address_line3', 'bank_account_holder_address_line4', 'bank_account_holder_postal_code', 'bank_account_holder_city', 'bank_account_holder_state', 'bank_account_holder_country_iso_code', 'bank_account_holder_phone', 'internal_name'));
        $response = $this->_request('create_iban', $params);

        return json_decode($response, true);
    }

    public function createBusinessIban($account_id, $business_name, $internal_name = null) {
        $params = $this->_sign(compact('account_id', 'business_name', 'internal_name'));
        $response = $this->_request('create_business_iban', $params);

        return json_decode($response, true);
    }

    public function transferAccount2Iban($sender_account, $sender_iban, $sending_amount, $receiver_iban, $receiver_name, $receiver_address = null, $receiver_postal = null, $receiver_city = null, $receiver_country_code = null, $message_for_receiver = null, $withdrawal_purpose = null) {
        $params = $this->_sign(compact('sender_account', 'sender_iban', 'sending_amount', 'receiver_iban', 'receiver_name', 'receiver_address', 'receiver_postal', 'receiver_city', 'receiver_country_code', 'message_for_receiver', 'withdrawal_purpose'));
        $response = $this->_request('transfer_a_to_iban', $params);

        return json_decode($response, true);
    }

    public function getIbanByRequestId($iban_request_id) {
        $params = $this->_sign(compact('iban_request_id'));
        $response = $this->_request('get_iban_by_request_id', $params);

        return json_decode($response, true);
    }

    public function getIbansList(int $item_count = 10, int $current_items_page = 1) {
        $params = $this->_sign(compact('item_count', 'current_items_page'));
        $response = $this->_request('get_ibans_list', $params);

        return json_decode($response, true);
    }

    public function transferIbanInboundReturn($transaction_id) {
        $params = $this->_sign(compact('transaction_id'));
        $response = $this->_request('transfer_iban_inbound_return', $params);

        return json_decode($response, true);
    }

    public function directDebitMandateCancel($mandate_id) {
        $params = $this->_sign(compact('mandate_id'));
        $response = $this->_request('direct_debit_mandate_cancel', $params);

        return json_decode($response, true);
    }

    public function directDebitStatusChange($transaction_id, $should_pay) {
        $params = $this->_sign(compact('transaction_id', 'should_pay'));
        $response = $this->_request('direct_debit_status_change', $params);

        return json_decode($response, true);
    }

    public function simulateWebhookIbanInboundSettled($amount, $sender_iban, $receiver_iban) {
        $params = $this->_sign(compact('amount', 'sender_iban', 'receiver_iban'));
        $response = $this->_request('simulate_webhook_iban_inbound_settled', $params);

        return json_decode($response, true);
    }

    public function simulateWebhookIbanInboundReversed($transaction_id) {
        $params = $this->_sign(compact('transaction_id'));
        $response = $this->_request('simulate_webhook_iban_inbound_reversed', $params);

        return json_decode($response, true);
    }
}
