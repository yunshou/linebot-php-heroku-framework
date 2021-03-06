<?php

/**
 * Copyright 2016 LINE Corporation
 *
 * LINE Corporation licenses this file to you under the Apache License,
 * version 2.0 (the "License"); you may not use this file except in compliance
 * with the License. You may obtain a copy of the License at:
 *
 *   https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

require_once('./LINEBotTiny.php');



$channelAccessToken = getenv('LINE_CHANNEL_ACCESSTOKEN');
$channelSecret = getenv('LINE_CHANNEL_SECRET');

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            switch ($message['type']) {
                case 'text':
                	$m_message = $message['text'];
                	if($m_message!="" && preg_match('/\肉肉/i',$m_message))
                	{
                		$client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                            array(
                                'type' => 'text',
                                'text' => '我是好吃的肉肉！'
                                 //'text' => $m_message
                            )
                        )
                    	));
                	}
                	if($m_message!="" && preg_match('/\雲手/i',$m_message))
                	{
                		$client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                            array(
                                'type' => 'text',
                                'text' => '我的雲手好帥歐！'
                                 //'text' => $m_message
                            )
                        )
                    	));
                	}
                	if($m_message!="" && preg_match('/\阿軒/i',$m_message))
                	{
                		$client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                            array(
                                'type' => 'text',
                                'text' => '阿軒！要一起吃肉肉嗎？((害羞))'
                                 //'text' => $m_message
                            )
                        )
                    	));
                	}
                	if($m_message!="" && preg_match('/\幹/i',$m_message))
                	{
                		$client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                            array(
                                'type' => 'text',
                                'text' => '不要罵髒話啦～人家會害怕！！'
                                 
                            )
                        )
                    	));
                	}
                	if($m_message!="" && preg_match('/\已讀不回/i',$m_message))
                	{
                		$client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                            array(            
                                'type'=> 'image',
                                'originalContentUrl' => 'https://i.imgur.com/xjTET8v.jpg',
                                'previewImageUrl'=> 'https://i.imgur.com/xjTET8v.jpg'                                       
                            )
                        )
                    	));
                	}

                break;
                
            }
            break;
        default:
            error_log("Unsupporeted event type: " . $event['type']);
            break;
    }
};