<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="icon" href="../../assets/img/icons/foundation-favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/foundation-emails/2.2.1/foundation-emails.min.css" rel="stylesheet">
    <title>khaneistanbul reset email</title>
</head>
<body>
<span class="preheader"></span>

<style type="text/css">
    .header {
        background: #8a8a8a;
    }
    .header .columns {
        padding-bottom: 0;
    }
    .header p {
        color: #fff;
        margin-bottom: 0;
    }
    .header .wrapper-inner {
        padding: 10px; /*controls the height of the header*/
        background: #000;
    }
    .header .container {
        background: #000;
    }
    .wrapper.secondary {
        background: #f3f3f3;
    }
    .callout-inner{
        text-align: center;
    }
</style>

<table align="center" bgcolor="#8A8A8A" class="wrapper header float-center">
    <tr>
        <td class="wrapper-inner">
            <table align="center" class="container">
                <tbody>
                <tr>
                    <td>
                        <table class="row collapse">
                            <tbody>
                            <tr>
                                <th class="small-6 large-6 columns first" valign="middle">
                                    <table>
                                        <tr>
                                            <th style="flex-direction: row;display: flex;align-items: center;">
                                                <img style="width: 25px;margin-right: 10px" src="<?php echo e(asset('new/img/logo/logo-4.png')); ?>">
                                            </th>
                                        </tr>
                                    </table>
                                </th>
                                <th class="small-6 large-6 columns last" valign="middle">
                                    <table>
                                        <tr>
                                            <th>
                                                <p class="text-right">khaneistanbul</p>
                                            </th>
                                        </tr>
                                    </table>
                                </th>
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
<table align="center" class="container float-center">
    <tbody>
    <tr>
        <td>
            <table class="spacer">
                <tbody>
                <tr>
                    <td height="16px" style="font-size:16px;line-height:16px;">&#xA0;</td>
                </tr>
                </tbody>
            </table>
            <table class="row">
                <tbody>
                <tr>
                    <th class="small-12 large-12 columns first last">
                        <table>
                            <tr>
                                <th>
                                    <h1>khaneistanbul you new password :</h1>
                                    <p class="lead">to reset click on link below:</p>
                                    <table class="callout">
                                        <tr>
                                            <th class="callout-inner primary">
                                                <a href="<?php echo e(url('/resetPassword-index')); ?>/<?php echo e($token); ?>"><?php echo e(url('/resetPassword-index')); ?>/<?php echo e($token); ?></a>
                                            </th>
                                            <th class="expander"></th>
                                        </tr>
                                    </table>
                                </th>
                            </tr>
                        </table>
                    </th>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>

<!-- prevent Gmail on iOS font size manipulation -->
<div style="display:none; white-space:nowrap; font:15px courier; line-height:0;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </div>
</body>
</html>
