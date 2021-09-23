<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ public_path('css\bootstrap.css') }}" media="all" />

    <style>
        .box {
            padding: 5px;
            border: 2px solid black;
        }

        /* .box1 {
            margin-left:50px;
            margin-bottom: 100px;
            padding: 5px;
            border: 2px solid black;
        } */

        .angkutan{
            font-size: 45px;
            font-weight: bold;

        }

        .or{
            font-size: 100px;
            font-weight: bold;


        }

        .per{
            font-size: 40px;
            font-weight: bold;
        }

        .tb-text{
            font-size: 18px;
            font-weight: bold;
        }

        .tb-text2{
            font-size: 24px;
            font-weight: bold;
            color: #1a1f52;
        }

        .tb-text3{
            font-size: 120px;
            font-weight: bold;
            color: #1a1f52;
        }

        /* table */


    </style>
</head>


<body>
<div class="box">


    <div class="row">
        <div class="col-xs-5">
            <img class="logo" src="{{ public_path('assets/media/logos/organda-logo.png') }}" alt=""
                 srcset="" width="645" height="645">
        </div>
        <div class="col-xs center-block text-center">
            <div class="row">
                <div class="col-xs">
                    <span class="angkutan">Angkutan Khusus Pelabuhan</span>

                </div>
                <div class="col-xs">
                    <span class="or">ORGANDA</span>

                </div>
                <div class="col-xs">
                    <span class="per">TANJUNG PERAK - SURABAYA</span>

                </div>
                <div class="col-xs">
                    <span class="per">TAHUN 2021</span>

                </div>
                <div class="col-xs-6">
                    <table class="table" style="border:3px black solid; margin-left:70px; margin-top:10px;">
                        <tr>
                            <td class="tb-text" style="width: 10%; text-align:left; ">Nama Perusahaan</td>
                            <td class="tb-text2" style="width: 90%; text-align:left; vertical-align: middle;">{{ $sticker->perusahaan ?? '' }}</td>
                        </tr>
                        <tr>
                            <td class="tb-text" style="border-top: 3px black solid; width: 20%; text-align:left;">Nomor Polisi</td>
                            <td style="border-top: 3px black solid; width: 80%; text-align:left;"></td>
                            {{-- <td style="border: none; text-align:left;">Nomor Polisi</td>
                            <td style="border: none;"></td> --}}
                        </tr>
                        <tr>
                            <td colspan="2" class="tb-text3" style="border-bottom: 3px black solid; border-top:none;">{{$nopol}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>




</div>


</body>

</html>
