   <?php 
   include 'header.php';
   include 'menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pacientes
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Pacientes</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <?php
     $msg = $_GET['msg'];
    if ($msg=='1') 
        {
          echo '  <div class="callout callout-info ">
            <h4> Cliente ya Registrado!</h4>

            <p>   </p>
          </div>'; 
        }

        if ($msg=='2') 
        {
          echo '
            <div class="callout callout-info ">
            <h4> Cliente Registrado!</h4>

            <p>   </p>
          </div>'; 
        }
        if ($msg=='3') 
        {
          echo '
            <div class="callout callout-info ">
            <h4> Cliente Actualizado!</h4>

            <p>   </p>
          </div>'; 


 
        }
 
      ?>

          <div class="box">
            <div class="box-header">
              <a href="nuevoPaciente">
              <button   class="btn btn-block btn-primary btn-sm"><h4> <strong>   <i class="fas fa-id-card-alt"></i>  Registrar Pacientes </strong></h4></button>
              </a>

            </div>
            <!-- /.box-header -->
            <div class="box-body">


              <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-striped" style="font-size:18px">
              <thead>
                <tr>
                    <th scope="col">Age (in months)</th>
                    <th scope="col">3rd Percentile Head Circumference (in centimeters)</th>
                    <th scope="col">5th Percentile Head Circumference (in centimeters)</th>
                    <th scope="col">10th Percentile Head Circumference (in centimeters)</th>
                    <th scope="col">25th Percentile Head Circumference (in centimeters)</th>
                    <th scope="col">50th Percentile Head Circumference (in centimeters)</th>
                    <th scope="col">75th Percentile Head Circumference (in centimeters)</th>
                    <th scope="col">90th Percentile Head Circumference (in centimeters)</th>
                    <th scope="col">95th Percentile Head Circumference (in centimeters)</th>
                    <th scope="col">97th Percentile Head Circumference (in centimeters)</th>
                </tr>
                </thead>
                <tbody>
                
                <tr>
