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
<th scope="row" _msthash="2239419" _msttexthash="4368">0</th>
<td _msthash="2239133" _msttexthash="45760">31.9302</td>
<td _msthash="2239263" _msttexthash="46423">32.2509</td>
<td _msthash="2239394" _msttexthash="58006">32.75949</td>
<td _msthash="2239523" _msttexthash="57044">33.65187</td>
<td _msthash="2239653" _msttexthash="56017">34.71156</td>
<td _msthash="2239784" _msttexthash="55952">35.85124</td>
<td _msthash="2239913" _msttexthash="47541">36.9535</td>
<td _msthash="2240043" _msttexthash="56797">37.65138</td>
<td _msthash="2306253" _msttexthash="45292">38.1211</td>
</tr>
<tr>
<th scope="row" _msthash="2239615" _msttexthash="15353">0.5</th>
<td _msthash="2239329" _msttexthash="55666">33.38071</td>
<td _msthash="2239459" _msttexthash="57187">33.68744</td>
<td _msthash="2239589" _msttexthash="56238">34.17346</td>
<td _msthash="2239718" _msttexthash="55497">35.02508</td>
<td _msthash="2239848" _msttexthash="55705">36.03454</td>
<td _msthash="2239979" _msttexthash="55978">37.11807</td>
<td _msthash="2240108" _msttexthash="55809">38.16405</td>
<td _msthash="2240238" _msttexthash="56810">38.82535</td>
<td _msthash="2306462" _msttexthash="55744">39.27006</td>
</tr>
<tr>
<th scope="row" _msthash="2239809" _msttexthash="15444">1.5</th>
<td _msthash="2239524" _msttexthash="57187">35.48627</td>
<td _msthash="2239654" _msttexthash="47944">35.7756</td>
<td _msthash="2239785" _msttexthash="55666">36.23326</td>
<td _msthash="2239914" _msttexthash="55640">37.03282</td>
<td _msthash="2240044" _msttexthash="57837">37.97672</td>
<td _msthash="2240174" _msttexthash="57434">38.98533</td>
<td _msthash="2240303" _msttexthash="58383">39.95459</td>
<td _msthash="2240433" _msttexthash="56277">40.56517</td>
<td _msthash="2306669" _msttexthash="57057">40.97482</td>
</tr>
<tr>
<th scope="row" _msthash="2240005" _msttexthash="15535">2.5</th>
<td _msthash="2239719" _msttexthash="48282">36.9855</td>
<td _msthash="2239849" _msttexthash="55783">37.26522</td>
<td _msthash="2239980" _msttexthash="57291">37.70685</td>
<td _msthash="2240109" _msttexthash="56290">38.47603</td>
<td _msthash="2240239" _msttexthash="55640">39.38013</td>
<td _msthash="2240368" _msttexthash="55250">40.34145</td>
<td _msthash="2240498" _msttexthash="55328">41.26063</td>
<td _msthash="2240628" _msttexthash="56082">41.83732</td>
<td _msthash="2306877" _msttexthash="54288">42.22321</td>
</tr>
<tr>
<th scope="row" _msthash="2240199" _msttexthash="15626">3.5</th>
<td _msthash="2239915" _msttexthash="54899">38.13114</td>
<td _msthash="2240045" _msttexthash="55783">38.40561</td>
<td _msthash="2240175" _msttexthash="56901">38.83814</td>
<td _msthash="2240304" _msttexthash="57499">39.58905</td>
<td _msthash="2240434" _msttexthash="56927">40.46774</td>
<td _msthash="2240563" _msttexthash="56290">41.39732</td>
<td _msthash="2240693" _msttexthash="55705">42.28153</td>
<td _msthash="2240823" _msttexthash="57304">42.83396</td>
<td _msthash="2307085" _msttexthash="45708">43.2026</td>
</tr>
<tr>
<th scope="row" _msthash="2240394" _msttexthash="15717">4.5</th>
<td _msthash="2240110" _msttexthash="56706">39.04619</td>
<td _msthash="2240240" _msttexthash="56069">39.31814</td>
<td _msthash="2240369" _msttexthash="58461">39.74588</td>
<td _msthash="2240499" _msttexthash="55497">40.48611</td>
<td _msthash="2240629" _msttexthash="55718">41.34841</td>
<td _msthash="2240758" _msttexthash="55393">42.25604</td>
<td _msthash="2240888" _msttexthash="56745">43.11489</td>
<td _msthash="2241018" _msttexthash="56680">43.64924</td>
<td _msthash="2307292" _msttexthash="56030">44.00486</td>
</tr>
<tr>
<th scope="row" _msthash="2240589" _msttexthash="15808">5.5</th>
<td _msthash="2240305" _msttexthash="49270">39.7996</td>
<td _msthash="2240435" _msttexthash="55991">40.07086</td>
<td _msthash="2240564" _msttexthash="56836">40.49672</td>
<td _msthash="2240694" _msttexthash="55094">41.23136</td>
<td _msthash="2240824" _msttexthash="55783">42.08335</td>
<td _msthash="2240953" _msttexthash="57811">42.97566</td>
<td _msthash="2241083" _msttexthash="56914">43.81575</td>
<td _msthash="2241213" _msttexthash="46488">44.3363</td>
<td _msthash="2307500" _msttexthash="56940">44.68183</td>
</tr>
<tr>
<th scope="row" _msthash="2240784" _msttexthash="15899">6.5</th>
<td _msthash="2240500" _msttexthash="56784">40.43379</td>
<td _msthash="2240630" _msttexthash="56524">40.70567</td>
<td _msthash="2240759" _msttexthash="54730">41.13171</td>
<td _msthash="2240889" _msttexthash="56589">41.86435</td>
<td _msthash="2241019" _msttexthash="55042">42.71034</td>
<td _msthash="2241148" _msttexthash="56381">43.59207</td>
<td _msthash="2241278" _msttexthash="55952">44.41815</td>
<td _msthash="2241408" _msttexthash="56212">44.92803</td>
<td _msthash="2307708" _msttexthash="56524">45.26563</td>
</tr>
<tr>
<th scope="row" _msthash="2240979" _msttexthash="15990">7.5</th>
<td _msthash="2240695" _msttexthash="57200">40.97672</td>
<td _msthash="2240825" _msttexthash="54886">41.25016</td>
<td _msthash="2240954" _msttexthash="58149">41.67787</td>
<td _msthash="2241084" _msttexthash="54288">42.41113</td>
<td _msthash="2241214" _msttexthash="56433">43.25429</td>
<td _msthash="2241343" _msttexthash="57421">44.12897</td>
<td _msthash="2241473" _msttexthash="56524">44.94461</td>
<td _msthash="2241603" _msttexthash="56901">45.44619</td>
<td _msthash="2307916" _msttexthash="57096">45.77751</td>
</tr>
<tr>
<th scope="row" _msthash="2304344" _msttexthash="16081">8.5</th>
<td _msthash="2304056" _msttexthash="57304">41.44768</td>
<td _msthash="2304186" _msttexthash="46254">41.7234</td>
<td _msthash="2304317" _msttexthash="55770">42.15391</td>
<td _msthash="2304447" _msttexthash="58981">42.88978</td>
<td _msthash="2304577" _msttexthash="46618">43.7325</td>
<td _msthash="2304707" _msttexthash="55770">44.60282</td>
<td _msthash="2304837" _msttexthash="56368">45.41078</td>
<td _msthash="2304968" _msttexthash="56719">45.90591</td>
<td _msthash="2371799" _msttexthash="55237">46.23224</td>
</tr>
<tr>
<th scope="row" _msthash="2304552" _msttexthash="16172">9.5</th>
<td _msthash="2304265" _msttexthash="56849">41.86058</td>
<td _msthash="2304395" _msttexthash="55432">42.13913</td>
<td _msthash="2304526" _msttexthash="46644">42.5733</td>
<td _msthash="2304655" _msttexthash="55835">43.31329</td>
<td _msthash="2304785" _msttexthash="56121">44.15743</td>
<td _msthash="2304915" _msttexthash="46241">45.0255</td>
<td _msthash="2305045" _msttexthash="58643">45.82799</td>
<td _msthash="2305176" _msttexthash="56030">46.31815</td>
<td _msthash="2372020" _msttexthash="55913">46.64053</td>
</tr>
<tr>
<th scope="row" _msthash="2304760" _msttexthash="21723">10.5</th>
<td _msthash="2304473" _msttexthash="56173">42.22575</td>
<td _msthash="2304603" _msttexthash="56251">42.50755</td>
<td _msthash="2304734" _msttexthash="56160">42.94604</td>
<td _msthash="2304863" _msttexthash="56498">43.69135</td>
<td _msthash="2304993" _msttexthash="57070">44.53837</td>
<td _msthash="2305123" _msttexthash="56992">45.40587</td>
<td _msthash="2305253" _msttexthash="56160">46.20466</td>
<td _msthash="2305384" _msttexthash="56485">46.69106</td>
<td _msthash="2372241" _msttexthash="54834">47.01035</td>
</tr>
<tr>
<th scope="row" _msthash="2304969" _msttexthash="21827">11.5</th>
<td _msthash="2304681" _msttexthash="55185">42.55105</td>
<td _msthash="2304811" _msttexthash="56381">42.83643</td>
<td _msthash="2304942" _msttexthash="57980">43.27977</td>
<td _msthash="2305071" _msttexthash="54600">44.03133</td>
<td _msthash="2305201" _msttexthash="56316">44.88241</td>
<td _msthash="2305331" _msttexthash="56238">45.75072</td>
<td _msthash="2305461" _msttexthash="56914">46.54726</td>
<td _msthash="2305591" _msttexthash="46488">47.0309</td>
<td _msthash="2372462" _msttexthash="47944">47.3478</td>
</tr>
<tr>
<th scope="row" _msthash="2305177" _msttexthash="21931">12.5</th>
<td _msthash="2304889" _msttexthash="46956">42.8426</td>
<td _msthash="2305019" _msttexthash="55289">43.13182</td>
<td _msthash="2305150" _msttexthash="55874">43.58043</td>
<td _msthash="2305279" _msttexthash="58188">44.33899</td>
<td _msthash="2305409" _msttexthash="56719">45.19508</td>
<td _msthash="2305539" _msttexthash="55679">46.06532</td>
<td _msthash="2305669" _msttexthash="57148">46.86084</td>
<td _msthash="2305799" _msttexthash="56303">47.34255</td>
<td _msthash="2372683" _msttexthash="57967">47.65766</td>
</tr>
<tr>
<th scope="row" _msthash="2305385" _msttexthash="22035">13.5</th>
<td _msthash="2305097" _msttexthash="55198">43.10526</td>
<td _msthash="2305227" _msttexthash="57174">43.39853</td>
<td _msthash="2305358" _msttexthash="56836">43.85274</td>
<td _msthash="2305486" _msttexthash="56836">44.61891</td>
<td _msthash="2305616" _msttexthash="57369">45.48078</td>
<td _msthash="2305746" _msttexthash="47528">46.3539</td>
<td _msthash="2305876" _msttexthash="56420">47.14942</td>
<td _msthash="2306006" _msttexthash="57447">47.62991</td>
<td _msthash="2372904" _msttexthash="57213">47.94373</td>
</tr>
<tr>
<th scope="row" _msthash="2305592" _msttexthash="22139">14.5</th>
<td _msthash="2305304" _msttexthash="56381">43.34294</td>
<td _msthash="2305434" _msttexthash="55250">43.64042</td>
<td _msthash="2305565" _msttexthash="45201">44.1005</td>
<td _msthash="2305693" _msttexthash="57902">44.87476</td>
<td _msthash="2305823" _msttexthash="56472">45.74308</td>
<td _msthash="2305953" _msttexthash="57941">46.61986</td>
<td _msthash="2306083" _msttexthash="55939">47.41624</td>
<td _msthash="2306213" _msttexthash="57252">47.89613</td>
<td _msthash="2373125" _msttexthash="55393">48.20911</td>
</tr>
<tr>
<th scope="row" _msthash="2305800" _msttexthash="22243">15.5</th>
<td _msthash="2305512" _msttexthash="57369">43.55883</td>
<td _msthash="2305642" _msttexthash="56862">43.86066</td>
<td _msthash="2305772" _msttexthash="56290">44.32682</td>
<td _msthash="2305901" _msttexthash="57083">45.10959</td>
<td _msthash="2306031" _msttexthash="58630">45.98487</td>
<td _msthash="2306161" _msttexthash="59007">46.86599</td>
<td _msthash="2306291" _msttexthash="58539">47.66399</td>
<td _msthash="2306421" _msttexthash="47164">48.1438</td>
<td _msthash="2373345" _msttexthash="47320">48.4563</td>
</tr>
<tr>
<th scope="row" _msthash="2306007" _msttexthash="22347">16.5</th>
<td _msthash="2305720" _msttexthash="57564">43.75558</td>
<td _msthash="2305850" _msttexthash="56420">44.06186</td>
<td _msthash="2305980" _msttexthash="56459">44.53428</td>
<td _msthash="2306109" _msttexthash="57148">45.32587</td>
<td _msthash="2306239" _msttexthash="56979">46.20858</td>
<td _msthash="2306369" _msttexthash="47463">47.0946</td>
<td _msthash="2306499" _msttexthash="58851">47.89487</td>
<td _msthash="2306629" _msttexthash="56459">48.37505</td>
<td _msthash="2373566" _msttexthash="57252">48.68741</td>
</tr>
<tr>
<th scope="row" _msthash="2306214" _msttexthash="22451">17.5</th>
<td _msthash="2305928" _msttexthash="57382">43.93539</td>
<td _msthash="2306058" _msttexthash="46332">44.2462</td>
<td _msthash="2306188" _msttexthash="55120">44.72501</td>
<td _msthash="2306317" _msttexthash="47229">45.5257</td>
<td _msthash="2306447" _msttexthash="55471">46.41622</td>
<td _msthash="2306577" _msttexthash="56680">47.30765</td>
<td _msthash="2306707" _msttexthash="55562">48.11074</td>
<td _msthash="2306837" _msttexthash="47918">48.5917</td>
<td _msthash="2373787" _msttexthash="56979">48.90419</td>
</tr>
<tr>
<th scope="row" _msthash="2304538" _msttexthash="22555">18.5</th>
<td _msthash="2304251" _msttexthash="53807">44.10013</td>
<td _msthash="2304381" _msttexthash="55796">44.41553</td>
<td _msthash="2304511" _msttexthash="56394">44.90085</td>
<td _msthash="2304641" _msttexthash="56563">45.71086</td>
<td _msthash="2304771" _msttexthash="47463">46.6095</td>
<td _msthash="2304901" _msttexthash="57135">47.50676</td>
<td _msthash="2305031" _msttexthash="55822">48.31317</td>
<td _msthash="2305162" _msttexthash="57785">48.79526</td>
<td _msthash="2372006" _msttexthash="55757">49.10814</td>
</tr>
<tr>
<th scope="row" _msthash="2304746" _msttexthash="22659">19.5</th>
<td _msthash="2304459" _msttexthash="55874">44.25137</td>
<td _msthash="2304589" _msttexthash="55809">44.57142</td>
<td _msthash="2304719" _msttexthash="55445">45.06333</td>
<td _msthash="2304849" _msttexthash="57642">45.88284</td>
<td _msthash="2304979" _msttexthash="59618">46.78989</td>
<td _msthash="2305109" _msttexthash="57226">47.69335</td>
<td _msthash="2305239" _msttexthash="55523">48.50351</td>
<td _msthash="2305370" _msttexthash="57330">48.98703</td>
<td _msthash="2372227" _msttexthash="55081">49.30052</td>
</tr>
<tr>
<th scope="row" _msthash="2304954" _msttexthash="21814">20.5</th>
<td _msthash="2304667" _msttexthash="56589">44.39047</td>
<td _msthash="2304797" _msttexthash="55315">44.71521</td>
<td _msthash="2304927" _msttexthash="56576">45.21378</td>
<td _msthash="2305057" _msttexthash="56485">46.04295</td>
<td _msthash="2305187" _msttexthash="57863">46.95863</td>
<td _msthash="2305317" _msttexthash="57616">47.86861</td>
<td _msthash="2305447" _msttexthash="48399">48.6829</td>
<td _msthash="2305578" _msttexthash="56615">49.16814</td>
<td _msthash="2372448" _msttexthash="56862">49.48244</td>
</tr>
<tr>
<th scope="row" _msthash="2305163" _msttexthash="21918">21.5</th>
<td _msthash="2304875" _msttexthash="56199">44.51861</td>
<td _msthash="2305005" _msttexthash="56914">44.84806</td>
<td _msthash="2305135" _msttexthash="55874">45.35334</td>
<td _msthash="2305265" _msttexthash="56875">46.19229</td>
<td _msthash="2305395" _msttexthash="56017">47.11681</td>
<td _msthash="2305525" _msttexthash="46553">48.0336</td>
<td _msthash="2305655" _msttexthash="57044">48.85236</td>
<td _msthash="2305785" _msttexthash="57460">49.33955</td>
<td _msthash="2372669" _msttexthash="57681">49.65484</td>
</tr>
<tr>
<th scope="row" _msthash="2305371" _msttexthash="22022">22.5</th>
<td _msthash="2305083" _msttexthash="47723">44.6368</td>
<td _msthash="2305213" _msttexthash="58292">44.97099</td>
<td _msthash="2305343" _msttexthash="55380">45.48301</td>
<td _msthash="2305473" _msttexthash="56225">46.33184</td>
<td _msthash="2305603" _msttexthash="57135">47.26538</td>
<td _msthash="2305733" _msttexthash="56940">48.18923</td>
<td _msthash="2305863" _msttexthash="56212">49.01276</td>
<td _msthash="2305993" _msttexthash="54795">49.50211</td>
<td _msthash="2372890" _msttexthash="57486">49.81854</td>
</tr>
<tr>
<th scope="row" _msthash="2305579" _msttexthash="22126">23.5</th>
<td _msthash="2305291" _msttexthash="57291">44.74593</td>
<td _msthash="2305422" _msttexthash="57460">45.08487</td>
<td _msthash="2305551" _msttexthash="56602">45.60367</td>
<td _msthash="2305681" _msttexthash="56628">46.46246</td>
<td _msthash="2305811" _msttexthash="55835">47.40516</td>
<td _msthash="2305941" _msttexthash="57109">48.33629</td>
<td _msthash="2306071" _msttexthash="57538">49.16486</td>
<td _msthash="2306201" _msttexthash="58032">49.65657</td>
<td _msthash="2373111" _msttexthash="58253">49.97429</td>
</tr>
<tr>
<th scope="row" _msthash="2305786" _msttexthash="22230">24.5</th>
<td _msthash="2305498" _msttexthash="58149">44.84678</td>
<td _msthash="2305630" _msttexthash="56433">45.19047</td>
<td _msthash="2305758" _msttexthash="56511">45.71608</td>
<td _msthash="2305888" _msttexthash="58578">46.58489</td>
<td _msthash="2306018" _msttexthash="58097">47.53688</td>
<td _msthash="2306148" _msttexthash="57811">48.47548</td>
<td _msthash="2306278" _msttexthash="56329">49.30933</td>
<td _msthash="2306408" _msttexthash="57291">49.80358</td>
<td _msthash="2373332" _msttexthash="54730">50.12271</td>
</tr>
<tr>
<th scope="row" _msthash="2305994" _msttexthash="22334">25.5</th>
<td _msthash="2305706" _msttexthash="55614">44.94005</td>
<td _msthash="2305837" _msttexthash="47827">45.2885</td>
<td _msthash="2305966" _msttexthash="56277">45.82092</td>
<td _msthash="2306096" _msttexthash="49257">46.6998</td>
<td _msthash="2306226" _msttexthash="56693">47.66118</td>
<td _msthash="2306356" _msttexthash="56472">48.60743</td>
<td _msthash="2306486" _msttexthash="57967">49.44677</td>
<td _msthash="2306616" _msttexthash="57421">49.94373</td>
<td _msthash="2373553" _msttexthash="56160">50.26437</td>
</tr>
<tr>
<th scope="row" _msthash="2306202" _msttexthash="22438">26.5</th>
<td _msthash="2305914" _msttexthash="55523">45.02634</td>
<td _msthash="2306045" _msttexthash="57434">45.37954</td>
<td _msthash="2306174" _msttexthash="58266">45.91878</td>
<td _msthash="2306304" _msttexthash="57941">46.80778</td>
<td _msthash="2306434" _msttexthash="58357">47.77865</td>
<td _msthash="2306564" _msttexthash="47476">48.7327</td>
<td _msthash="2306694" _msttexthash="57954">49.57773</td>
<td _msthash="2306824" _msttexthash="55757">50.07751</td>
<td _msthash="2373774" _msttexthash="58357">50.39978</td>
</tr>
<tr>
<th scope="row" _msthash="2306409" _msttexthash="22542">27.5</th>
<td _msthash="2306122" _msttexthash="45734">45.1062</td>
<td _msthash="2306254" _msttexthash="56147">45.46415</td>
<td _msthash="2306382" _msttexthash="53833">46.01021</td>
<td _msthash="2306512" _msttexthash="57161">46.90935</td>
<td _msthash="2306642" _msttexthash="59683">47.88979</td>
<td _msthash="2306772" _msttexthash="57928">48.85178</td>
<td _msthash="2306902" _msttexthash="56810">49.70266</td>
<td _msthash="2307032" _msttexthash="54535">50.20541</td>
<td _msthash="2373995" _msttexthash="46917">50.5294</td>
</tr>
<tr>
<th scope="row" _msthash="2304735" _msttexthash="22646">28.5</th>
<td _msthash="2304448" _msttexthash="54691">45.18011</td>
<td _msthash="2304578" _msttexthash="47216">45.5428</td>
<td _msthash="2304708" _msttexthash="57707">46.09568</td>
<td _msthash="2304838" _msttexthash="57057">47.00499</td>
<td _msthash="2304970" _msttexthash="57603">47.99506</td>
<td _msthash="2305098" _msttexthash="47619">48.9651</td>
<td _msthash="2305228" _msttexthash="38272">49.822</td>
<td _msthash="2305359" _msttexthash="56303">50.32783</td>
<td _msthash="2372214" _msttexthash="55978">50.65362</td>
</tr>
<tr>
<th scope="row" _msthash="2304943" _msttexthash="22750">29.5</th>
<td _msthash="2304656" _msttexthash="56355">45.24852</td>
<td _msthash="2304786" _msttexthash="57018">45.61594</td>
<td _msthash="2304916" _msttexthash="56459">46.17562</td>
<td _msthash="2305046" _msttexthash="55692">47.09511</td>
<td _msthash="2305178" _msttexthash="58097">48.09488</td>
<td _msthash="2305305" _msttexthash="56407">49.07308</td>
<td _msthash="2305435" _msttexthash="56732">49.93613</td>
<td _msthash="2305566" _msttexthash="55406">50.44514</td>
<td _msthash="2372435" _msttexthash="56394">50.77281</td>
</tr>
<tr>
<th scope="row" _msthash="2305151" _msttexthash="21905">30.5</th>
<td _msthash="2304864" _msttexthash="55289">45.31181</td>
<td _msthash="2304994" _msttexthash="57707">45.68394</td>
<td _msthash="2305124" _msttexthash="55367">46.25043</td>
<td _msthash="2305254" _msttexthash="56186">47.18009</td>
<td _msthash="2305386" _msttexthash="57252">48.18961</td>
<td _msthash="2305513" _msttexthash="56823">49.17607</td>
<td _msthash="2305643" _msttexthash="45929">50.0454</td>
<td _msthash="2305773" _msttexthash="57746">50.55769</td>
<td _msthash="2372656" _msttexthash="56602">50.88731</td>
</tr>
<tr>
<th scope="row" _msthash="2305360" _msttexthash="22009">31.5</th>
<td _msthash="2305072" _msttexthash="55874">45.37035</td>
<td _msthash="2305202" _msttexthash="57265">45.74718</td>
<td _msthash="2305332" _msttexthash="55250">46.32044</td>
<td _msthash="2305462" _msttexthash="46163">47.2603</td>
<td _msthash="2305593" _msttexthash="48321">48.2796</td>
<td _msthash="2305721" _msttexthash="47307">49.2744</td>
<td _msthash="2305851" _msttexthash="54015">50.15012</td>
<td _msthash="2305981" _msttexthash="57694">50.66578</td>
<td _msthash="2372877" _msttexthash="57044">50.99741</td>
</tr>
<tr>
<th scope="row" _msthash="2305567" _msttexthash="22113">32.5</th>
<td _msthash="2305280" _msttexthash="55900">45.42444</td>
<td _msthash="2305410" _msttexthash="57499">45.80596</td>
<td _msthash="2305540" _msttexthash="58643">46.38599</td>
<td _msthash="2305670" _msttexthash="55575">47.33603</td>
<td _msthash="2305801" _msttexthash="56485">48.36515</td>
<td _msthash="2305929" _msttexthash="57577">49.36836</td>
<td _msthash="2306059" _msttexthash="55913">50.25058</td>
<td _msthash="2306189" _msttexthash="58279">50.76968</td>
<td _msthash="2373098" _msttexthash="55302">51.10338</td>
</tr>
<tr>
<th scope="row" _msthash="2305774" _msttexthash="22217">33.5</th>
<td _msthash="2305487" _msttexthash="47151">45.4744</td>
<td _msthash="2305617" _msttexthash="57265">45.86058</td>
<td _msthash="2305747" _msttexthash="56953">46.44736</td>
<td _msthash="2305877" _msttexthash="57005">47.40757</td>
<td _msthash="2306008" _msttexthash="56979">48.44654</td>
<td _msthash="2306135" _msttexthash="56849">49.45823</td>
<td _msthash="2306265" _msttexthash="55419">50.34704</td>
<td _msthash="2306395" _msttexthash="57863">50.86965</td>
<td _msthash="2373319" _msttexthash="55731">51.20547</td>
</tr>
<tr>
<th scope="row" _msthash="2305982" _msttexthash="22321">34.5</th>
<td _msthash="2305694" _msttexthash="55952">45.52047</td>
<td _msthash="2305824" _msttexthash="46306">45.9113</td>
<td _msthash="2305954" _msttexthash="55978">46.50481</td>
<td _msthash="2306084" _msttexthash="57200">47.47518</td>
<td _msthash="2306215" _msttexthash="55302">48.52402</td>
<td _msthash="2306343" _msttexthash="56576">49.54425</td>
<td _msthash="2306473" _msttexthash="56901">50.43974</td>
<td _msthash="2306603" _msttexthash="57512">50.96593</td>
<td _msthash="2373540" _msttexthash="55484">51.30392</td>
</tr>
<tr>
<th scope="row" _msthash="2306190" _msttexthash="22425">35.5</th>
<td _msthash="2305902" _msttexthash="56589">45.56291</td>
<td _msthash="2306032" _msttexthash="57980">45.95837</td>
<td _msthash="2306162" _msttexthash="58266">46.55859</td>
<td _msthash="2306292" _msttexthash="56108">47.53911</td>
<td _msthash="2306422" _msttexthash="58305">48.59783</td>
<td _msthash="2306551" _msttexthash="57408">49.62665</td>
<td _msthash="2306681" _msttexthash="57811">50.52889</td>
<td _msthash="2306811" _msttexthash="56251">51.05872</td>
<td _msthash="2373761" _msttexthash="57551">51.39892</td>
</tr>
<tr>
<th scope="row" _msthash="2306396" _msttexthash="10257">36</th>
<td _msthash="2306110" _msttexthash="57252">45.58284</td>
<td _msthash="2306240" _msttexthash="56576">45.98061</td>
<td _msthash="2306370" _msttexthash="57031">46.58417</td>
<td _msthash="2306500" _msttexthash="58461">47.56976</td>
<td _msthash="2306630" _msttexthash="56095">48.63342</td>
<td _msthash="2306759" _msttexthash="57993">49.66656</td>
<td _msthash="2306889" _msttexthash="46202">50.5722</td>
<td _msthash="2307019" _msttexthash="55965">51.10387</td>
<td _msthash="2373982" _msttexthash="56420">51.44519</td>
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

