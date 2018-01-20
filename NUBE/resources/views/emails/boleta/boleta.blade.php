<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <title>NUBE | Resumen de cuenta</title>

    <link rel="stylesheet" type="text/css" href="{{'admin/emails/boleta/style.css'}}" />
    {{--
    <link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
    --}}
    <style type="text/css">
        .invoice-box{
            max-width:800px;
            margin:auto;
            padding:30px;
            border:1px solid #eee;
            box-shadow:0 0 10px rgba(0, 0, 0, .15);
            font-size:16px;
            line-height:24px;
            font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color:#555;
        }

        .invoice-box table{
            width:100%;
            line-height:inherit;
            text-align:left;
        }

        .invoice-box table td{
            padding:5px;
            vertical-align:top;
        }

        .invoice-box table tr td:nth-child(2){
            text-align:right;
        }

        .invoice-box table tr.top table td{
            padding-bottom:20px;
        }

        .invoice-box table tr.top table td.title{
            font-size:45px;
            line-height:45px;
            color:#333;
        }

        .invoice-box table tr.information table td{
            padding-bottom:40px;
        }

        .invoice-box table tr.heading td{
            background:#eee;
            border-bottom:1px solid #ddd;
            font-weight:bold;
        }

        .invoice-box table tr.details td{
            padding-bottom:20px;
        }

        .invoice-box table tr.item td{
            border-bottom:1px solid #eee;
        }

        .invoice-box table tr.item.last td{
            border-bottom:none;
        }

        .invoice-box table tr.total td:nth-child(2){
            border-top:2px solid #eee;
            font-weight:bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td{
                width:100%;
                display:block;
                text-align:center;
            }

            .invoice-box table tr.information table td{
                width:100%;
                display:block;
                text-align:center;
            }
        }
    </style>
</head>

<body>

<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            <img src="{{ asset('imagenes/LOGO-NUBE-editado.png')}}" style="width:50%; max-width:150px;">
                        </td>

                        <td>
                            Resumen período xx/xxxx<br>

                            <br>
                            <br>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <!--
        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>


                    </tr>
                </table>
            </td>
        </tr>
        -->
        <tr class="heading">
            <td>
                Conceptos de Alquiler:
            </td>

            <td>
                $ {{$monto_alquiler}}
            </td>
        </tr>

        <tr class="details">
            <td>
                Alquiler de $mes
            </td>

            <td>

            </td>
        </tr>

        <tr class="heading">
            <td>
                Conceptos de Expensas
            </td>

            <td>
                $ {{$monto_expensas}}
            </td>
        </tr>
        {{-- Expensas compartidas por edificio --}}
         @if($expensas["sueldo_personal"])
            <tr class="item">
                <td>
                    Sueldos Personal
                </td>

                <td>
                    $ {{$expensas["sueldo_personal"]}}
                </td>
            </tr>
        @endif
        @if($expensas["mant_ascensores"])
            <tr class="item">
                <td>
                    Mto. Ascensor
                </td>

                <td>
                    $ {{$expensas["mant_ascensores"]}}
                </td>
            </tr>
        @endif
        @if($expensas["ascensores"])
            <tr class="item">
                <td>
                    Amortización Ascensores
                </td>

                <td>
                    $ {{$expensas["ascensores"]}}
                </td>
            </tr>
        @endif
        @if($expensas["seguro"])
            <tr class="item">
                <td>
                    Seguro Edificio
                </td>

                <td>
                    $ {{$expensas["seguro"]}}
                </td>
            </tr>
        @endif
        @if($expensas["limpieza"])
            <tr class="item">
                <td>
                    Limpieza espacios comunes
                </td>

                <td>
                    $ {{$expensas["limpieza"]}}
                </td>
            </tr>
        @endif
        {{-- FIN -- Expensas compartidas por edificio --}}

        @foreach($conceptos as $concepto)
            <tr class="item">
                <td>
                    {{ $concepto["concepto"] }}
                </td>

                <td>
                    $ {{$concepto["monto"]}}
                </td>
            </tr>
        @endforeach
        <tr class="total">
            <td></td>
            <td>
                Total: <b>$ {{$total}}</b>
            </td>
        </tr>
    </table>
</div>
</body>
</html>

<?php
    function getFecha_de_hoy(){
        $array_fecha = getdate();
        $año = $array_fecha['year'];
        $mes = $array_fecha['mon'];
        $dia = $array_fecha['mday'];
        if(strlen ($mes)==1){                       #si mes tiene un digito anteponer un 0 al mes
            if(strlen ($dia)==1){                       #si dia tambien tiene un digito anteponer un 0 al dia
                $fecha_hoy = '-0'.$dia.'/0'.$mes.'/'.$año;
            }else{
                $fecha_hoy = $dia.'/0'.$mes.'/'.$año;
            }
        }else{
            if(strlen ($dia)==1){                       #si dia tiene un digito anteponer un 0 al dia
                $fecha_hoy = '0'.$dia.'/'.$mes.'/'.$año;
            }else{
                $fecha_hoy = $dia.'/'.$mes.'/'.$año;
            }
        }
        return $fecha_hoy;
    }
?>