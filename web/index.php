<?php



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

// require_once('./LINEBotTiny.php');

// $channelAccessToken = getenv('LINE_CHANNEL_ACCESSTOKEN');
// $channelSecret = getenv('LINE_CHANNEL_SECRET');

// $client = new LINEBotTiny($channelAccessToken, $channelSecret);
// foreach ($client->parseEvents() as $event) {
//     switch ($event['type']) {
//         case 'message':
//             $message = $event['message'];

//             $json = file_get_contents('https://spreadsheets.google.com/feeds/list/1tQCaj3LUVwH0tBuPrfBY2dOJuF-qzpYEdOqGdNvJRLc/od6/public/values?alt=json');
//             $data = json_decode($json, true);
//             $result = array();

//             foreach ($data['feed']['entry'] as $item) {
//                 $keywords = explode(',', $item['gsx$keyword']['$t']);

//                 foreach ($keywords as $keyword) {
//                     if (mb_strpos($message['text'], $keyword) !== false) {
//                         $candidate = array(
//                             'thumbnailImageUrl' => $item['gsx$photourl']['$t'],
//                             'title' => $item['gsx$title']['$t'],
//                             'text' => $item['gsx$title']['$t'],
//                             'actions' => array(
//                                 array(
//                                     'type' => 'uri',
//                                     'label' => '查看詳情',
//                                     'uri' => $item['gsx$url']['$t'],
//                                     ),
//                                 ),
//                             );
//                         array_push($result, $candidate);
//                     }
//                 }
//             }

//             switch ($message['type']) {
//                 case 'text':
//                     $client->replyMessage(array(
//                         'replyToken' => $event['replyToken'],
//                         'messages' => array(
//                             array(
//                                 'type' => 'text',
//                                 'text' => $message['text'].'讓我想想喔…',
//                             ),
//                             array(
//                                 'type' => 'template',
//                                 'altText' => '為您推薦下列美食：',
//                                 'template' => array(
//                                     'type' => 'carousel',
//                                     'columns' => $result,
//                                 ),
//                             ),
//                             array(
//                                 'type' => 'text',
//                                 'text' => '這些都超好吃，真心不騙！',
//                             ),
//                             array(
//                                 'type' => 'sticker',
//                                 'packageId' => '1',
//                                 'stickerId' => '2',
//                             ),
//                         ),
//                     ));
//                     break;
//                 default:
//                     error_log("Unsupporeted message type: " . $message['type']);
//                     break;
//             }
//             break;
//         default:
//             error_log("Unsupporeted event type: " . $event['type']);
//             break;
//     }
// };





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

            $json = file_get_contents('https://spreadsheets.google.com/feeds/list/1tQCaj3LUVwH0tBuPrfBY2dOJuF-qzpYEdOqGdNvJRLc/od6/public/values?alt=json');
            $data = json_decode($json, true);
            $result = array();

            // foreach ($data['feed']['entry'] as $item) {
            //     $keywords = explode(',', $item['gsx$keyword']['$t']);

            //     foreach ($keywords as $keyword) {
            //         if (mb_strpos($message['text'], $keyword) !== false) {
            //             $candidate = array(
            //                 'thumbnailImageUrl' => $item['gsx$photourl']['$t'],
            //                 'title' => $item['gsx$title']['$t'],
            //                 'text' => $item['gsx$title']['$t'],
            //                 'actions' => array(
            //                     array(
            //                         'type' => 'uri',
            //                         'label' => '查看詳情',
            //                         'uri' => $item['gsx$url']['$t'],
            //                         ),
            //                     ),
            //                 );
            //             array_push($result, $candidate);

            //              $client->replyMessage(array(
            //                 'replyToken' => $event['replyToken'],
            //                 'messages' => array(
            //                     array(
            //                         'type' => 'text',
            //                         'text' => $item['gsx$title']['$t']
            //                     )
            //                 )
            //             ));
            //         }
            //     }
            // }

            switch ($message['type']) {
                case 'text':
                    // if(!empty($result)){
                    //     $client->replyMessage(array(
                    //         'replyToken' => $event['replyToken'],
                    //         'messages' => array(
                    //             array(
                    //                 'type' => 'text',
                    //                 'text' => $message['text'].'讓我想想喔…',
                    //             ),
                    //             array(
                    //                 'type' => 'template',
                    //                 'altText' => '為您推薦下列美食：',
                    //                 'template' => array(
                    //                     'type' => 'carousel',
                    //                     'columns' => $result,
                    //                 ),
                    //             ),
                    //             array(
                    //                 'type' => 'text',
                    //                 'text' => '這些都超好吃，真心不騙！',
                    //             ),
                    //             array(
                    //                 'type' => 'sticker',
                    //                 'packageId' => '1',
                    //                 'stickerId' => '2',
                    //             ),
                    //         ),
                    //     ));
                    // }else{
                         $m_message = $message['text'];
                        if($m_message!="" && preg_match('/\肉肉/i',$m_message))
                        {
                            $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                    'type' => 'text',
                                    'text' => '我是好吃的肉肉！'
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
                                    'text' => '不要罵髒話啦～'
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
                   // }
                    break;
                default:
                    error_log("Unsupporeted message type: " . $message['type']);
                    break;
            }
            break;
        default:
            error_log("Unsupporeted event type: " . $event['type']);
            break;
    }
};

