<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OEP RAIMES</title>
</head>
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        background-color: #F0F3F3;
        font-family: sans-serif;
    }

    ul {
        margin: 0;
        padding: 0;
    }

    li {
        list-style: none;
    }

    a {
        text-decoration: none;
    }

    input {
        outline: none;
    }


    .body_area {
        padding-left: 250px;
        transition: all .3s;
    }

    .body_area.body_area_toggle {
        padding-left: 0px;
        transition: all .3s;
    }



    .bmet {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        padding-bottom: 50px;
        font-family: serif;
    }

    .bmet_wrapper {
        background-color: #F5F6F9;
        width: 100%;
        max-width: 380px;
        padding-bottom: 50px;
    }

    .bmet_wrapper .header {
        background-color: #FFFFFF;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 13px 20px;
    }

    .bmet_wrapper .header img {
        width: 45px;
    }

    .bmet_wrapper .header .title_area {
        text-align: center;
    }

    .bmet_wrapper .header .title_area h3 {
        color: green;
        font-family: "Noto Serif Bengali", serif;
        font-weight: 700;
        font-size: 14px;
    }

    .bmet_wrapper .header .title_area h4 {
        color: violet;
        font-family: "Noto Serif Bengali", serif;
        font-weight: 700;
        font-size: 14px;
    }

    .bmet_wrapper .title_2_area {
        text-align: center;
        color: #464855;
        font-family: "Noto Serif Bengali", serif;
        font-weight: 700;
        margin: 20px 0;
    }

    .bmet_wrapper .title_2_area .bn {
        font-size: 16px;
        line-height: 19px;
    }

    .bmet_wrapper .title_2_area .en {
        font-size: 16px;
        line-height: 19px;
    }

    .bmet_wrapper .profile_area {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: #fff;
        margin: 70px 30px 10px 30px;
    }

    .bmet_wrapper .profile_area img {
        width: 130px;
        object-fit: cover;
        height: 130px;
        border-radius: 50%;
        margin-top: -60px;
    }

    .bmet_wrapper .profile_area .name {
        color: #52536D;
        font-family: serif;
        font-weight: 700;
        font-size: 18px;
    }

    .bmet_wrapper .profile_area .ec_no {
        color: #52536D;
        font-family: serif;
        font-size: 14px;
    }

    .bmet_wrapper .profile_area .ec_no span {
        font-weight: 700;
        font-family: serif;
    }

    .bmet_wrapper .profile_area .ec_date {
        color: #52536D;
        font-family: serif;
        font-size: 14px;
    }

    .bmet_wrapper .profile_area .ec_date span {
        font-weight: 700;
    }

    .bmet_table {
        background-color: #fff;
        margin: 0 30px;
        padding: 10px;
    }

    .bmet_table table {
        width: 100%;
        border-collapse: collapse;
    }

    .bmet_table table tr td {
        border: 1px solid #e7e7e9;
        width: 50%;
        padding: 0px 5px;
    }

    .bmet_table table tr td.left {
        color: rgba(15, 33, 55, 0.9);
        font-size: 14px;
        font-weight: 400;
    }

    .bmet_table table tr td.right {
        color: rgba(15, 33, 55, 0.9);
        font-size: 13px;
        font-weight: 700;
    }

    .bmet_sec_header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 30px;
        background-color: #fff;
        margin: 20px 0;
    }

    .bmet_sec_header .title {
        color: green;
        font-size: 18px;
        font-weight: 700;
        font-family: "Noto Serif Bengali", serif;
    }

    .bmet_sec_header .logo_area {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .bmet_sec_header img {
        width: 45px;
    }
</style>

<body>

    <div class="bmet">
        <div class="bmet_wrapper">
            <div class="header">
                <img src="{{ asset('assets/images/logo2.png') }}" alt="">
                <div class="title_area">
                    <h3>গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</h3>
                    <h4>জনশক্তি কর্মসংস্থান ও প্রশিক্ষন ব্যুরো</h4>
                </div>
                <img src="{{ asset('assets/images/logo1.png') }}" alt="">
            </div>

            <div class="title_2_area">
                <div class="bn">বহির্গমন ছাড়পত্র</div>
                <div class="en">Emigration Clearance</div>
            </div>

            <div class="profile_area">
                <img src="{{ asset('storage/bmet/' . $bmet->photo) }}" alt="">
                <div class="name" style="text-align:center">{{ $bmet->name }}</div>
                <div class="ec_no">EC No: <span>{{ $bmet->clearence_id }}</span></div>
                <div class="ec_date">EC Date: <span>{{ \Carbon\Carbon::parse($bmet->ec_date)->format('d/M/Y') }}</span>
                </div>
            </div>

            <div class="bmet_table">
                <table>
                    <tr>
                        <td class="left">Birth Date</td>
                        <td class="right">{{ $bmet->date_of_birth }}</td>
                    </tr>
                    <tr>
                        <td class="left">Blood Group</td>
                        <td class="right">{{ $bmet->blood_group }}</td>
                    </tr>
                    <tr>
                        <td class="left">Passport No</td>
                        <td class="right">{{ $bmet->passport_no }}</td>
                    </tr>
                    <tr>
                        <td class="left">Passport Issue Date</td>
                        <td class="right">{{ $bmet->passport_issue_date }}</td>
                    </tr>
                    <tr>
                        <td class="left">Passport Expire Date</td>
                        <td class="right">{{ $bmet->passport_expiry_date }}</td>
                    </tr>
                    <tr>
                        <td class="left">Visa No</td>
                        <td class="right">{{ $bmet->visa_no }}</td>
                    </tr>
                    <tr>
                        <td class="left">Visa Issue Date</td>
                        <td class="right">{{ $bmet->visa_issue_date }}</td>
                    </tr>
                    <tr>
                        <td class="left">Visa Expire Date</td>
                        <td class="right">{{ $bmet->visa_expiry_date }}</td>
                    </tr>
                    <tr>
                        <td class="left">Referral No</td>
                        <td class="right"></td>
                    </tr>
                    <tr>
                        <td class="left">Employer</td>
                        <td class="right">{{ $bmet->employer }}</td>
                    </tr>
                    <tr>
                        <td class="left">Country</td>
                        <td class="right">{{ $bmet->country }}</td>
                    </tr>
                </table>
            </div>

            <div class="bmet_sec_header">
                <div class="title">Recruiting Agency</div>
                <div class="logo_area">
                    <img src="{{ asset('assets/images/logo1.png') }}" alt="">
                    <img src="{{ asset('assets/images/logo2.png') }}" alt="">
                </div>
            </div>

            <div class="bmet_table">
                <table>
                    <tr>
                        <td class="left">Name</td>
                        <td class="right">{{ $bmet->office_name }}</td>
                    </tr>
                    <tr>
                        <td class="left">License No</td>
                        <td class="right">{{ $bmet->rl_no }}</td>
                    </tr>
                    <tr>
                        <td class="left">Phone</td>
                        <td class="right">{{ $bmet->phone }}</td>
                    </tr>
                </table>
            </div>

            <div class="bmet_sec_header">
                <div class="title">BMET Registration</div>
                <div class="logo_area">
                    <img src="{{ asset('assets/images/logo1.png') }}" alt="">
                    <img src="{{ asset('assets/images/logo2.png') }}" alt="">
                </div>
            </div>

            <div class="bmet_table">
                <table>
                    <tr>
                        <td class="left">BMET No</td>
                        <td class="right">{{ $bmet->bmet_no }}</td>
                    </tr>
                    <tr>
                        <td class="left">Name</td>
                        <td class="right">{{ $bmet->name }}</td>
                    </tr>
                    <tr>
                        <td class="left">Birth Date</td>
                        <td class="right">{{ $bmet->date_of_birth }}</td>
                    </tr>
                    <tr>
                        <td class="left">Gender</td>
                        <td class="right">{{ $bmet->gender }}</td>
                    </tr>
                    <tr>
                        <td class="left">NID</td>
                        <td class="right">{{ $bmet->nid }}</td>
                    </tr>
                </table>
            </div>


            <div class="bmet_sec_header">
                <div class="title">Passports</div>
                <div class="logo_area">
                    <img src="{{ asset('assets/images/logo1.png') }}" alt="">
                    <img src="{{ asset('assets/images/logo2.png') }}" alt="">
                </div>
            </div>

            <div class="bmet_table">
                <table>
                    <tr>
                        <td class="left">Name</td>
                        <td class="right">{{ $bmet->name }}</td>
                    </tr>
                    <tr>
                        <td class="left">Passport No 1</td>
                        <td class="right">{{ $bmet->passport_no }}</td>
                    </tr>
                </table>
            </div>


            <div class="bmet_sec_header">
                <div class="title">Permanent Address</div>
                <div class="logo_area">
                    <img src="{{ asset('assets/images/logo1.png') }}" alt="">
                    <img src="{{ asset('assets/images/logo2.png') }}" alt="">
                </div>
            </div>

            <div class="bmet_table">
                <table>
                    <tr>
                        <td class="left">House/Vill/Road</td>
                        <td class="right">{{ $bmet->village }}</td>
                    </tr>
                    <tr>
                        <td class="left">Post Office</td>
                        <td class="right">{{ $bmet->post_office }}</td>
                    </tr>
                    <tr>
                        <td class="left">Police Station</td>
                        <td class="right">{{ $bmet->police_station }}</td>
                    </tr>
                    <tr>
                        <td class="left">Upazula</td>
                        <td class="right">{{ $bmet->upazila }}</td>
                    </tr>
                    <tr>
                        <td class="left">District</td>
                        <td class="right">{{ $bmet->district }}</td>
                    </tr>
                    <tr>
                        <td class="left">Division</td>
                        <td class="right">{{ $bmet->division }}</td>
                    </tr>
                </table>
            </div>


            <div class="bmet_sec_header">
                <div class="title">Emergency Contact</div>
                <div class="logo_area">
                    <img src="{{ asset('assets/images/logo1.png') }}" alt="">
                    <img src="{{ asset('assets/images/logo2.png') }}" alt="">
                </div>
            </div>

            <div class="bmet_table">
                <table>
                    <tr>
                        <td class="left">Name</td>
                        <td class="right"></td>
                    </tr>
                    <tr>
                        <td class="left">Relation</td>
                        <td class="right"></td>
                    </tr>
                    <tr>
                        <td class="left">Mobile</td>
                        <td class="right"></td>
                    </tr>
                    <tr>
                        <td class="left">Address</td>
                        <td class="right"></td>
                    </tr>
                </table>
            </div>


        </div>
    </div>
</body>

</html>