<th scope="row" _msthash="2238613" _msttexthash="4368">0</th>
<td _msthash="2238327" _msttexthash="56693">31.48762</td>
<td _msthash="2238457" _msttexthash="56147">32.14881</td>
<td _msthash="2238587" _msttexthash="57369">33.08389</td>
<td _msthash="2238717" _msttexthash="56862">34.46952</td>
<td _msthash="2238847" _msttexthash="56914">35.81367</td>
<td _msthash="2238977" _msttexthash="55237">37.00426</td>
<td _msthash="2239107" _msttexthash="58643">37.97379</td>
<td _msthash="2239237" _msttexthash="56771">38.51574</td>
<td _msthash="2305420" _msttexthash="57109">38.85417</td>
</tr>
<tr>
<th scope="row" _msthash="2238809" _msttexthash="15353">0.5</th>
<td _msthash="2238522" _msttexthash="54834">33.25006</td>
<td _msthash="2238652" _msttexthash="56589">33.83392</td>
<td _msthash="2238782" _msttexthash="56355">34.67253</td>
<td _msthash="2238912" _msttexthash="58604">35.93987</td>
<td _msthash="2239042" _msttexthash="56264">37.19361</td>
<td _msthash="2239172" _msttexthash="55367">38.32125</td>
<td _msthash="2239302" _msttexthash="58617">39.24989</td>
<td _msthash="2239432" _msttexthash="56992">39.77262</td>
<td _msthash="2305629" _msttexthash="54470">40.10028</td>
</tr>
<tr>
<th scope="row" _msthash="2239003" _msttexthash="15444">1.5</th>
<td _msthash="2238718" _msttexthash="56615">35.78126</td>
<td _msthash="2238848" _msttexthash="56615">36.26428</td>
<td _msthash="2238978" _msttexthash="58175">36.97377</td>
<td _msthash="2239108" _msttexthash="58175">38.07878</td>
<td _msthash="2239238" _msttexthash="55965">39.20743</td>
<td _msthash="2239367" _msttexthash="57408">40.24987</td>
<td _msthash="2239497" _msttexthash="54912">41.12605</td>
<td _msthash="2239627" _msttexthash="56030">41.62581</td>
<td _msthash="2305836" _msttexthash="56511">41.94138</td>
</tr>
<tr>
<th scope="row" _msthash="2239199" _msttexthash="15535">2.5</th>
<td _msthash="2238913" _msttexthash="48412">37.5588</td>
<td _msthash="2239043" _msttexthash="59241">37.97959</td>
<td _msthash="2239173" _msttexthash="56225">38.60724</td>
<td _msthash="2239303" _msttexthash="56888">39.60637</td>
<td _msthash="2239433" _msttexthash="55406">40.65233</td>
<td _msthash="2239562" _msttexthash="57733">41.63968</td>
<td _msthash="2239692" _msttexthash="56641">42.48436</td>
<td _msthash="2239822" _msttexthash="58071">42.97189</td>
<td _msthash="2306044" _msttexthash="55952">43.28181</td>
</tr>
<tr>
<th scope="row" _msthash="2239393" _msttexthash="15626">3.5</th>
<td _msthash="2239109" _msttexthash="58422">38.89944</td>
<td _msthash="2239239" _msttexthash="57967">39.27893</td>
<td _msthash="2239368" _msttexthash="56186">39.85123</td>
<td _msthash="2239498" _msttexthash="56264">40.77713</td>
<td _msthash="2239628" _msttexthash="56641">41.76517</td>
<td _msthash="2239757" _msttexthash="56186">42.71455</td>
<td _msthash="2239887" _msttexthash="55705">43.53902</td>
<td _msthash="2240017" _msttexthash="56589">44.01984</td>
<td _msthash="2306252" _msttexthash="55783">44.32733</td>
</tr>
<tr>
<th scope="row" _msthash="2239588" _msttexthash="15717">4.5</th>
<td _msthash="2239304" _msttexthash="57941">39.95673</td>
<td _msthash="2239434" _msttexthash="56134">40.30766</td>
<td _msthash="2239563" _msttexthash="55211">40.84114</td>
<td _msthash="2239693" _msttexthash="56225">41.71483</td>
<td _msthash="2239823" _msttexthash="55809">42.66116</td>
<td _msthash="2239952" _msttexthash="57421">43.58358</td>
<td _msthash="2240082" _msttexthash="56810">44.39472</td>
<td _msthash="2240212" _msttexthash="57954">44.87197</td>
<td _msthash="2306460" _msttexthash="57902">45.17877</td>
</tr>
<tr>
<th scope="row" _msthash="2239783" _msttexthash="15808">5.5</th>
<td _msthash="2239499" _msttexthash="55705">40.81642</td>
<td _msthash="2239629" _msttexthash="55341">41.14714</td>
<td _msthash="2239758" _msttexthash="56160">41.65291</td>
<td _msthash="2239888" _msttexthash="58656">42.48889</td>
<td _msthash="2240018" _msttexthash="56992">43.40489</td>
<td _msthash="2240147" _msttexthash="54782">44.30801</td>
<td _msthash="2240277" _msttexthash="54574">45.11034</td>
<td _msthash="2240407" _msttexthash="57707">45.58593</td>
<td _msthash="2306668" _msttexthash="39013">45.893</td>
</tr>
<tr>
<th scope="row" _msthash="2239978" _msttexthash="15899">6.5</th>
<td _msthash="2239694" _msttexthash="55523">41.53109</td>
<td _msthash="2239824" _msttexthash="56394">41.84742</td>
<td _msthash="2239953" _msttexthash="45812">42.3333</td>
<td _msthash="2240083" _msttexthash="54600">43.14204</td>
<td _msthash="2240213" _msttexthash="45760">44.0361</td>
<td _msthash="2240342" _msttexthash="56953">44.92555</td>
<td _msthash="2240472" _msttexthash="55822">45.72225</td>
<td _msthash="2240602" _msttexthash="57278">46.19736</td>
<td _msthash="2306876" _msttexthash="55666">46.50524</td>
</tr>
<tr>
<th scope="row" _msthash="2240173" _msttexthash="15990">7.5</th>
<td _msthash="2239889" _msttexthash="54613">42.13521</td>
<td _msthash="2240019" _msttexthash="55237">42.44134</td>
<td _msthash="2240148" _msttexthash="54886">42.91311</td>
<td _msthash="2240278" _msttexthash="55666">43.70245</td>
<td _msthash="2240408" _msttexthash="57551">44.58097</td>
<td _msthash="2240537" _msttexthash="55328">45.46104</td>
<td _msthash="2240667" _msttexthash="55991">46.25443</td>
<td _msthash="2240797" _msttexthash="57668">46.72983</td>
<td _msthash="2307084" _msttexthash="47567">47.0388</td>
</tr>
<tr>
<th scope="row" _msthash="2303509" _msttexthash="16081">8.5</th>
<td _msthash="2303223" _msttexthash="55952">42.65253</td>
<td _msthash="2303353" _msttexthash="56173">42.95162</td>
<td _msthash="2303483" _msttexthash="55913">43.41365</td>
<td _msthash="2303613" _msttexthash="57382">44.18964</td>
<td _msthash="2303743" _msttexthash="56069">45.05761</td>
<td _msthash="2303873" _msttexthash="56927">45.93166</td>
<td _msthash="2304003" _msttexthash="57148">46.72349</td>
<td _msthash="2304133" _msttexthash="48542">47.1997</td>
<td _msthash="2370940" _msttexthash="48113">47.5099</td>
</tr>
<tr>
<th scope="row" _msthash="2303717" _msttexthash="16172">9.5</th>
<td _msthash="2303431" _msttexthash="54626">43.10009</td>
<td _msthash="2303561" _msttexthash="57460">43.39458</td>
<td _msthash="2303691" _msttexthash="55861">43.85025</td>
<td _msthash="2303821" _msttexthash="56719">44.61764</td>
<td _msthash="2303951" _msttexthash="57447">45.47908</td>
<td _msthash="2304081" _msttexthash="58357">46.34979</td>
<td _msthash="2304211" _msttexthash="55172">47.14142</td>
<td _msthash="2304341" _msttexthash="48061">47.6188</td>
<td _msthash="2371161" _msttexthash="56485">47.93027</td>
</tr>
<tr>
<th scope="row" _msthash="2303925" _msttexthash="21723">10.5</th>
<td _msthash="2303639" _msttexthash="56979">43.49049</td>
<td _msthash="2303769" _msttexthash="46995">43.7823</td>
<td _msthash="2303899" _msttexthash="55146">44.23432</td>
<td _msthash="2304029" _msttexthash="58604">44.99694</td>
<td _msthash="2304159" _msttexthash="56693">45.85506</td>
<td _msthash="2304289" _msttexthash="56550">46.72463</td>
<td _msthash="2304419" _msttexthash="56056">47.51714</td>
<td _msthash="2304549" _msttexthash="58396">47.99592</td>
<td _msthash="2371382" _msttexthash="57304">48.30867</td>
</tr>
<tr>
<th scope="row" _msthash="2304134" _msttexthash="21827">11.5</th>
<td _msthash="2303847" _msttexthash="55666">43.83332</td>
<td _msthash="2303977" _msttexthash="57005">44.12399</td>
<td _msthash="2304107" _msttexthash="56810">44.57454</td>
<td _msthash="2304237" _msttexthash="56979">45.33549</td>
<td _msthash="2304367" _msttexthash="57330">46.19295</td>
<td _msthash="2304497" _msttexthash="56225">47.06318</td>
<td _msthash="2304627" _msttexthash="57525">47.85744</td>
<td _msthash="2304757" _msttexthash="56823">48.33781</td>
<td _msthash="2371603" _msttexthash="56563">48.65181</td>
</tr>
<tr>
<th scope="row" _msthash="2304342" _msttexthash="21931">12.5</th>
<td _msthash="2304055" _msttexthash="37609">44.136</td>
<td _msthash="2304185" _msttexthash="57525">44.42679</td>
<td _msthash="2304315" _msttexthash="58383">44.87767</td>
<td _msthash="2304445" _msttexthash="56888">45.63952</td>
<td _msthash="2304575" _msttexthash="57616">46.49853</td>
<td _msthash="2304705" _msttexthash="56368">47.37091</td>
<td _msthash="2304835" _msttexthash="57018">48.16763</td>
<td _msthash="2304965" _msttexthash="57681">48.64972</td>
<td _msthash="2371824" _msttexthash="58279">48.96494</td>
</tr>
<tr>
<th scope="row" _msthash="2304550" _msttexthash="22035">13.5</th>
<td _msthash="2304263" _msttexthash="54964">44.40441</td>
<td _msthash="2304393" _msttexthash="58110">44.69639</td>
<td _msthash="2304523" _msttexthash="56628">45.14908</td>
<td _msthash="2304653" _msttexthash="57824">45.91398</td>
<td _msthash="2304783" _msttexthash="57980">46.77638</td>
<td _msthash="2304913" _msttexthash="55978">47.65214</td>
<td _msthash="2305043" _msttexthash="56472">48.45191</td>
<td _msthash="2305173" _msttexthash="57837">48.93584</td>
<td _msthash="2372045" _msttexthash="56017">49.25225</td>
</tr>
<tr>
<th scope="row" _msthash="2304758" _msttexthash="22139">14.5</th>
<td _msthash="2304471" _msttexthash="56576">44.64328</td>
<td _msthash="2304601" _msttexthash="56706">44.93733</td>
<td _msthash="2304731" _msttexthash="46644">45.3931</td>
<td _msthash="2304861" _msttexthash="56550">46.16284</td>
<td _msthash="2304991" _msttexthash="55328">47.03018</td>
<td _msthash="2305121" _msttexthash="56550">47.91038</td>
<td _msthash="2305251" _msttexthash="56264">48.71371</td>
<td _msthash="2305381" _msttexthash="58058">49.19955</td>
<td _msthash="2372266" _msttexthash="55900">49.51712</td>
</tr>
<tr>
<th scope="row" _msthash="2304966" _msttexthash="22243">15.5</th>
<td _msthash="2304679" _msttexthash="57421">44.85646</td>
<td _msthash="2304809" _msttexthash="55432">45.15333</td>
<td _msthash="2304939" _msttexthash="55705">45.61325</td>
<td _msthash="2305069" _msttexthash="57889">46.38937</td>
<td _msthash="2305199" _msttexthash="57135">47.26295</td>
<td _msthash="2305329" _msttexthash="57460">48.14848</td>
<td _msthash="2305459" _msttexthash="58682">48.95578</td>
<td _msthash="2305589" _msttexthash="56420">49.44362</td>
<td _msthash="2372487" _msttexthash="56615">49.76233</td>
</tr>
<tr>
<th scope="row" _msthash="2305174" _msttexthash="22347">16.5</th>
<td _msthash="2304887" _msttexthash="55263">45.04712</td>
<td _msthash="2305017" _msttexthash="56888">45.34746</td>
<td _msthash="2305147" _msttexthash="56147">45.81245</td>
<td _msthash="2305277" _msttexthash="57473">46.59626</td>
<td _msthash="2305407" _msttexthash="56407">47.47721</td>
<td _msthash="2305537" _msttexthash="57408">48.36881</td>
<td _msthash="2305667" _msttexthash="56342">49.18045</td>
<td _msthash="2305797" _msttexthash="56498">49.67034</td>
<td _msthash="2372708" _msttexthash="57564">49.99018</td>
</tr>
<tr>
<th scope="row" _msthash="2305382" _msttexthash="22451">17.5</th>
<td _msthash="2305095" _msttexthash="47346">45.2179</td>
<td _msthash="2305225" _msttexthash="56290">45.52229</td>
<td _msthash="2305355" _msttexthash="57070">45.99315</td>
<td _msthash="2305485" _msttexthash="58643">46.78578</td>
<td _msthash="2305615" _msttexthash="56563">47.67504</td>
<td _msthash="2305745" _msttexthash="57096">48.57336</td>
<td _msthash="2305875" _msttexthash="57980">49.38963</td>
<td _msthash="2306005" _msttexthash="57928">49.88166</td>
<td _msthash="2372929" _msttexthash="54405">50.20261</td>
</tr>
<tr>
<th scope="row" _msthash="2303704" _msttexthash="22555">18.5</th>
<td _msthash="2303418" _msttexthash="55341">45.37104</td>
<td _msthash="2303548" _msttexthash="59046">45.67997</td>
<td _msthash="2303678" _msttexthash="57252">46.15739</td>
<td _msthash="2303808" _msttexthash="57993">46.95981</td>
<td _msthash="2303938" _msttexthash="56797">47.85821</td>
<td _msthash="2304068" _msttexthash="58435">48.76379</td>
<td _msthash="2304198" _msttexthash="58695">49.58497</td>
<td _msthash="2304328" _msttexthash="56849">50.07919</td>
<td _msthash="2371148" _msttexthash="54561">50.40125</td>
</tr>
<tr>
<th scope="row" _msthash="2303912" _msttexthash="22659">19.5</th>
<td _msthash="2303626" _msttexthash="56186">45.50843</td>
<td _msthash="2303756" _msttexthash="55939">45.82234</td>
<td _msthash="2303886" _msttexthash="56381">46.30692</td>
<td _msthash="2304016" _msttexthash="58110">47.11999</td>
<td _msthash="2304146" _msttexthash="55614">48.02822</td>
<td _msthash="2304276" _msttexthash="56667">48.94153</td>
<td _msthash="2304406" _msttexthash="58786">49.76786</td>
<td _msthash="2304536" _msttexthash="55250">50.26432</td>
<td _msthash="2371369" _msttexthash="56550">50.58751</td>
</tr>
<tr>
<th scope="row" _msthash="2304120" _msttexthash="21814">20.5</th>
<td _msthash="2303834" _msttexthash="57083">45.63169</td>
<td _msthash="2303964" _msttexthash="57564">45.95096</td>
<td _msthash="2304094" _msttexthash="55978">46.44325</td>
<td _msthash="2304224" _msttexthash="58136">47.26769</td>
<td _msthash="2304354" _msttexthash="57369">48.18637</td>
<td _msthash="2304484" _msttexthash="56238">49.10781</td>
<td _msthash="2304614" _msttexthash="58617">49.93948</td>
<td _msthash="2304744" _msttexthash="56082">50.43825</td>
<td _msthash="2371590" _msttexthash="57200">50.76259</td>
</tr>
<tr>
<th scope="row" _msthash="2304329" _msttexthash="21918">21.5</th>
<td _msthash="2304042" _msttexthash="55380">45.74221</td>
<td _msthash="2304172" _msttexthash="56927">46.06719</td>
<td _msthash="2304302" _msttexthash="58058">46.56767</td>
<td _msthash="2304432" _msttexthash="55133">47.40413</td>
<td _msthash="2304562" _msttexthash="57122">48.33377</td>
<td _msthash="2304692" _msttexthash="47515">49.2637</td>
<td _msthash="2304822" _msttexthash="55757">50.10089</td>
<td _msthash="2304952" _msttexthash="54275">50.60203</td>
<td _msthash="2371811" _msttexthash="56394">50.92752</td>
</tr>
<tr>
<th scope="row" _msthash="2304537" _msttexthash="22022">22.5</th>
<td _msthash="2304250" _msttexthash="55354">45.84121</td>
<td _msthash="2304380" _msttexthash="55133">46.17221</td>
<td _msthash="2304510" _msttexthash="57226">46.68129</td>
<td _msthash="2304640" _msttexthash="55770">47.53035</td>
<td _msthash="2304770" _msttexthash="46995">48.4714</td>
<td _msthash="2304900" _msttexthash="45578">49.4101</td>
<td _msthash="2305030" _msttexthash="56901">50.25298</td>
<td _msthash="2305160" _msttexthash="56771">50.75654</td>
<td _msthash="2372032" _msttexthash="55055">51.08322</td>
</tr>
<tr>
<th scope="row" _msthash="2304745" _msttexthash="22126">23.5</th>
<td _msthash="2304458" _msttexthash="57837">45.92974</td>
<td _msthash="2304588" _msttexthash="56108">46.26704</td>
<td _msthash="2304718" _msttexthash="56355">46.78511</td>
<td _msthash="2304848" _msttexthash="56784">47.64724</td>
<td _msthash="2304978" _msttexthash="54509">48.60011</td>
<td _msthash="2305108" _msttexthash="57876">49.54784</td>
<td _msthash="2305238" _msttexthash="57005">50.39655</td>
<td _msthash="2305368" _msttexthash="56420">50.90258</td>
<td _msthash="2372253" _msttexthash="55380">51.23047</td>
</tr>
<tr>
<th scope="row" _msthash="2304953" _msttexthash="22230">24.5</th>
<td _msthash="2304666" _msttexthash="55965">46.00872</td>
<td _msthash="2304796" _msttexthash="57070">46.35259</td>
<td _msthash="2304926" _msttexthash="59410">46.87997</td>
<td _msthash="2305056" _msttexthash="57239">47.75563</td>
<td _msthash="2305186" _msttexthash="56498">48.72065</td>
<td _msthash="2305316" _msttexthash="57733">49.67762</td>
<td _msthash="2305446" _msttexthash="56004">50.53229</td>
<td _msthash="2305576" _msttexthash="55575">51.04085</td>
<td _msthash="2372474" _msttexthash="58370">51.36998</td>
</tr>
<tr>
<th scope="row" _msthash="2305161" _msttexthash="22334">25.5</th>
<td _msthash="2304874" _msttexthash="58396">46.07898</td>
<td _msthash="2305004" _msttexthash="56940">46.42963</td>
<td _msthash="2305134" _msttexthash="57694">46.96663</td>
<td _msthash="2305264" _msttexthash="56485">47.85621</td>
<td _msthash="2305394" _msttexthash="57603">48.83367</td>
<td _msthash="2305524" _msttexthash="55978">49.80008</td>
<td _msthash="2305654" _msttexthash="55991">50.66082</td>
<td _msthash="2305784" _msttexthash="56641">51.17196</td>
<td _msthash="2372695" _msttexthash="55302">51.50236</td>
</tr>
<tr>
<th scope="row" _msthash="2305369" _msttexthash="22438">26.5</th>
<td _msthash="2305082" _msttexthash="55094">46.14124</td>
<td _msthash="2305212" _msttexthash="59215">46.49889</td>
<td _msthash="2305342" _msttexthash="57265">47.04578</td>
<td _msthash="2305472" _msttexthash="57798">47.94962</td>
<td _msthash="2305602" _msttexthash="58656">48.93976</td>
<td _msthash="2305732" _msttexthash="58214">49.91578</td>
<td _msthash="2305862" _msttexthash="57655">50.78269</td>
<td _msthash="2305992" _msttexthash="57174">51.29647</td>
<td _msthash="2372916" _msttexthash="56498">51.62817</td>
</tr>
<tr>
<th scope="row" _msthash="2305577" _msttexthash="22542">27.5</th>
<td _msthash="2305290" _msttexthash="56420">46.19614</td>
<td _msthash="2305421" _msttexthash="57655">46.56098</td>
<td _msthash="2305550" _msttexthash="54977">47.11801</td>
<td _msthash="2305680" _msttexthash="46683">48.0364</td>
<td _msthash="2305810" _msttexthash="56901">49.03945</td>
<td _msthash="2305940" _msttexthash="54223">50.02521</td>
<td _msthash="2306070" _msttexthash="58357">50.89839</td>
<td _msthash="2306200" _msttexthash="56290">51.41485</td>
<td _msthash="2373137" _msttexthash="48100">51.7479</td>
</tr>
<tr>
<th scope="row" _msthash="2303900" _msttexthash="22646">28.5</th>
<td _msthash="2303614" _msttexthash="55874">46.24425</td>
<td _msthash="2303744" _msttexthash="56797">46.61646</td>
<td _msthash="2303874" _msttexthash="57278">47.18385</td>
<td _msthash="2304004" _msttexthash="56017">48.11707</td>
<td _msthash="2304135" _msttexthash="55029">49.13321</td>
<td _msthash="2304264" _msttexthash="56199">50.12883</td>
<td _msthash="2304394" _msttexthash="55588">51.00836</td>
<td _msthash="2304524" _msttexthash="56706">51.52756</td>
<td _msthash="2371356" _msttexthash="57772">51.86198</td>
</tr>
<tr>
<th scope="row" _msthash="2304108" _msttexthash="22750">29.5</th>
<td _msthash="2303822" _msttexthash="46943">46.2861</td>
<td _msthash="2303952" _msttexthash="57486">46.66583</td>
<td _msthash="2304082" _msttexthash="57395">47.24379</td>
<td _msthash="2304212" _msttexthash="56199">48.19206</td>
<td _msthash="2304343" _msttexthash="55952">49.22146</td>
<td _msthash="2304472" _msttexthash="55185">50.22705</td>
<td _msthash="2304602" _msttexthash="36634">51.113</td>
<td _msthash="2304732" _msttexthash="57733">51.63499</td>
<td _msthash="2371577" _msttexthash="56446">51.97081</td>
</tr>
<tr>
<th scope="row" _msthash="2304316" _msttexthash="21905">30.5</th>
<td _msthash="2304030" _msttexthash="55055">46.32214</td>
<td _msthash="2304160" _msttexthash="57057">46.70954</td>
<td _msthash="2304290" _msttexthash="57135">47.29824</td>
<td _msthash="2304420" _msttexthash="57291">48.26178</td>
<td _msthash="2304551" _msttexthash="56797">49.30458</td>
<td _msthash="2304680" _msttexthash="54197">50.32023</td>
<td _msthash="2304810" _msttexthash="55926">51.21268</td>
<td _msthash="2304940" _msttexthash="57486">51.73749</td>
<td _msthash="2371798" _msttexthash="56563">52.07475</td>
</tr>
<tr>
<th scope="row" _msthash="2304525" _msttexthash="22009">31.5</th>
<td _msthash="2304238" _msttexthash="47203">46.3528</td>
<td _msthash="2304368" _msttexthash="56082">46.74801</td>
<td _msthash="2304498" _msttexthash="56524">47.34761</td>
<td _msthash="2304628" _msttexthash="47268">48.3266</td>
<td _msthash="2304759" _msttexthash="57213">49.38292</td>
<td _msthash="2304888" _msttexthash="57057">50.40869</td>
<td _msthash="2305018" _msttexthash="46670">51.3077</td>
<td _msthash="2305148" _msttexthash="57135">51.83539</td>
<td _msthash="2372019" _msttexthash="55315">52.17413</td>
</tr>
<tr>
<th scope="row" _msthash="2304733" _msttexthash="22113">32.5</th>
<td _msthash="2304446" _msttexthash="57213">46.37844</td>
<td _msthash="2304576" _msttexthash="57863">46.78159</td>
<td _msthash="2304706" _msttexthash="56511">47.39225</td>
<td _msthash="2304836" _msttexthash="57928">48.38684</td>
<td _msthash="2304967" _msttexthash="58292">49.45678</td>
<td _msthash="2305096" _msttexthash="56849">50.49275</td>
<td _msthash="2305226" _msttexthash="57447">51.39837</td>
<td _msthash="2305356" _msttexthash="58422">51.92898</td>
<td _msthash="2372240" _msttexthash="56251">52.26923</td>
</tr>
<tr>
<th scope="row" _msthash="2304941" _msttexthash="22217">33.5</th>
<td _msthash="2304654" _msttexthash="57291">46.39942</td>
<td _msthash="2304784" _msttexthash="55549">46.81061</td>
<td _msthash="2304914" _msttexthash="56485">47.43247</td>
<td _msthash="2305044" _msttexthash="56316">48.44281</td>
<td _msthash="2305175" _msttexthash="56940">49.52645</td>
<td _msthash="2305303" _msttexthash="56888">50.57267</td>
<td _msthash="2305433" _msttexthash="57642">51.48496</td>
<td _msthash="2305563" _msttexthash="55627">52.01853</td>
<td _msthash="2372461" _msttexthash="54964">52.36032</td>
</tr>
<tr>
<th scope="row" _msthash="2305149" _msttexthash="22321">34.5</th>
<td _msthash="2304862" _msttexthash="55679">46.41605</td>
<td _msthash="2304992" _msttexthash="47359">46.8354</td>
<td _msthash="2305122" _msttexthash="58019">47.46857</td>
<td _msthash="2305252" _msttexthash="58630">48.49479</td>
<td _msthash="2305383" _msttexthash="57356">49.59218</td>
<td _msthash="2305511" _msttexthash="47684">50.6487</td>
<td _msthash="2305641" _msttexthash="56706">51.56771</td>
<td _msthash="2305771" _msttexthash="55575">52.10429</td>
<td _msthash="2372682" _msttexthash="56771">52.44764</td>
</tr>
<tr>
<th scope="row" _msthash="2305357" _msttexthash="22425">35.5</th>
<td _msthash="2305070" _msttexthash="47502">46.4286</td>
<td _msthash="2305200" _msttexthash="56381">46.85621</td>
<td _msthash="2305330" _msttexthash="55458">47.50081</td>
<td _msthash="2305460" _msttexthash="55250">48.54301</td>
<td _msthash="2305590" _msttexthash="56485">49.65423</td>
<td _msthash="2305719" _msttexthash="55445">50.72108</td>
<td _msthash="2305849" _msttexthash="57473">51.64686</td>
<td _msthash="2305979" _msttexthash="56823">52.18646</td>
<td _msthash="2372903" _msttexthash="55302">52.53143</td>
</tr>
<tr>
<th scope="row" _msthash="2305564" _msttexthash="10257">36</th>
<td _msthash="2305278" _msttexthash="55991">46.43344</td>
<td _msthash="2305408" _msttexthash="56368">46.86521</td>
<td _msthash="2305538" _msttexthash="56784">47.51556</td>
<td _msthash="2305668" _msttexthash="58305">48.56578</td>
<td _msthash="2305798" _msttexthash="58123">49.68394</td>
<td _msthash="2305927" _msttexthash="57837">50.75597</td>
<td _msthash="2306057" _msttexthash="56342">51.68514</td>
<td _msthash="2306187" _msttexthash="56121">52.22628</td>
<td _msthash="2373124" _msttexthash="55718">52.57205</td>
</tr>



                </tbody>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php
  include 'footer.php';
?>

