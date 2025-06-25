<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AZILINK | COMMANDES</title>
</head>

<style>
    body {
        font-family: Helvetica, sans-serif;
        font-size: 13px;
    }

    .container {
        max-width: 680px;
        margin: 0 auto;
    }

    .logotype {
        background: #000;
        color: #fff;
        width: 75px;
        height: 75px;
        line-height: 75px;
        text-align: center;
        font-size: 11px;
    }

    .column-title {
        background: #eee;
        text-transform: uppercase;
        padding: 15px 5px 15px 15px;
        font-size: 11px
    }

    .column-detail {
        border-top: 1px solid #eee;
        border-bottom: 1px solid #eee;
    }

    .column-header {
        background: #eee;
        text-transform: uppercase;
        padding: 15px;
        font-size: 11px;
        border-right: 1px solid #eee;
    }

    .row {
        padding: 7px 14px;
        border-left: 1px solid #eee;
        border-right: 1px solid #eee;
        border-bottom: 1px solid #eee;
    }

    .alert {
        background: #ffd9e8;
        padding: 20px;
        margin: 20px 0;
        line-height: 22px;
        color: #333
    }

    .socialmedia {
        background: #eee;
        padding: 20px;
        display: inline-block
    }
</style>

<body>


    <div class="container">

        <table width="100%">
            <tr>
                <td width="75px">
                    
                    <div class="logotype">Copmany</div>
                </td>
                <td width="300px">
                    <div
                        style="background: #6f5fb7;border-left: 15px solid #fff;padding-left: 30px;font-size: 26px;font-weight: bold;letter-spacing: -1px;height: 73px;line-height: 75px;">
                        Details de commande</div>
                </td>
                <td></td>
            </tr>
        </table>
        <br><br>
        <h3>Informations</h3>
        <p><?php echo e($messageBody); ?> </p><br>
        <table width="100%" style="border-collapse: collapse;">
            <tr>
                <td widdth="50%" style="background:#eee;padding:20px;">
                    <strong>Date:</strong> <?php echo e(\Carbon\Carbon::now()->translatedFormat('l d F Y')); ?> <br>
                </td>
                <td style="background:#eee;padding:20px;">
                    <strong>Commande :</strong> <?php echo e($commande->annonce?->title); ?> <br>
                    <strong>Createur de la commande :</strong> <?php echo e($commande->creatorUser?->first_name); ?> <?php echo e($commande->creatorUser?->name); ?> <br>
                    <strong>Receveur de la commande :</strong> <?php echo e($commande->receverUser?->first_name); ?> <?php echo e($commande->receverUser?->name); ?> <br>
                </td>
            </tr>
        </table><br>
        <table width="100%">
            <tr>
                <td>
                    <table>
                        <tr>
                            <td style="vertical-align: text-top;">
                                <div
                                    style="background: #ffd9e8 url(https://cdn0.iconfinder.com/data/icons/commerce-line-1/512/comerce_delivery_shop_business-07-128.png);width: 50px;height: 50px;margin-right: 10px;background-position: center;background-size: 42px;">
                                </div>
                            </td>
                            <td>
                                <strong>Trajet</strong><br>
                                <?php echo e($commande->annonce?->company); ?>

                                <?php echo e($commande->annonce?->title); ?><br>
                                <?php echo e($commande->annonce?->starts_city); ?> <br>
                                <?php echo e($commande->annonce?->ends_city); ?> <br>
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table>
                        <tr>
                            <td style="vertical-align: text-top;">
                                <div
                                    style="background: #ffd9e8 url(https://cdn4.iconfinder.com/data/icons/app-custom-ui-1/48/Check_circle-128.png) no-repeat;width: 50px;height: 50px;margin-right: 10px;background-position: center;background-size: 25px;">
                                </div>
                            </td>
                            <td>
                                <strong>Horaires</strong><br>
                                Depart : <?php echo e($commande->annonce?->starts_at->translatedFormat('d M Y')); ?> <br>
                                Arrivée <?php echo e($commande->annonce?->ends_at->translatedFormat('d M Y')); ?> <br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table><br>
        <div
            style="background: #ffd9e8 url(https://cdn4.iconfinder.com/data/icons/basic-ui-2-line/32/shopping-cart-shop-drop-trolly-128.png) no-repeat;width: 50px;height: 50px;margin-right: 10px;background-position: center;background-size: 25px;float: left; margin-bottom: 15px;">
        </div>
        <h3>Commande</h3>

        <table width="100%" style="border-collapse: collapse;border-bottom:1px solid #eee;">
            <tr>
                <td width="40%" class="column-header">Titre</td>
                <td width="20%" class="column-header">Kilogramme</td>
                <td width="20%" class="column-header">Price/Kg</td>
            </tr>
            <tr>
                <td class="row"><span style="color:#777;font-size:11px;"></span><br> <?php echo e($commande->title); ?> </td>
                <td class="row"> <?php echo e($commande->kg_commande); ?> kg</td>
                <td class="row"> <?php echo e($commande->price); ?>  €</td>
            </tr>

        </table><br>

        <table width="100%" style="background:#eee;padding:20px;">
            <tr>
                <td>
                    <table width="300px" style="float:right">
                        <tr>
                            <td><strong>Total :</strong></td>
                            <td style="text-align:right"> <?php echo e($commande->total); ?> € </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <div class="alert">Si ces informations ne vous disent rien, ignorez ce mail </div>
        <div class="socialmedia"> L'Equipe <small> <a href="<?php echo e(route('home')); ?>"> <?php echo e(config('app.name')); ?> </a></small></div>
    </div><!-- container -->

</body>

</html>
<?php /**PATH D:\projets\taffe\azilink\resources\views/emails/alerte-commande.blade.php ENDPATH**/ ?>