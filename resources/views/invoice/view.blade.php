<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Invoice #{{ Arr::get($transaction, 'transaction_number') }}</title>
    <link rel="shortcut icon" href="{{ URL::asset('images/huaxin_logo_transparent.png') }}">
    <style>
        @font-face { 
            font-family: 'Yahei'; 
            src: url({{public_path('fonts/chinese.msyh.ttf')}}) format("truetype"); 
        }
    </style>
</head>

<body>
            <table class="center" border="0" cellpadding="0" cellspacing="0" id="templateContainer"
                style=" -webkit-box-shadow:0 0 0 3px rgba(0,0,0,0.025); width:100%; -webkit-border-radius:6px;">
                <tr>
                    <td align="center" style="padding-top:5px" valign="top">
                        <!-- HEADER: SECTION 1 -->
                        <table border="0" cellpadding="0" cellspacing="2" id="templateHeader"
                            style="-webkit-border-top-left-radius:2px; -webkit-border-top-right-radius:6px; width:100%; font-family: sans-serif;">
                            <tr>
                                <!-- SECTION 1: SECTION LOGO -->
                                <td style="width: 20%;">
                                    <img src="{{asset('')}}assets/images/logo-light.svg" height="65" />
                                </td>
                                <!-- SECTION 1: BRANCH INFO -->
                                <td style="text-align: center; line-height:1; padding-right:125px">
                                      <span style="font-size: 11px"><b style="font-size:16px;">SKOTE</b> 123412151</span><br>
                                        <span
                                            style="font-size:11px; font-family: sans-serif; color: #373737;">
                                            NO. 2-3, Jalan Merbah 1, Bandar Puchong Jaya, 47170 Puchong, Selangor
                                        </span><br>
                                        <span style="font-size:11px; font-family: sans-serif; color: #373737;">
                                          Tel: 0123456789 Email: joanna@gmail.com
                                            {{-- emai@email.com --}}
                                        </span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <hr>
            <table class="center" border="0" cellpadding="0" cellspacing="0" id="templateContainer"
                style="padding-top: 10px; -webkit-box-shadow:0 0 0 3px rgba(0,0,0,0.025); width:100%; -webkit-border-radius:6px;">
                <tr>
                    <td align="center" valign="middle">
                        <!-- HEADER: SECTION 2 -->
                        <table border="0" cellpadding="0" cellspacing="0" id="templateHeader"
                            style="-webkit-border-top-left-radius:2px; -webkit-border-top-right-radius:6px; width:100%; font-family: sans-serif;">
                            <tr>
                                <!-- SECTION 2: CUSTOMER INFO -->
                                <td align="left">
                                    <p style="padding: 0px; margin: 0px">
                                        <span style="font-size:18px; font-family: sans-serif;"><b>CUSTOMER
                                                INFO</b></span>
                                    </p>
                                </td>
                                <!-- SECTION 2: INVOICE -->
                                <td align="right">
                                    <p style="padding: 0px; margin: 0px">
                                        <span style="font-size:33px; font-family: sans-serif;"><b>INVOICE</b></span>
                                    </p>

                                </td>
                            </tr>
                            <tr>
                                <!-- SECTION 3: CUSTOMER INFO -->
                                <td align="left">
                                    <table border="0" align="left" cellpadding="0" cellspacing="0"
                                        style="padding: 0px; margin-left: 0px; width: 100%;">
                                        <tbody>
                                            <tr style="padding: 0px; margin: 0px">
                                                <!-- <td align="left" valign="top"
                                                    style="vertical-align: middle; text-align:left; border: 0px solid; font-size: 12px; padding-bottom: 3px; color: #373737;"
                                                    scope="col">Name</td>
                                                <td align="left" valign="top"
                                                    style="vertical-align: middle; text-align:left; border: 0px solid; font-size: 12px; padding-bottom: 3px; color: #373737;"
                                                    scope="col">:</td> -->
                                                <td align="left" valign="top"
                                                    style="vertical-align: middle; font-family: Yahei, sans-serif; text-align:left; border: 0px solid; font-size: 12px; padding-bottom: 3px; color: #373737;"
                                                    scope="col">
                                                    <span style="vertical-align: middle;">
                                                        {{ Arr::get($transaction, 'tenant.tenant_name') }}
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr style="padding: 0px; margin: 0px">
                                                <!-- <td align="left" valign="top"
                                                    style="vertical-align: middle; text-align:left; border: 0px solid; font-size: 12px; padding-bottom: 3px; color: #373737;"
                                                    scope="col">Name</td>
                                                <td align="left" valign="top"
                                                    style="vertical-align: middle; text-align:left; border: 0px solid; font-size: 12px; padding-bottom: 3px; color: #373737;"
                                                    scope="col">:</td> -->
                                                <td align="left" valign="top"
                                                    style="vertical-align: middle; font-family: Yahei, sans-serif; text-align:left; border: 0px solid; font-size: 12px; padding-bottom: 3px; color: #373737;"
                                                    scope="col">
                                                    <span style="vertical-align: middle;">
                                                        {{ Arr::get($transaction, 'tenant.company_name') }}
                                                        <span class="small text-muted">
                                                            - {{ Arr::get($transaction, 'tenant.company_reg_no') }}
                                                        </span>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left" valign="top"
                                                    style="text-align:left; border: 0px solid; font-size: 12px; padding-bottom: 3px; color: #373737;"
                                                    scope="col">
                                                    {{ Arr::get($transaction, 'tenant.company_email') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left" valign="top"
                                                    style="text-align:left; border: 0px solid; font-size: 12px; padding-bottom: 3px; color: #373737;"
                                                    scope="col">
                                                    {{ Arr::get($transaction, 'tenant.company_address') }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </td>
                                <!-- SECTION 3: INVOICE -->
                                <td align="right">
                                    <table border="0" align="right" cellpadding="0" cellspacing="0"
                                        style=" padding: 0px; margin: 0px; margin-right: -2px; width: 100%; text-transform: uppercase;">
                                        <tbody>
                                            <tr>
                                                <td align="left" valign="top"
                                                    style="text-align:right; border: 0px solid; font-size: 12px; padding-bottom: 3px; color: #373737;"
                                                    scope="col">
                                                    #{{ Arr::get($transaction, 'transaction_number') }}</td>
                                            </tr>
                                            <tr>
                                                <td align="left" valign="top"
                                                    style="text-align:right; border: 0px solid; font-size: 12px; padding-bottom: 10px; color: #373737;"
                                                    scope="col">
                                                    {{ Arr::get($transaction, 'created_at')}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left" valign="top"
                                                    style="text-align:right; border: 0px solid; font-size: 12px; color: #373737;"
                                                    scope="col">
                                                    {{-- Location: dwa --}}
                                                    @php
                                                        $transaction_mode = Arr::get($transaction, 'transaction_type');
                                                    @endphp 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left" valign="top"
                                                    style="font-family: 'Yahei'; text-align:right; border: 0px solid; font-size: 12px; color: #373737;"
                                                    scope="col">
                                                    {{-- Remark: dwa --}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

        <table class="center" cellspacing="0" cellpadding="1"
            style="font-family: sans serif; width: 100%; border: 0px solid; padding-top:10; padding-bottom: 10px;"
            border="0">
            <tbody>
                <tr>
                    <td
                        style="font-family: sans serif; text-align:center; border-top:1px solid; border-bottom:1px solid; padding-top:3px; padding-bottom:3px; font-size: 12px; border-color: #000; width: 3%; font-weight: bold;">
                        No.</td>
                    <td
                        style="font-family: sans serif; padding-left: 5px; padding-top:3px; padding-bottom:3px; text-align:left; border-top:1px solid; border-bottom:1px solid; font-size: 12px; border-color: #000; width: 30%; font-weight: bold;">
                        Subscription</td>
                    <td
                        style="font-family: sans serif; padding-left: 5px; padding-top:3px; padding-bottom:3px; text-align:left; border-top:1px solid; border-bottom:1px solid; font-size: 12px; border-color: #000; width: 30%; font-weight: bold;">
                        Feature</td>
                    <td style="font-family: sans serif; padding-left: 0px; padding-top:3px; padding-bottom:3px; text-align:center; border-top:1px solid; border-bottom:1px solid; font-size: 12px; border-color: #000; width: 7%; font-weight: bold;"
                        scope="col">Qty</td>
                    <td
                        style="font-family: sans serif; padding-right: 0px; padding-top:3px; padding-bottom:3px; text-align:center; border-top:1px solid; border-bottom:1px solid; font-size: 12px;  border-color: #000; width: 10%; font-weight: bold;">
                        Price<br>(RM)</td>
                    <td
                        style="font-family: sans serif; padding-right: 10px; padding-top:3px; padding-bottom:3px; text-align:right; border-top:1px solid; border-bottom:1px solid; font-size: 12px;  border-color: #000; width: 10%; font-weight: bold;">
                        Amount<br />(RM)</td>
                </tr>
                @php
                    $subscriptionPlan = Arr::get($transaction, 'subscription_plan');
                @endphp
                <tr>
                    <td valign='top' scope='col'
                        style='font-family: sans serif; color: #373737; text-align:center; border:0px; padding-top:10px; padding-bottom:10px; font-size: 12px; border-bottom:1px solid; border-color: #000;'>
                        1</td>
                    <td valign='top' scope='col'
                        style='color: #373737; padding-left: 5px; text-align:left; border:0px; padding-top:10px; padding-bottom:10px; font-size: 12px;  border-bottom:1px solid; border-color: #000; font-family:"Yahei"'>
                        {{ Arr::get($subscriptionPlan, 'subscription_name') }}
                        <p class="small text-muted" style="font-size:10px; opacity: .6;">{{ Arr::get($subscriptionPlan, 'subscription_description') }}</p>
                    </td>
                    <td valign='top' scope='col'
                        style=' color: #373737; text-align:left; border:0px; padding-top:10px; padding-bottom:10px; font-size: 12px; border-bottom:1px solid; border-color: #000; padding-left: 5px;'>
                        @foreach ($subscriptionPlan->feature as $feature)
                            {{ Arr::get($feature, 'feature_title') }} <br>
                        @endforeach
                    </td>
                    <td valign='top' scope='col'
                        style=' color: #373737; padding-right: 5px; text-align:center; border:0px; padding-top:10px; padding-bottom:10px; font-size: 12px; border-bottom:1px solid; border-color: #000;'>
                        1
                    </td>
                    <td valign='top' scope='col'
                        style=' color: #373737; padding-right: 5px; text-align:center; border:0px; padding-top:10px; padding-bottom:10px; font-size: 12px; border-bottom:1px solid; border-color: #000;'>
                        RM {{ number_format(Arr::get($transaction, 'subscription_grand_total_price', 0), 2) }}
                    </td>
                    <td valign='top' scope='col'
                        style=' color: #373737; padding-right: 10px; text-align:right; border:0px; padding-top:10px; padding-bottom:10px; font-size: 12px; border-bottom:1px solid; border-color: #000;'>
                        RM {{ number_format(Arr::get($transaction, 'subscription_grand_total_price', 0), 2) }}
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="center" cellspacing="0" cellpadding="1"
            style="width: 100%; border: 0px solid; padding-bottom: 10px;" border="0">
            <tbody>
                <tr>
                    <td style="font-family: sans-serif; font-size: 12px; padding-right: 0px; padding-bottom: 5px; width: 20%;"></td>
                    <td style="font-family: sans-serif; font-size: 12px; padding-right: 0px; padding-bottom: 5px; text-align:left; width: 10%; border-bottom:1px solid; border-color: #000;"></td> 
                    <td style="font-family: sans-serif; font-size: 12px; padding-right: 0px; padding-bottom: 5px; text-align:right; width: 10%; border-bottom:1px solid; border-color: #000;"></td>    
                    <td style="font-family: sans-serif; font-size: 12px; padding-right: 0px; padding-bottom: 5px; text-align:right; width: 20%; border-bottom:1px solid; border-color: #000;">
                        <b>Total (RM)</b>
                    </td>
                    <td style="font-family: sans-serif; font-size: 12px; padding-right: 10px; padding-bottom: 5px; text-align:right; width: 40%;  border-bottom:1px solid; border-color: #000;">
                        <b>
                            RM {{ number_format(Arr::get($transaction, 'subscription_grand_total_price', 0), 2) }}
                        <b>
                    </td>
                </tr>
                <tr>
                    <td style="font-family: sans-serif; font-size: 12px; padding-right: 0px; width: 70%;"></td>
                    <td style="font-family: sans-serif; font-size: 12px; padding-right: 0px; padding-bottom: 5px; text-align:right; width: 18%;"></td>
                    <td style="font-family: sans-serif; font-size: 12px; padding-left: 0px; padding-bottom: 5px; text-align:center; width: 10%;" scope="col"></td>
                    <td style="font-family: sans-serif; font-size: 12px; padding-left: 0px; padding-bottom: 5px; text-align:center; width: 2%;" scope="col"></td>
                    <td style="font-family: sans-serif; font-size: 12px; padding-right: 0px; padding-bottom: 5px; text-align:center; width: 10%;"></td>
                </tr>
            </tbody>
        </table>
        <br>

        <div style="padding-bottom: 50px; position:absolute; bottom: 0; text-align:center; width:100%">
            <span class="text-muted" style="font-size:10px; ">
                <i>This is computer generated invoice, no signature is required
            </span>
        </div>

</body>

</html>
