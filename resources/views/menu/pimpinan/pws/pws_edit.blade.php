@extends('layouts.dashboard')

@section('breadcump')
<li class="breadcrumb-item">
    <a href="{{route('pimpinan')}}">Pimpinan</a> 
</li>
<li class="breadcrumb-item">
    <a href="{{route('pws')}}">Pengawasan</a> 
</li>
<li class="breadcrumb-item">
    Edit Pengawasan
</li>
@endsection

@section('content')
@if (session('status'))            
<script> 
    window.setTimeout(function() { 
        $(".alert-success").fadeTo(500, 0).slideUp(500, function(){ 
            $(this).remove(); 
        }); 
    }, 3000); 
</script> 

<div class="alert alert-success" role="alert">
    {{session('status')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button> 
</div> 
@endif                    
<div class="card">
    <div class="card-body">       
        <div class="row">
            <div class="col">
                <h3 style="margin-bottom:20px"><b>Edit Protokoler</b></h3>                       
            </div>           
        </div>
        <form method="POST" action="/pimpinan/pws/{{$pws->id}}/update" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    <small> 
                                        Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </small> 
                                    </span>
                                </div>
                                <select class="form-control" id="exampleFormControlSelect1" name="tanggal" >                    
                                    <option>{{$pws->tanggal}}</option>
                                    <option>1</option><option>2</option><option>3</option><option>4</option><option>5</option>
                                    <option>6</option><option>7</option><option>8</option><option>9</option><option>10</option>
                                    <option>11</option><option>12</option><option>13</option><option>14</option><option>15</option>
                                    <option>16</option><option>17</option><option>18</option><option>19</option><option>20</option>
                                    <option>21</option><option>22</option><option>23</option><option>24</option><option>25</option>
                                    <option>26</option><option>27</option><option>28</option><option>29</option><option>30</option>
                                    <option>31</option>
                                </select>
                                <select class="form-control" id="exampleFormControlSelect1" name="bulan">      
                                    <option>{{$pws->bulan}}</option> 
                                    <option>Januari</option><option>Februari</option><option>Maret</option><option>April</option><option>Mei</option>
                                    <option>Juni</option><option>Juli</option><option>Agustus</option><option>September</option><option>Oktober</option>
                                    <option>November</option><option>Desember</option>
                                </select>
                                <select class="form-control" id="exampleFormControlSelect1" name="tahun">       
                                    <option>{{$pws->tahun}}</option>
                                    <option>2020</option><option>2019</option><option>2018</option><option>2017</option><option>2018</option>
                                    <option>2017</option><option>2016</option><option>2015</option><option>2014</option><option>2013</option>
                                    <option>2012</option><option>2011</option><option>2010</option><option>2009</option><option>2008</option>
                                    <option>2007</option><option>2006</option><option>2005</option><option>2004</option><option>2003</option>
                                    <option>2002</option><option>2001</option><option>2000</option><option>1999</option><option>1998</option>
                                </select>
                            </div>          
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    <small> 
                                        Nama Pegawai&nbsp;
                                        </small> 
                                    </span>
                                </div>
                                <input id="nama_pegawai" value="{{$pws->nama_pegawai}}" type="text" placeholder="Nama Pegawai " class="form-control" name="nama_pegawai" required autocomplete="nama_pegawai">                       
                            </div>    
                            
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    <small> 
                                    Jam Mulai   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </small> 
                                    </span>
                                </div>
                                <select class="form-control" id="exampleFormControlSelect1" name="jam_mulai">       
                                    <option>{{$pws->jam_mulai}}</option>  
                                    <option>00</option><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option>
                                    <option>06</option><option>07</option><option>08</option><option>09</option><option>10</option>
                                    <option>11</option><option>12</option><option>13</option><option>14</option><option>15</option>
                                    <option>16</option><option>17</option><option>18</option><option>19</option><option>20</option>
                                    <option>21</option><option>22</option><option>23</option>
                                </select>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        :
                                    </span>
                                </div>
                                <select class="form-control" id="exampleFormControlSelect1" name="menit_mulai">     
                                    <option>{{$pws->menit_mulai}}</option>
                                    <option>00</option><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option>
                                    <option>06</option><option>07</option><option>08</option><option>09</option><option>10</option>
                                    <option>11</option><option>12</option><option>13</option><option>14</option><option>15</option>
                                    <option>16</option><option>17</option><option>18</option><option>19</option><option>20</option>
                                    <option>21</option><option>22</option><option>23</option><option>24</option><option>25</option>
                                    <option>26</option><option>27</option><option>28</option><option>29</option><option>30</option>
                                    <option>31</option><option>32</option><option>33</option><option>34</option><option>35</option>
                                    <option>36</option><option>37</option><option>38</option><option>39</option><option>40</option>
                                    <option>41</option><option>42</option><option>43</option><option>44</option><option>45</option>
                                    <option>46</option><option>47</option><option>48</option><option>49</option><option>50</option>
                                    <option>51</option><option>52</option><option>53</option><option>54</option><option>55</option>
                                    <option>56</option><option>57</option><option>58</option><option>59</option>
                                </select>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        WIB
                                    </span>
                                </div>
                            </div>      
                            <div class="input-group mb-3" >
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    <small> 
                                        Jam Selesai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </small> 
                                    </span>
                                </div>
                                <select class="form-control" id="exampleFormControlSelect1" name="jam_selesai">      
                                    <option>{{$pws->jam_selesai}}</option>              
                                    <option>00</option><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option>
                                    <option>06</option><option>07</option><option>08</option><option>09</option><option>10</option>
                                    <option>11</option><option>12</option><option>13</option><option>14</option><option>15</option>
                                    <option>16</option><option>17</option><option>18</option><option>19</option><option>20</option>
                                    <option>21</option><option>22</option><option>23</option>
                                </select>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        :
                                    </span>
                                </div>
                                <select class="form-control" id="exampleFormControlSelect1" name="menit_selesai">    
                                    <option>{{$pws->menit_selesai}}</option>
                                    <option>00</option><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option>
                                    <option>06</option><option>07</option><option>08</option><option>09</option><option>10</option>
                                    <option>11</option><option>12</option><option>13</option><option>14</option><option>15</option>
                                    <option>16</option><option>17</option><option>18</option><option>19</option><option>20</option>
                                    <option>21</option><option>22</option><option>23</option><option>24</option><option>25</option>
                                    <option>26</option><option>27</option><option>28</option><option>29</option><option>30</option>
                                    <option>31</option><option>32</option><option>33</option><option>34</option><option>35</option>
                                    <option>36</option><option>37</option><option>38</option><option>39</option><option>40</option>
                                    <option>41</option><option>42</option><option>43</option><option>44</option><option>45</option>
                                    <option>46</option><option>47</option><option>48</option><option>49</option><option>50</option>
                                    <option>51</option><option>52</option><option>53</option><option>54</option><option>55</option>
                                    <option>56</option><option>57</option><option>58</option><option>59</option>
                                </select>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        WIB
                                    </span>
                                </div>
                            </div>   
                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    <small> 
                                        Kegiatan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </small> 
                                    </span>
                                </div>
                                <input id="kegiatan" type="text" value="{{$pws->kegiatan}}"placeholder="Nama Kegiatan" class="form-control" name="kegiatan" required autocomplete="kegiatan">                       
                            </div>    
                            <div class="form-group">            
                                <label for="exampleFormControlTextarea1">Hasil Kegiatan</label>
                                <textarea class="form-control" name="hasil_kegiatan" id="exampleFormControlTextarea1" rows="2">{{$pws->hasil_kegiatan}}</textarea>
                            </div>                                
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-file-container">  
                                        <input class="input-file" name="foto" id="my-file" type="file">
                                        <label tabindex="0" for="my-file" class="input-file-trigger">Upload Foto Pegawai</label>
                                    </div>
                                </div>                            
                            </div>    
                        </div>
                    </div>                         
                                         
                    <div class="row">
                        <div class="col">
                            <a href="{{route('pws')}}" class="btn btn-block btn-light">
                                Kembali
                            </a>                                        
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-block btn-warning">
                                Simpan
                            </button>                    
                        </div>
                    </div>          
                </form>                  
    </div>              
</div>   
@endsection
