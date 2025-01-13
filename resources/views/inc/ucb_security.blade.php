<?php
    
    define('HMAC_SHA256', 'sha256');
    define('SECRET_KEY', 'b7b8ad6575f14938ba07f49412800cf1b753a38fb5944eb691ed7c32c93ecf7f7daaca47eb9b40889cf4243679eddee4885304bc55d84daeaece389e1660169db5a830e5a79c4568a77b44f5d846ee386c4af4e9e0ac410293be39c0749c5c24ebcf3c580d324bb2be44471fdfe6020b2937bed4c65d45ab9c05e467dcd87ebe');
    //SECRET_KEY:production value will be different
    
    function sign($params)
    {
        return signData(buildDataToSign($params), SECRET_KEY);
    }
    
    function signData($data, $secretKey)
    {
        return base64_encode(hash_hmac('sha256', $data, $secretKey, true));
    }
    
    function buildDataToSign($params)
    {
        $signedFieldNames = explode(',', $params['signed_field_names']);
        foreach ($signedFieldNames as $field) {
            $dataToSign[] = $field . '=' . $params[$field];
        }
        return commaSeparate($dataToSign);
    }
    
    function commaSeparate($dataToSign)
    {
        return implode(',', $dataToSign);
    }
    
    ?>