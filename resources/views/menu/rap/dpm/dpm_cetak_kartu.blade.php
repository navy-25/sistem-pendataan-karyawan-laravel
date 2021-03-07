<!DOCTYPE html>

<style>     
    .data{
        font-family: sans-serif;
        color: #4a4a4a;
        font-size:11px;
    } 
    .syarat{
        font-family: sans-serif;
        color: #4a4a4a;
        font-size:9px;
    }
    td{
        vertical-align: top;
    }
</style>

<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <title>Test</title> -->
    </head>
    <body>
        <div>           
            <div class="content">
                <div class="title m-b-md">       
                    <img  src="{{'asset/kartu.png'}}" alt="kartu identitas pengungsi" width="410px" height="265px" style="margin:50px;position:absolute;z-index:1" > 
                    <img  src="{{'images/codeQR/'.$dpm->nomor_register.'.png'}}" alt="kartu identitas pengungsi" width="60px" height="60px" style="margin-left:380px;margin-top:240px;position:absolute;z-index:2" > 
                    <img  src="{{'images/rap/dpm/foto/'.$dpm->foto}}" alt="foto identitas pengungsi" width="60px" height="75px" style="margin-left:380px;margin-top:130px;position:absolute;z-index:2" > 
                    <div class="data" style="margin-top:218px;margin-left:383px;position:absolute;z-index:3" >                                              
                        <b>
                            {{$dpm->nomor_register}}
                        </b>
                    </div>
                    <table class="data" style="margin-top:165px;margin-left:70px;position:absolute;z-index:3;width:300px" > 
                        <tbody>
                            <tr>
                                <td style="width:100px">Name / Nama</td>
                                <td>:</td>
                                <td style="width:190px">{{$dpm->nama_pengungsi}}</td>
                            </tr>
                            <?php
                                $tanggal = $dpm->tanggal;
                                $newtanggal = date('d F Y', strtotime($tanggal));
                            ?>
                            <tr>
                                <td>Date of Birth / TL</td>
                                <td>:</td>
                                <td>{{$newtanggal}}</td>
                            </tr>
                            <tr>
                                <td>COF / Negara Asal</td>
                                <td>:</td>
                                <td>{{$dpm->kewarganegaraan}}</td>
                            </tr>
                            <tr>
                                <td>Address / Alamat</td>
                                <td>:</td>
                                <td>{{$dpm->alamat}} </td>
                            </tr>
                            <tr>
                                <td>UNHCR Number</td>
                                <td>:</td>
                                <td>{{$dpm->no_unchcr}} </td>
                            </tr>
                        </tbody>
                    </table>   
                </div>                                                               
            </div>
        </div>
    </body>
</html>
