<?php

namespace App\Modules\Whatsapp\Controllers;

use App\Controllers\BaseController;

class IncomingMessage extends BaseController
{
    private $easywaServer;
    private $easywaNumber;
    private $allowGroup = [
        'easywagroup' => '120363023432962472@g.us',
        'attauhidgroup' => '6285745938168-1441642841@g.us',
    ];
    private $defaultMessage = [
        '/menu' => ['message' => [
            'text' => 'Daftar menu easywa',
            'footer' => 'link: http://easywa.web.id',
            'title' => 'mudahkan jangan dipersulit',
            'buttonText' => 'Klik saya untuk melihat menu utama',
            'sections' => [
                [
                    'title' => 'Pendaftaran',
                    'rows' => [
                        [
                            'title' => '/register',
                            'rowId' => 'register1',
                        ],
                        [
                            'title' => '/status',
                            'rowId' => 'status1',
                            'description' => 'Mengecek status',
                        ],
                    ],
                ],
                [
                    'title' => 'Diskusi',
                    'rows' => [
                        [
                            'title' => '/faq',
                            'rowId' => 'faq',
                        ],
                        [
                            'title' => '/ask',
                            'rowId' => 'ask'
                        ],
                    ],
                ],
            ],
        ]],
        '/register' => [
            'message' => [
                'text' => 'Untuk registrasi silakan kunjungi',
                'templateButtons' => [
                    [
                        'index' => 1,
                        'urlButton' => [
                            'displayText' => 'Daftar disini',
                            'url' => 'https://easywa.web.id',
                        ],
                    ],
                    [
                        'index' => 2,
                        'callButton' => [
                            'displayText' => 'Telpon',
                            'phoneNumber' => '+6285733659400',
                        ],
                    ]
                ],
            ]
        ],
        '/status' => ['message' => ['text' => 'Status masih dirahasiakan']],
        '/faq' => ['message' => ['text' => 'Daftar pertanyaan yang sering ditanyakan']],
        '/ask' => ['message' => ['text' => 'Permintaan fitur baru']],
    ];

    private $notFoundMessage = ['message' => ['text' => 'Jawaban {{message}} tidak ditemukan']];
    public function index()
    {
        $easywa = config('Easywa');
        $message = trim($this->request->getPost('message'));
        $sender = $this->request->getPost('sender');
        $easywaServer = $this->request->getGet('server') ?? $easywa->server;
        $easywaNumber = $this->request->getGet('number') ?? $easywa->number;
        $this->setEasywaServer($easywaServer);
        $this->setEasywaNumber($easywaNumber);
        $replyMessage = null;
        if (starts_with($message, '/')) {
            $replyMessage = $this->getResponseMessage($message, $sender);
        }

        if (!empty($replyMessage)) {
            $this->sendWhatsapp($sender, $replyMessage);
            $this->response->setStatusCode(201, 'message created');
        }
    }

    private function getResponseMessage($message, $sender)
    {
        if (\str_contains($sender, '@g.us')) {
            if (in_array($sender, $this->allowGroup)) {
                return $this->handleGroupResponse($message, $sender);
            } else {
                return null;
            }
        }
        return $this->defaultMessage[$message] ?? $this->getNotFoundMessage($message);
    }

    private function sendWhatsapp($to, $message)
    {
        $message['to'] = $to;

        $client = \Config\Services::curlrequest([
            'baseURI' => "{$this->getEasywaServer()}/sendmessage?number={$this->getEasywaNumber()}",
        ]);

        $client->post('', ['json' => $message]);
    }

    /**
     * Get the value of notFoundMessage
     */
    public function getNotFoundMessage($message)
    {
        $this->notFoundMessage['message']['text'] = str_replace('{{message}}', '*' . $message . '*', $this->notFoundMessage['message']['text']);
        return $this->notFoundMessage;
    }

    private function handleGroupResponse($message, $sender)
    {
        $replyMessage = null;
        switch ($sender) {
            case '120363023432962472@g.us':
            case '6285745938168-1441642841@g.us':
                $replyMessage = $this->easywaMessage($message);
                break;
            default:
        }
        return $replyMessage;
    }

