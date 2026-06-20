<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OEP RAIMES</title>
</head>
<body>

    <div class="card_wrapper">
        <div class="card_front"
            style="width: 320px;margin:20px auto; background:#F7F8FB;padding:10px 20px;border-radius:20px;border:2px solid #DDDDDD">
            <table style="width: 100%;border-bottom:2px solid #575758">
                <tr>
                    <td>
                        <div style="font-weight: bold;font-size:14px;margin-bottom:5px">BMET EC Card</div>
                        <div style="font-size:12px">BMET ID: {{ $bmet->bmet_no }}<span></span></div>
                        <div style="font-size:12px">Clearance ID: {{ $bmet->clearance_id }}<span></span></div>
                    </td>
                    <td style="text-align: right;">
                        <div>
                            <img style="width: 30px" src="{{ public_path('assets/images/logo1.png') }}" alt="">
                            <img style="width: 30px" src="{{ public_path('assets/images/logo2.png') }}" alt="">
                        </div>
                    </td>
                </tr>
            </table>

            <table style="width:100%;border-bottom: 1px dashed #DDDDDD">
                <tr>
                    <td style="width:100px;text-align:right;padding-right:5px">
                        <div>
                            @if($photoBase64)
                                <img style="width: 70px" src="{{ $photoBase64 }}" alt="">
                            @endif
                        </div>
                    </td>
                    <td style="">
                        <div style="line-height: 12px; margin-bottom:3px">
                            <div style="font-size:12px">Name</div>
                            <span style="font-weight: bold;font-size:12px">{{ strtoupper($bmet->name) }}</span>
                        </div>
                        <div style="line-height: 12px; margin-bottom:3px">
                            <div style="font-size:12px">Father's Name</div>
                            <span style="font-weight: bold;font-size:12px">{{ strtoupper($bmet->father_name) }}</span>
                        </div>
                        <div style="line-height: 12px; margin-bottom:3px">
                            <div style="font-size:12px">Mother's Name</div>
                            <span style="font-weight: bold;font-size:12px">{{ strtoupper($bmet->mother_name) }}</span>
                        </div>
                        <div style="line-height: 12px; margin-bottom:3px">
                            <div style="font-size:12px">Destination Country</div>
                            <span style="font-weight: bold;font-size:12px;">{{ strtoupper($bmet->country) }}</span>
                        </div>
                    </td>
                </tr>
            </table>
            <table style="width: 100%">
                <tr>
                    <td>
                        <div style="font-size:12px">Passport Number</div>
                        <div style="font-weight: bold;font-size:12px">{{ $bmet->passport_no }}</div>
                    </td>
                    <td>
                        <div style="font-size:12px">Passport Issue Date</div>
                        <div style="font-weight: bold;font-size:12px">{{ $bmet->passport_issue_date }}</div>
                    </td>
                    <td>
                        <div style="font-size:12px;">RL ID</div>
                        <div style="font-weight: bold;font-size:12px">{{ $bmet->rl_no }}</div>
                    </td>
                </tr>
            </table>
            <div style="text-align: center;font-size:12px">Clearance Date: <span style="font-weight: bold">{{ date('d M Y', strtotime($bmet->ec_date)) }}</span></div>
        </div>
        <div class="card_back"
            style="width: 320px;margin:20px auto; background:#F7F8FB;padding:10px 20px;border-radius:20px;border:2px solid #DDDDDD">
            <div style="text-align: center;font-weight:600;font-size:15px;margin-bottom:20px">Verify this card</div>
            <table style="width: 100%">

                <tr>
                    <td style="padding-right: 15px">
                        <div>
                            @if($qrBase64)
                                <img style="width: 80px;background:white;padding:10px" src="{{ $qrBase64 }}" alt="">
                             @endif
                        </div>
                    </td>
                    <td>
                        <div style="font-size:13px">1. Scan QR code >> Visit the url.</div>
                        <div style="text-align: center;font-weight:bold;font-size:13px;padding:7px 0">OR</div>
                        <div style="font-size:13px">2. raims.oep.gov.bd >> Click ‘Verify
                            BMET EC card’ >> Enter passport no.
                            >> Submit & Verify your card
                        </div>
                    </td>
                </tr>
            </table>
            <div style="text-align: center;font-size:13px;margin-top:20px">This card holder is under insurance coverage & welfare services</div>
        </div>
    </div>

</body>

</html>
