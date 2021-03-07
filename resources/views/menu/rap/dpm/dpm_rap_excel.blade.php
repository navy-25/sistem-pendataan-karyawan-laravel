<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <style>
            .lingkaran{
                width: 70px;
                height: 80px;
                background: #414141; 
                /* border-radius: 100%; */
                /* background-image : url("/core-ui-master/src/img/avatars/5.jpg"); */
                background-repeat: no-repeat;
                background-position: center;
                background-size: 100%;
            }
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">   
            <table>
                <thead>
                    <tr>
                        <th>No</th>                    
                        <th>Foto</th>       
                        <th>Nama Pengungsi</th>                    
                        <th>Nomor Register</th>       
                        <th>Tahun Register</th>       
                        <th>Jenis Kelamin</th>    
                        <th>Tanggal Lahir</th>    
                        <th>Alamat</th>          
                        <th>Kewarganegaraan</th>       
                        <th>Barcode</th>       
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;
                    ?>
                    @foreach($datas as $du)                         
                    <tr >
                        <th>{{$no++}}</th>           
                        <th> 
                            @if($du->foto != null)
                                <img  src="{{'../public/images/rap/dpm/foto/'.$du->foto}}" class="lingkaran"  width="70px" height="80px">     
                            @else
                            
                            @endif
                        </th>
                        <th>{{$du->nama_pengungsi}}</th>           
                        <th>{{$du->nomor_register}}</th>           
                        <th>{{$du->tahun_registrasi}}</th>     
                        <th>{{$du->jenis_kelamin}}</th>           
                        <?php
                        $tanggal = $du->tanggal;
                        $newtanggal = date('d F Y', strtotime($tanggal));
                    ?>
                    <th>{{$newtanggal}}</th>          
                        <th>{{$du->alamat}}</th>          
                        <th>{{$du->kewarganegaraan}}</th>      
                        <th> 
                            <img  src="{{'../public/images/codeQR/'.$du->barcode}}" class="lingkaran"  width="70px" height="80px">     
                        </th>    
                       
                    </tr>
                    @endforeach                           
                </tbody>
            </table>           
        </div>
    </body>
</html>
