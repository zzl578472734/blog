<?php
//include_once "wxBizMsgCrypt.php";
//
//// 第三方发送消息给公众平台
//$encodingAesKey = "tBurNOFWoG8ox6VOx34PcWPRaCMNZbIiWHbRNyKqabU";
//$token = "A2JnQ3lviDRewmyrSzNdLwSZ5VK8Wg";
//$timeStamp = time();
//$nonce = "xxxxxx";
//$appId = "wx1490c81246658a0f";
//$text = "<xml><ToUserName><![CDATA[oia2Tj我是中文jewbmiOUlr6X-1crbLOvLw]]></ToUserName><FromUserName><![CDATA[gh_7f083739789a]]></FromUserName><CreateTime>1407743423</CreateTime><MsgType><![CDATA[video]]></MsgType><Video><MediaId><![CDATA[eYJ1MbwPRJtOvIEabaxHs7TX2D-HV71s79GUxqdUkjm6Gs2Ed1KF3ulAOA9H1xG0]]></MediaId><Title><![CDATA[testCallBackReplyVideo]]></Title><Description><![CDATA[testCallBackReplyVideo]]></Description></Video></xml>";
//
//
////生成签名
//
//
////$pc = new WXBizMsgCrypt($token, $encodingAesKey, $appId);
////$encryptMsg = '';
////$errCode = $pc->encryptMsg($text, $timeStamp, $nonce, $encryptMsg);
////if ($errCode == 0) {
////    print("加密后: " . $encryptMsg . "\n");
////} else {
////    print($errCode . "\n");
////}
////
////$xml_tree = new DOMDocument();
////$xml_tree->loadXML($encryptMsg);
////$array_e = $xml_tree->getElementsByTagName('Encrypt');
////$array_s = $xml_tree->getElementsByTagName('MsgSignature');
////$encrypt = $array_e->item(0)->nodeValue;
////$msg_sign = $array_s->item(0)->nodeValue;
////
////$format = "<xml><ToUserName><![CDATA[toUser]]></ToUserName><Encrypt><![CDATA[%s]]></Encrypt></xml>";
////$from_xml = sprintf($format, $encrypt);
////
////// 第三方收到公众号平台发送的消息
////$msg = '';
////$errCode = $pc->decryptMsg($msg_sign, $timeStamp, $nonce, $from_xml, $msg);
////if ($errCode == 0) {
////    print("解密后: " . $msg . "\n");
////} else {
////    print($errCode . "\n");
////}
//
//
//function valid()
//{
//    $echoStr = $_GET["echostr"];
//    if($this->checkSignature()){
//        header('content-type:text');
//        echo $echoStr;
//        exit;
//    }
//}
//
//function checkSignature($token)
//{
//    $signature = $_GET["signature"];
//    $timestamp = $_GET["timestamp"];
//    $nonce = $_GET["nonce"];
//
//    $tmpArr = array($token, $timestamp, $nonce);
//    sort($tmpArr, SORT_STRING);
//    $tmpStr = implode( $tmpArr );
//    $tmpStr = sha1( $tmpStr );
//
//    if( $tmpStr == $signature ){
//        return true;
//    }else{
//        return false;
//    }
//}
//
//function responseMsg()
//{
//    $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
//
//    if (!empty($postStr)){
//        $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
//        $fromUsername = $postObj->FromUserName;
//        $toUsername = $postObj->ToUserName;
//        $keyword = trim($postObj->Content);
//        $time = time();
//        $textTpl = "<xml>
//                        <ToUserName><![CDATA[%s]]></ToUserName>
//                        <FromUserName><![CDATA[%s]]></FromUserName>
//                        <CreateTime>%s</CreateTime>
//                        <MsgType><![CDATA[%s]]></MsgType>
//                        <Content><![CDATA[%s]]></Content>
//                        <FuncFlag>0</FuncFlag>
//                        </xml>";
//        if($keyword == "?" || $keyword == "？")
//        {
//            $msgType = "text";
//            $contentStr = date("Y-m-d H:i:s",time());
//            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
//            echo $resultStr;
//        }
//    }else{
//        echo "";
//        exit;
//    }
//}
define("TOKEN", "A2JnQ3lviDRewmyrSzNdLwSZ5VK8Wg");
$wechatObj = new wechatCallbackapiTest();
if (isset($_GET['echostr'])) {
    $wechatObj->valid();
}else{
    $wechatObj->responseMsg();
}


class wechatCallbackapiTest
{
    public function valid()
    {
        $echoStr = $_GET["echostr"];
        if($this->checkSignature()){
            header('content-type:text');
            echo $echoStr;
            exit;
        }
    }

    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }

    public function responseMsg()
    {
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

        if (!empty($postStr)){
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $time = time();
            $textTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[%s]]></MsgType>
                        <Content><![CDATA[%s]]></Content>
                        <FuncFlag>0</FuncFlag>
                        </xml>";
            if($keyword == "?" || $keyword == "？")
            {
                $msgType = "text";
                $contentStr = date("Y-m-d H:i:s",time());
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }
        }else{
            echo "";
            exit;
        }
    }
}
