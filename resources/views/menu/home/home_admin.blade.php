<div class="card">
    <div class="card-body">        
        <div class="row" style="margin-top:10px">
            <div class="col-xl-9 col-md-8 col-sm-12 ">
            <h3 style="margin-bottom:20px"><b>Catatan Laporan Petugas Jaga</b> </h3>                       
            </div>                       
            <form class="col-xl-3 col-md-4  col-sm-12">
                <input type="text" style="margin-bottom:20px" name="cari"  class="form-control" placeholder="Cari Nama Petugas"> <a class="srh-btn"><i class="ti-search"></i></a>
            </form>          
        </div>
        <table class="table table-hover  table-striped table-responsive-md">
            <thead>
                <tr class="teks" >
                    <th scope="col" style="width:5%">
                    <center>
                        No
                    </center>
                    </th>
                    <th scope="col" style="width:25%">Nama Petugas</th>
                    <th scope="col" style="width:15%">Tanggal Pengawalan</th>
                    <th scope="col" style="width:17%">Durasi Jaga</th>
                    <th scope="col" style="width:12%">Dibuat</th>
                    <th scope="col" style="width:15%">
                    <center>
                    Action
                    </center>
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php
                $no =count($lpj);
            ?>
                @foreach($lpj as $du)                         
                <tr class="teks" >
                    <th>
                        <center>
                        {{$no--}}
                        </center>                       
                    </th>
                    <td>{{$du->nama_petugas}}</td>
                    <td>{{$du->tanggal}}/{{$du->bulan}}/{{$du->tahun}}</td>
                    <td>
                        <?php
                            $a = $du->jam_mulai;
                            $b = $du->menit_mulai;
                            $c = $du->jam_selesai;
                            $d = $du->menit_selesai;
                            if($a>=0 && $b>=0 && $c>=0 && $d>=0 ){
                                if($a<=$c){
                                    $jam = $c - $a;
                                    $menit = $d - $b;
                                    $jumlah = ($jam * 60) + $menit;
                                }else if($a>=$c){
                                    $jam_over_a = 24 - $a;
                                    $menit = $d - $b;
                                    $jumlah = ($jam_over_a * 60) + $menit + ($c * 60) ;
                                }                                
                            }else{
                                $jumlah = "Error !";
                            }
                        ?>                        
                        {{$jumlah}} Menit


                        
                    </td>
                    <td>{{$du->created_at}}</td>
                    <td>                
                    <center>                
                        @if(auth()->user()->is_admin == 'tamu'|| auth()->user()->is_admin == 'user')               
                            <a href="/kamtib/lpj/{{$du->id}}/lihat" style="margin:2px" class="btn btn-brand btn-tumblr btn-sm">
                                <i class="cui cui-user"></i>
                            </a>
                        @elseif(auth()->user()->is_admin == 'admin') 
                            <a href="/home/{{$du->id}}/lihat" style="margin:2px" class="btn btn-brand btn-tumblr btn-sm">
                                <i class="cui cui-user"></i>
                            </a>
                        @endif
                        @if(auth()->user()->is_admin == 'user')               
                            <a href="/kamtib/lpj/{{$du->id}}/edit"  style="margin:2px" class="btn btn-brand btn-twitter btn-sm">
                                <i class="cui cui-pencil"></i>
                            </a>
                            <a href="/kamtib/lpj/{{$du->id}}/hapus" style="margin:2px"  class="btn btn-brand btn-html5 btn-sm" onclick="return confirm('Apakah anda yakin ?')">
                                <i class="cui cui-trash"></i>
                            </a>
                        @endif
                    </center>
                    </td>
                </tr>
                @endforeach            
            </tbody>
        </table>    
        @if(auth()->user()->is_admin == 'user')
            {{$lpj->links()}}
        @endif
    </div>
</div>