    private function easywaMessage($message)
    {
        $defaultMessage = [
            '/menu' => ['message' => [
                'text' => 'Daftar Menu',
                'footer' => 'link: http://easywa.web.id',
                'title' => 'Masjid At-tauhid betiting gresik',
                'buttonText' => 'Klik saya untuk melihat menu utama',
                'sections' => [
                    [
                        'title' => 'Kajian',
                        'rows' => [
                            [
                                'title' => '/jadwal',
                                'rowId' => 'jadwal',
                            ],
                            [
                                'title' => '/donasi',
                                'rowId' => 'donasi',
                            ],
                        ],
                    ],
                ],
            ]],
            '/jadwal' => [
                'message' => [
                    'text' => 'Jadwal kajian',
                    'buttonText' => 'Klik saya untuk melihat jadwal',
                    'sections' => [
                        [
                            'title' => 'Jadwal Kajian',
                            'rows' => [
                                [
                                    'title' => '/jadwal ahad',
                                    'rowId' => 'jadwal ahad',
                                ],
                                [
                                    'title' => '/jadwal senin',
                                    'rowId' => 'jadwal senin',
                                ],
                                [
                                    'title' => '/jadwal selasa',
                                    'rowId' => 'jadwal selasa',
                                ],
                                [
                                    'title' => '/jadwal rabu',
                                    'rowId' => 'jadwal rabu',
                                ],
                                [
                                    'title' => '/jadwal kamis',
                                    'rowId' => 'jadwal kamis',
                                ],
                                [
                                    'title' => '/jadwal jumat',
                                    'rowId' => 'jadwal jumat',
                                ],
                                [
                                    'title' => '/jadwal sabtu',
                                    'rowId' => 'jadwal sabtu',
                                ],
                            ],
                        ],
                    ],
                ]
            ],
            '/donasi' => ['message' => ['text' =>
            "----   DONASI   ----

MA'HAD AT-TAUHID 
TAHFIDZ AL-QUR'AN DAN HADIST


💳 mandiri 
no rekening : 1400011135382
an. YAYASAN AT TAUHID GRESIK

konfirmasi transfer ke nomor 
085890097740"]],

            '/jadwal ahad' => ['message' => ['text' => "Jadwal kajian belum diketahui"]],
            '/jadwal senin' => ['message' => ['text' => "بسم الله الرحمن الرحيم

Info Kajian
InsyaAllah mulai malam ini
📕 Kitab Masa'il Jahiliyah
🖋️ Karya Syaikh Muhammad bin Abdul Wahhab Rahimahullah
🗣️ Bersama Ustadz Ahmad Jamil Hafidzohullah
🗓️ setiap hari Senin
⏰ Ba'dha Maghrib
🕌 Masjid At Tauhid Betiting Cerme Gresik

#tegakkan tauhid
#hidupkan sunnah


----   DONASI   ----

MA'HAD AT-TAUHID 
TAHFIDZ AL-QUR'AN DAN HADIST


💳 mandiri 
no rekening : 1400011135382
an. YAYASAN AT TAUHID GRESIK

konfirmasi transfer ke nomor 
085890097740"]],
            '/jadwal selasa' => ['message' => ['text' => "Jadwal kajian belum diketahui"]],
            '/jadwal rabu' => ['message' => ['text' => "بسم الله الرحمن الرحيم

Info Kajian
InsyaAllah
📕 USHUL FIQIH
🗣️ Bersama Ustadz Ahmad Sabiq, Lc. Hafidzohullah
🗓️ setiap hari Rabu
⏰ Ba'dha Isya - selesai
🕌 Masjid At Tauhid Betiting Cerme Gresik

#tegakkan tauhid
#hidupkan sunnah


----   DONASI   ----

MA'HAD AT-TAUHID 
TAHFIDZ AL-QUR'AN DAN HADIST


💳 mandiri 
no rekening : 1400011135382
an. YAYASAN AT TAUHID GRESIK

konfirmasi transfer ke nomor 
085890097740"]],
            '/jadwal kamis' => ['message' => ['text' => "بسم الله الرحمن الرحيم

Info Kajian
InsyaAllah
📕 Sirah Nabi Shalallahu Alaihi wasallam
🗣️ Bersama Ustadz Ahmad Jamil Hafidzohullah
🗓️ setiap hari Kamis
⏰ Ba'dha Maghrib
🕌 Masjid At Tauhid Betiting Cerme Gresik

#tegakkan tauhid
#hidupkan sunnah


----   DONASI   ----

MA'HAD AT-TAUHID 
TAHFIDZ AL-QUR'AN DAN HADIST


💳 mandiri 
no rekening : 1400011135382
an. YAYASAN AT TAUHID GRESIK

konfirmasi transfer ke nomor 
085890097740"]],
            '/jadwal jumat' => ['message' => ['text' => "Jadwal kajian belum diketahui"]],
            '/jadwal sabtu' => ['message' => ['text' => "بسم الله الرحمن الرحيم

Info Kajian
InsyaAllah
📕 TAJWID DAN TAHSIN AL-QUR'AN
🗣️ Bersama Ustadz Arif Firmansyah, Lc. Hafidzohullah
🗓️ setiap hari Sabtu
⏰ Ba'dha maghrib - selesai
🕌 Masjid At Tauhid Betiting Cerme Gresik

#tegakkan tauhid
#hidupkan sunnah


----   DONASI   ----

MA'HAD AT-TAUHID 
TAHFIDZ AL-QUR'AN DAN HADIST


💳 mandiri 
no rekening : 1400011135382
an. YAYASAN AT TAUHID GRESIK

konfirmasi transfer ke nomor 
085890097740"]],
        ];

        return $defaultMessage[$message] ?? $this->getNotFoundMessage($message);
    }

    /**
     * Get the value of easywaNumber
     */
    public function getEasywaNumber()
    {
        return $this->easywaNumber;
    }

    /**
     * Set the value of easywaNumber
     *
     * @return  self
     */
    public function setEasywaNumber($easywaNumber)
    {
        $this->easywaNumber = $easywaNumber;

        return $this;
    }

    /**
     * Get the value of easywaServer
     */
    public function getEasywaServer()
    {
        return $this->easywaServer;
    }

    /**
     * Set the value of easywaServer
     *
     * @return  self
     */
    public function setEasywaServer($easywaServer)
    {
        $this->easywaServer = $easywaServer;

        return $this;
    }
}
