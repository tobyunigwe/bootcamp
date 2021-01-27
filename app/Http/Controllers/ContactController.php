<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmail;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index', ['user' => Auth::user()]);
    }

    public function store(CreateEmail $request)
    {
        if(!$request->validated()){
            return redirect()->back()->withInput($request->input())->withErrors($request);
        }
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("windesheimbootcampcontact@gmail.com", $request['name']);
        $email->setSubject($request['subject']);
        $email->addTo($request['email'], $request['name']);
        $email->addContent("text/html", '
   <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html data-editor-version="2" class="sg-campaigns" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
        <!--[if !mso]><!-->
        <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
        <!--<![endif]-->
        <!--[if (gte mso 9)|(IE)]>
            <xml>
                <o:OfficeDocumentSettings>
                    <o:AllowPNG />
                    <o:PixelsPerInch>96</o:PixelsPerInch>
                </o:OfficeDocumentSettings>
            </xml>
        <![endif]-->
        <!--[if (gte mso 9)|(IE)]>
            <style type="text/css">
                body {
                    width: 600px;
                    margin: 0 auto;
                }
                table {
                    border-collapse: collapse;
                }
                table,
                td {
                    mso-table-lspace: 0pt;
                    mso-table-rspace: 0pt;
                }
                img {
                    -ms-interpolation-mode: bicubic;
                }
            </style>
        <![endif]-->

        <style type="text/css">
            body,
            p,
            div {
                font-family: arial;
                font-size: 14px;
            }
            body {
                color: #000000;
            }
            body a {
                color: #1188e6;
                text-decoration: none;
            }
            p {
                margin: 0;
                padding: 0;
            }
            table.wrapper {
                width: 100% !important;
                table-layout: fixed;
                -webkit-font-smoothing: antialiased;
                -webkit-text-size-adjust: 100%;
                -moz-text-size-adjust: 100%;
                -ms-text-size-adjust: 100%;
            }
            img.max-width {
                max-width: 100% !important;
            }
            .column.of-2 {
                width: 50%;
            }
            .column.of-3 {
                width: 33.333%;
            }
            .column.of-4 {
                width: 25%;
            }
            @media screen and (max-width: 480px) {
                .preheader .rightColumnContent,
                .footer .rightColumnContent {
                    text-align: left !important;
                }
                .preheader .rightColumnContent div,
                .preheader .rightColumnContent span,
                .footer .rightColumnContent div,
                .footer .rightColumnContent span {
                    text-align: left !important;
                }
                .preheader .rightColumnContent,
                .preheader .leftColumnContent {
                    font-size: 80% !important;
                    padding: 5px 0;
                }
                table.wrapper-mobile {
                    width: 100% !important;
                    table-layout: fixed;
                }
                img.max-width {
                    height: auto !important;
                    max-width: 480px !important;
                }
                a.bulletproof-button {
                    display: block !important;
                    width: auto !important;
                    font-size: 80%;
                    padding-left: 0 !important;
                    padding-right: 0 !important;
                }
                .columns {
                    width: 100% !important;
                }
                .column {
                    display: block !important;
                    width: 100% !important;
                    padding-left: 0 !important;
                    padding-right: 0 !important;
                    margin-left: 0 !important;
                    margin-right: 0 !important;
                }
            }
        </style>
    </head>
    <body>
        <center class="wrapper" data-link-color="#1188E6" data-body-style="font-size: 14px; font-family: arial; color: #000000; background-color: #ffffff;">
            <div class="webkit">
                <table cellpadding="0" cellspacing="0" border="0" width="100%" class="wrapper" bgcolor="#ffffff">
                    <tr>
                        <td valign="top" bgcolor="#ffffff" width="100%">
                            <table width="100%" role="content-container" class="outer" align="center" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td width="100%">
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td>
                                                    <!--[if mso]>
                          <center>
                          <table><tr><td width="600">
                          <![endif]-->
                                                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="width: 100%; max-width: 600px;" align="center">
                                                        <tr>
                                                            <td role="modules-container" style="padding: 0px 0px 0px 0px; color: #000000; text-align: left;" bgcolor="#ffffff" width="100%" align="left">
                                                                <table
                                                                    class="module preheader preheader-hide"
                                                                    role="module"
                                                                    data-type="preheader"
                                                                    border="0"
                                                                    cellpadding="0"
                                                                    cellspacing="0"
                                                                    width="100%"
                                                                    style="display: none !important; mso-hide: all; visibility: hidden; opacity: 0; color: transparent; height: 0; width: 0;"
                                                                >
                                                                    <tr>
                                                                        <td role="module-content">
                                                                            <p></p>
                                                                        </td>
                                                                    </tr>
                                                                </table>

                                                                <table class="wrapper" role="module" data-type="image" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
                                                                    <tr>
                                                                        <td style="font-size: 6px; line-height: 10px; padding: 0px 0px 0px 0px;" valign="top" align="center">
                                                                            <img
                                                                                class="max-width"
                                                                                border="0"
                                                                                style="
                                                                                    display: block;
                                                                                    color: #000000;
                                                                                    text-decoration: none;
                                                                                    font-family: Helvetica, arial, sans-serif;
                                                                                    font-size: 16px;
                                                                                    max-width: 100% !important;
                                                                                    width: 100%;
                                                                                    height: auto !important;
                                                                                "
                                                                                src="https://marketing-image-production.s3.amazonaws.com/uploads/0a20279676cbd9e210d38f3bec877a256b5de6af3f3148516705acffe88435752f37b26242d4cd1c388726be4a365b47dd237bc2a3106a76e49b3ff96f07d040.jpg"
                                                                                alt=""
                                                                                width="600"
                                                                            />
                                                                        </td>
                                                                    </tr>
                                                                </table>

                                                                <table class="module" role="module" data-type="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
                                                                    <tr>
                                                                        <td style="padding: 010px 0px 010px 0px;" role="module-content" height="100%" valign="top" bgcolor="">
                                                                            <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" height="7px" style="line-height: 7px; font-size: 7px;">
                                                                                <tr>
                                                                                    <td style="padding: 0px 0px 7px 0px;" bgcolor="	#FFFF66"></td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </table>

                                                                <table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
                                                                    <tr>
                                                                        <td style="padding: 18px 0px 18px 0px; line-height: 22px; text-align: inherit;" height="100%" valign="top" bgcolor="">
                                                                            <h1 style="text-align: center;">
                                                                                <span style="font-size: 16px;">
                                                                                    <span style="font-family: arial, helvetica, sans-serif;">
                                                                                        Hartelijk bedankt voor het contacteren van het Windesheim Flevoland, wij beantwoorden uw vraag binnen 1 dag!
                                                                                    </span>
                                                                                </span>
                                                                            </h1>
                                                                        </td>
                                                                    </tr>
                                                                </table>

                                                                <table class="module" role="module" data-type="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
                                                                    <tr>
                                                                        <td style="padding: 010px 0px 010px 0px;" role="module-content" height="100%" valign="top" bgcolor="">
                                                                            <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" height="7px" style="line-height: 7px; font-size: 7px;">
                                                                                <tr>
                                                                                    <td style="padding: 0px 0px 7px 0px;" bgcolor="	#FFFF66"></td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </table>

                                                                <table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
                                                                    <tr>
                                                                        <td style="padding: 8px 0px 8px 0px; line-height: 22px; text-align: inherit;" height="100%" valign="top" bgcolor="">
                                                                            <div>Your email request:</div>
                                                                        </td>
                                                                    </tr>
                                                                </table>

                                                                <table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
                                                                    <tr>
                                                                        <td style="padding: 8px 0px 8px 0px; line-height: 22px; text-align: inherit;" height="100%" valign="top" bgcolor="">
                                                                            <div>Subject:</div>
                                                                                '.$request['subject'].'
                                                                        </td>
                                                                    </tr>
                                                                </table>

                                                                <table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
                                                                    <tr>
                                                                        <td style="padding: 18px 0px 18px 0px; line-height: 22px; text-align: inherit;" height="100%" valign="top" bgcolor="">
                                                                            <div>Message:</div>
                                                                            '.$request['message'].'
                                                                        </td>
                                                                    </tr>
                                                                </table>

                                                                <table class="module" role="module" data-type="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
                                                                    <tr>
                                                                        <td style="padding: 010px 0px 010px 0px;" role="module-content" height="100%" valign="top" bgcolor="">
                                                                            <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" height="7px" style="line-height: 7px; font-size: 7px;">
                                                                                <tr>
                                                                                    <td style="padding: 0px 0px 7px 0px;" bgcolor="	#FFFF66"></td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </table>

                                                                <table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
                                                                    <tr>
                                                                        <td style="padding: 18px 0px 18px 0px; line-height: 22px; text-align: inherit;" height="100%" valign="top" bgcolor="">
                                                                            <div>Hopelijk bent u hierbij voldoende geïnformeerd,</div>

                                                                            <div>&nbsp;</div>

                                                                            <div>Met vriendelijke groet,</div>

                                                                            <div>&nbsp;</div>

                                                                            <div>Team Windesheim</div>
                                                                        </td>
                                                                    </tr>
                                                                </table>

                                                                <table class="module" role="module" data-type="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
                                                                    <tr>
                                                                        <td style="padding: 010px 0px 010px 0px;" role="module-content" height="100%" valign="top" bgcolor="">
                                                                            <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" height="7px" style="line-height: 7px; font-size: 7px;">
                                                                                <tr>
                                                                                    <td style="padding: 0px 0px 7px 0px;" bgcolor="	#FFFF66"></td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </table>

                                                                <table class="module" role="module" data-type="social" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td valign="top" style="padding: 0px 0px 0px 0px; font-size: 6px; line-height: 10px;">
                                                                                <table align="center">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td style="padding: 0px 5px;">
                                                                                                <a role="social-icon-link" href="https://www.facebook.com/hogeschoolwindesheim/" target="_blank" alt="Facebook" data-nolink="false" title="Facebook "  style="-webkit-border-radius: 2px; -moz-border-radius: 2px; border-radius: 2px; display: inline-block; background-color: #3b579d;" >
                                                                                                    <img role="social-icon" alt="Facebook" title="Facebook " height="30" width="30" style="height: 30px; width: 30px;" src="https://marketing-image-production.s3.amazonaws.com/social/white/facebook.png"/>
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <!--[if mso]>
                                                      </td></tr></table>
                                                      </center>
                                                    <![endif]-->
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </center>
    </body>
</html>');

        $sendgrid = new \SendGrid(env('SENDGRID_API'));
        try {
            $response = $sendgrid->send($email);
            if ($response->statusCode() == 202 || $response->statusCode() == 200 || $response->statusCode() == 201) {
                return view('contact.index', ['user' => Auth::user()])->with(['message' => 'Your email has been send!']);
            }

        } catch (Exception $e) {
            return view('contact.index', ['user' => Auth::user()])->withErrors(['message' => 'Your email has not been send!']);
        }
    }
}
